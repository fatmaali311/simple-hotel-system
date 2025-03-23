<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Spatie\Permission\Models\Role;


class AdminController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function dashboard()
    {
        $usersCount = User::count();
        $rolesCount = Role::count();

        return view('admin.dashboard', compact('usersCount', 'rolesCount'));
    }

    public function manageUsers()
    {
        $users = User::with('roles')->get();
        return view('admin.users', compact('users'));
    }

    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $role = Role::where('name', $request->role)->first();

        if (!$role) {
            return redirect()->back()->with('error', 'الدور غير موجود');
        }

        $user->syncRoles([$role->name]);

        return redirect()->back()->with('success', 'تم تعيين الدور بنجاح');
    }
}
