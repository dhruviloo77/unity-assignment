<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();   

        return view('users',compact('users'));
    }

    public function store(Request $request) {

        $this->validate($request,[
            'uid' => 'required',
            'uname' => 'required',
        ]);

        $user = new User;
        $user->id = $request->uid;
        $user->name = $request->uname;
        $user->save();

        return redirect('/')->with(['message' => 'User Successfully added.']);
    }

    public function update($id, Request $request) {

        $user = User::find($id);
        $user->id = $request->uid;
        $user->name = $request->uname;
        $user->update();

        return redirect('/')->with(['message' => 'User Successfully Edited.']);
    }

    public function delete($id) {

        $user = User::find($id);    
        $user->delete();

        return redirect('/')->with(['message' => 'User Successfully Deleted.']);
    }


}
