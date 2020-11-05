<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    private $errors=[];
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','profile','updateProfile','updatePassword');
    }

    // override
    protected function redirectTo(){
        return '/dashboard';
    }

     // override
     public function showLoginForm(){
        return view('auth/login');
        //return view('admin.auth.login') /*Same As*/;
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        $auth=Auth::guard()->attempt($this->credentials($request));
        //dd($auth);
        if ($auth){
            // it will work after the login successful
            $user = Auth::guard()->getLastAttempted()/*get recent loged in user data*/;
            $status=false;
            //$title =false;
            /*Activation Check*/
            if ($user->status==1){
                $status=true;
            }else{
                $this->incrementLoginAttempts($request);
                $this->errors['active']= "You Are Not Active...Try Again yet!";
            }

            if ($status /* && $title more true check*/){
                return $this->sendLoginResponse($request);
            }else{
                $this->logout($request);
            }
            return redirect('/login')
                ->withInput($request->only('email'))
                ->withErrors($this->errors);
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/login');
    }

    public function profile(){
        return view('profile.profile');
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'name'=>'required|min:6',
            'email'=>'required|email|unique:users,email,'.Auth::guard()->id(),
            'role'=>'required',
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        // file upload
        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $filename = time().".".$photo->getClientOriginalExtension();
            $destination_path = public_path('profiles');
            $photo->move($destination_path,$filename);
            $user->photo = $filename;
        }
        $user->save();
        return redirect()->back()->with('success','Successfully Profile Updated!');
    }

    //Change password method
    public function updatePassword(Request $request){
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required||min:6|confirmed',
        ]);
        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->old_password,$hashedPassword)){
            if(! Hash::check($request['password'],$hashedPassword)){
                $users = User::find(Auth::guard('web')->user()->id);
                $users->password = Hash::make($request->password);
                $users->save();
                Session::flash('success','You Have Successfully Changed The Password');
                Auth::logout();
                return redirect()->route('login');
            }else{
                Session::flash('error','New Password Cannot Be The Same As Old Pass');
                return redirect()->back();
            }
        }else{
            Session::flash('error','Old Password Does Not Matched');
            return redirect()->back();
        }
    }
}
