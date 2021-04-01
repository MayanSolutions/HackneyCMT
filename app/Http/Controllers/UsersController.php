<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\clients;
use App\Models\DashOrder;
use App\Notifications\UsersChangeNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;


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
        ->paginate(6);

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

        return redirect()->route('users.index')->withSuccessMessage('Account created');
    }

    public function show(User $user, Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientDetails = clients::with('EstateDetails')->where('user_id', $user->id)->get();

        return view('users.show', compact('user', 'clientDetails', ));
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

        return redirect()->route('users.index')->withSuccessMessage('Account updated');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return redirect()->route('users.index')->withSuccessMessage('Account deleted');
    }

    public function active($id)
    {

        $user = User::find($id);

        if($user->active == true)
        {
            $user->update(['active' => false]);
            $user->save();
        }
        else
        {
            $user->update(['active' => true ]);
            $user->save();
        }

        return back()->withSuccessMessage('Account status changed');
    }
}
