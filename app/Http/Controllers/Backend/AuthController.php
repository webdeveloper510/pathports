<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\University;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
       
        

        $this->validate($request, [
            'email'   => 'required|email|exists:users',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('backend')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get('remember'))) {
            return redirect()->intended(route('backend.dashboard'));

         
        }
        return back()->withInput($request->only('email', 'remember'))
            ->withErrors(['password' => 'Please check your password.']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request){
        Auth::guard('backend')->logout();
        $request->session()->invalidate();
        return redirect()->route('backend.login');
    }
}
