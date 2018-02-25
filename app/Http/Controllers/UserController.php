<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
use Auth;

class UserController extends Controller
{
    public function getSignUp() {
    	return view('user.signUp');
    }

    public function postSignUp(Request $request) {
    	$this->validate($request, [
    		'email' => 'email|required|unique:users',
    		'password' => 'required|min:4'
    	]);

    	$user = new User([
    		'email' => $request->input('email'),
    		'password' => bcrypt($request->input('password'))
    	]);

    	$user->save();

    	return redirect()->route('product.index');
    }

    public function getSignIn() {
    	return view('user.signIn');
    }

    public function postSignIn(Request $request) {
    	$this->validate($request, [
    		'email' => 'email|required',
    		'password' => 'required|min:4'
    	]);

    	// try to log the user in 
    	if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
    		return redirect()->route('user.profile');
    	}

    	return redirect()->back();
    }

    public function getProfile() {
    	return view('user.profile');
    }
}
