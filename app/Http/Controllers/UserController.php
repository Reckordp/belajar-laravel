<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Validator;
use Auth;

class UserController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function login()
    {
    	return view('login');
    }

    function auth(Request $request)
    {
    	$this->validate($request, [
    		'email' 				=> 'required|email', 
    		'pass' 					=> 'required|alphaNum'
    	]);

    	$tanda = array(
    		'email' 				=> $request->input('email'), 
    		'password'	 		=> $request->input('pass') 
    	);

    	if(Auth::attempt($tanda)) {
    		return redirect('/');
    	}
    	else
    	{
    		return back();
    	}
    }
}
