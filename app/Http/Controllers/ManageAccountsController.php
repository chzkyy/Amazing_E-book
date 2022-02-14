<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ManageAccountsController extends Controller
{
    //
    public function getManage()
    {
        return view('pages.accounts',[
            'users' => User::all(),
            'title' => 'Account Maintaince',
        ]);
    }

    public function getUpdateRole($id)
    {
        return view('pages.role', [
            'user' => User::find($id),
            'role' => Role::all(),
            'title' => 'Account Maintaince',
        ]);
    }

    public function deleteAccount($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'Account Deleted');
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update([
            'role_id' => $request->role_id,
        ]);
        return redirect()->route('get.account')->with('success', 'Role Updated');
    }
}
