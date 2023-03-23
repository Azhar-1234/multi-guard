<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:25'],
    //         'email' => ['required', 'string', 'email', 'max:25', 'unique:users'],
    //         'password' => ['required', 'string', 'min:6'],
    //     ]);
    // }
    public function index()
    {
        return view('home');
    }
    public function adminHome()
    {
        return view('adminHome');
    }
    public function store(Request $request){
    	$user = new User();
        $user->roles = 2;
       	$user->name = $request->name;
    	$user->email = $request->email;
        $user->password = $request->password;
      	$result= $user->save();
        if($result):
            return back()->with('success','inserted sucessfully');
        else: 
            return back()->with('danger','inserted unsucessfully');
        endif;
     }
}
