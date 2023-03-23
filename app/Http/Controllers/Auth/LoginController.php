<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }
    
    public function showLogin()
    {
        return view('admin.login');
    }    
    public function userLogin()
    {
        return view('user.login');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function userAuthenticate(Request $request)
    {
      
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::guard('web')->attempt($credentials)) {
            dd(Auth::guard('web'));

            $request->session()->regenerate();
            return redirect()->route('user.index');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
   public function index()
   {
    return view('index');
   }
   public function userIndex()
   {
    return view('user.index');
   }
    public function superAdmin(Request $request)
    {   
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(array('email' => $input['email'], 'password' => $input['password']))
        {
            $users=User::all();
            // return view('adminHome');
                return redirect('admin-home')->with('success','sucessfully looged',$users);
            // if (auth()->user()->roles == 1) {
            //     return redirect()->route('admin.home');
            // }else{
            //     return redirect()->route('home');
            // }
        }else{
            return redirect()->back()->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }
}
