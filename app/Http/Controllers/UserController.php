<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use DB;
use File;
use Image;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('users.home', compact('users'));
    }

    public function create()
    {
        $role = Role::orderBy('name', 'ASC')->get();
        return view('users.add', compact('role'));
    }

    public function store(Request $request)
    {

        try {
            $img_url = null;

            if($request->hasFile('img_url')) {
                $img_url = $this->saveFile($request->name, $request->file('img_url'));
            }

            $user = User::firstOrCreate([
                'email' => $request->email,
                'name' => $request->name,
                'img_url' => $img_url,
                'password' => bcrypt($request->password)
            ]);
    
            $user->assignRole($request->role);
            return redirect(route('users.index'))->with(['success' => 'User: <strong>' . $user->name . '</strong> Ditambahkan']);

        }catch (\Exception $e) {
            dd($e);
        }
    }

    public function saveFile($title, $img_url)
    {
        $picture = str_slug($title).'.'.$img_url->getClientOriginalExtension();
        $path = storage_path('app/public/profile');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path,0777,true,true);
        }
        Image::make($img_url)->save($path. '/'.$picture);
        return $picture;
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('users.showProfile', compact('users'));
    }

    public function update(Request $request, $id)
    {
        

        try{
            $user = User::findOrFail($id);
            $password = !empty($request->password) ? bcrypt($request->password):$user->password;
            $img_url = $user->img_url;
            // dd($user);

            if ($request->hasFile('img_url')) {
                !empty($img_url) ? File::delete(storage_path('app/public/profile/'.$img_url)):null;
                $img_url = $this->saveFile($request->name, $request->file('img_url'));
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'img_url' => $img_url,
                'password' => bcrypt($request->password)
            ]);
            return redirect(route('users.index'))->with(['success' => 'User: <strong>' . $user->name . '</strong> Diperbaharui']);


        }catch (\Exception $e){
            dd($e);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'User: <strong>' . $user->name . '</strong> Dihapus']);
    }

    public function roles(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('users.roles', compact('user', 'roles'));
    }

    public function setRole(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->syncRoles($request->role);
        return redirect('users');
    }

    public function rolePermission(Request $request)
    {
        $role = $request->get('role');
        $permissions = null;
        $hasPermission = null;

        $roles = Role::all()->pluck('name');

        if (!empty($role)) {
            $getRole = Role::findByName($role);
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $getRole->id)->get()->pluck('name')->all();
            $permissions = Permission::all()->pluck('name');
        }
        return view('users.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function setRolePermission(Request $request, $role)
    {
        $role = Role::findByName($role);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with(['success' => 'Permission to Role Saved!']);
    }
}
