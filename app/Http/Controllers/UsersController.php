<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\clients;
use App\Models\MatrixFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($name = $request->name)) {
                    $query->orWhere('name', 'LIKE', '%' . $name . '%')
                    ->orWhere('job_title', 'LIKE', '%' . $name . '%')
                    ->orWhere('department', 'LIKE', '%' . $name . '%')
                    ->orWhere('organisation', 'LIKE', '%' . $name . '%')->get();
                }
            }]
        ])
        ->orderBy('id', 'desc')
        ->paginate(4);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        $user->roles()->sync($request->input('roles', []));

        alert()->toast('Account created', 'success')->persistent('Close')->autoclose(6000);

        return redirect()->route('users.index');
    }

    public function show(User $user, Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $useractivities = Activity::where([
            ['causer_id', '=', $user->id],
            ['log_name', '!=', NULL],
            [function ($query) use ($request) {
                if (($activities = $request->activity)) {
                    $query->orWhere('log_name', 'LIKE', '%' . $activities . '%')
                    ->orWhere('description', 'LIKE', '%' . $activities . '%')
                    ->orWhere('subject_type', 'LIKE', '%' . $activities . '%')
                    ->orWhere('causer_type', 'LIKE', '%' . $activities . '%')
                    ->orWhere('causer_id', 'LIKE', '%' . $activities . '%')
                    ->orWhere('properties', 'LIKE', '%' . $activities . '%')
                    ->get();
                }
            }]
            ])
            ->orderBy('id', 'DESC')
            ->paginate(5);

        $clientDetails = clients::with('EstateDetails')->where('user_id', $user->id)->get();

        return view('users.show', compact('user', 'useractivities', 'clientDetails', ));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));

        alert()->toast('Account updated', 'success')->persistent('Close')->autoclose(6000);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $user->delete();

        alert()->toast('Account deleted', 'warning')->persistent('Close')->autoclose(6000);

        return redirect()->route('users.index');
    }
}
