<?php

namespace Citw\Loan365\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Users;
use App\Models\purchases;
use App\Models\remortages;
use Session;
use DB;
class RegisterController extends Controller
{
    //use CaptchaTrait;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashbord';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $request;

    public function __construct(Request $request)
    {
        
        $this->request = $request;
    }

    public function getRegisterForm()
    {
        return view('loan365::auth.register');
    }

    public function saveRegisterForm()
    {
        return DB::transaction(function()
        {
            $reg_input['email']               = Input::get('email');
            $reg_input['password']            = Input::get('password');
            $validator                        = Users::validation($reg_input);
            $reg_input['password']            = \Hash::make($reg_input['password']);
            if ($validator->fails())
            {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $reg_input['forgot_token']         = base64_encode($reg_input['email'].date("YmdHis"));
            if(!empty(session::get('last_id')))
            {
                if(session::get('mortgage_type') == 1)
                {
                   $fetch_value                = purchases::fetchvalues(session::get('last_id'));
                }
                elseif(session::get('mortgage_type') == 2)
                {
                   $fetch_value                 = remortages::fetchvalues(session::get('last_id'));
                }
                else
                {
                    return redirect('error');
                }
                $reg_input['mortgage_last_id']  = $fetch_value->id;
                $reg_input['mortgage_type']     = $fetch_value->mortgage_type;
            }
            //dd($reg_input);
            $user = Users::create($reg_input);
            session::flush();
            if($user)
            {
                return redirect('login')->with('message', 'Register successfully');
            }
            else
            {
                return redirect('register')->with('message', 'Register failed');
            }
        });
    }
}
