<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Role;
use app\Models\User;
use app\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');
        $roles = Role::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($title = $request->title)) {
                    $query->orWhere('title', 'LIKE', '%' . $title . '%')->get();
                }
            }]
        ])
        ->orderBy('id', 'desc')
        ->paginate(4);

        return view('roles.index',compact('roles'));

    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    public function store(Request $request)
    {
            $this->validate($request, [
            'title' => 'required|unique:roles,title',
            'permission' => 'required',
            ]);
            $role = Role::create(['title' => $request->input('title')]);
            $permissions = $request->input('permission');
            $permission_data = [];
            foreach($permissions as $permission)
            {
                    $get_role_id = $role->id;
                    $permission_data[] =[
                        'role_id' => $get_role_id,
                        'permission_id' => $permission,
                    ];
                }
            $update_rolePermissions = DB::table('permission_role')->insert($permission_data);

            return redirect()->route('roles.index')->withSuccessMessage('Profile created');
    }

    public function show($id)
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $roles = Role::where('id', $id)->get();
        $rolePermissions = DB::table('permission_role')
        ->join('roles', 'roles.id', '=', 'role_id')
        ->join('permissions', 'permissions.id', '=', 'permission_id')
        ->select('permissions.area','permissions.title', 'permissions.description')
        ->where('role_id', $id)
        ->get();

        $profile_users = DB::table('role_user')
        ->join('users', 'id', '=', 'user_id')
        ->select('id', 'name', 'email', 'job_title', 'department', 'organisation', 'profile_photo_path')
        ->where('role_id', $id)
        ->paginate(4);

        return view('roles.show',compact('roles','rolePermissions', 'profile_users'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $role = Role::find($id);
        $roles = Role::where('id', $id)->get();
        $permissions = Permission::get();
        $rolePermissions = DB::table('permissions')
        ->join('permission_role', 'permission_role.permission_id', '=', 'id')
        ->join('roles', 'roles.id', '=', 'permission_role.role_id')
        ->where('role_id', $id)
        ->pluck('permission_role.permission_id','permission_role.permission_id')
        ->all();

        return view('roles.edit',compact('role', 'roles', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
            $this->validate($request, [
            'title' => 'required',
            'permission' => 'required',
            ]);

            $role = Role::find($id);
            $role->title = $request->input('title');
            $role->save();
            $role->permissions()->sync($request->input('permission', []));
            return redirect()->route('roles.index')->withSuccessMessage('Profile updated');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');
        $role = Role::find($id);
        $userCount = DB::table('role_user')
        ->join('users', 'id', '=', 'user_id')
        ->select('id', 'name', 'email', 'job_title', 'department', 'organisation', 'profile_photo_path')
        ->where('role_id', $id)
        ->count();

        if( $userCount > 0 ) {
            alert()->warning('Failed', 'You cannot delete a profile which is still in use');
            return redirect()->route('roles.index');
        } else {
        $role->delete();
        return redirect()->route('roles.index')->withSuccessMessage('Profile deleted');;
        }
    }
}
