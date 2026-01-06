<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        //select * from users;

        return view('users.index', compact('users'));
    }

    public function show($id){
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
