<?php

namespace Citw\Loan365\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Users;
use Session;
use Redirect;
use DB;
class dashboardController extends Controller
{
    public function __construct()
    {    
        $this->middleware(function ($request, $next) 
        {
            $this->user_id                        = session::get('user_id');          
            $this->user_email                     = session::get('user_id');          
            $this->user_email                     = session()->has( 'user_id' ) ? session()->get( 'user_email' ) :  Redirect::to('login')->send();
          return $next($request);
        });                            
    }
    public function dashboard()
    {
        $compact_array    = array(
                                    'user_email' => $this->user_email,
                                 );
        return view('loan365::user.dashboard',compact('compact_array'));
    }
}
