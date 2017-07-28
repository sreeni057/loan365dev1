<?php

namespace Citw\Loan365\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Input;
use App\Models\Users;
use Session;
use Auth;

class LoginController extends Controller
{
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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $request;     
    

    public function getLoginForm()
    {
        /*$page_value = $value;*/
        if(!empty(session::get('user_id')))
        {
            return redirect('dashboard');    
        }
        return view('loan365::auth.login');
    }

    public function authenticate()
    {
        $email    = Input::get('email');
        $password = Input::get('password');        
        if (auth()->guard('user')->attempt(['email' => $email, 'password' => $password,'active'=> '1', 'email_verified' => '1'])) 
        {
            $user = auth()->guard('user');
            if(!empty($user->user()->mortgage_last_id))
            {
                session([
                            'last_id'    => $user->user()->mortgage_last_id,
                            'user_id'    => $user->user()->id,
                            'user_email' => $user->user()->email,
                            'mortgage_type'  => $user->user()->mortgage_type
                        ]);
            }
            else
            {
               session([
                            'user_id'    => $user->user()->id,
                            'user_email' => $user->user()->email
                        ]);   
            }
            return redirect()->intended('/dashboard')->with(['logged_in'=>'yes']);
        }
        else
        {
            return redirect()->intended('login')->with('message', 'Invalid Login Credentials !')->withInput();
        }
    }
    public function getLogout()
    {
        auth()->guard('user')->logout();
        session::flush();
        return redirect()->intended('login')->with('message', 'Successfully logout !')->withInput();
    }
}
