<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Users extends Authenticatable
{
	use SoftDeletes;
	protected $table = 'users';
    protected $fillable = ['email','password','mortgage_type','mortgage_last_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function validation($inputArr)
    {

        $rules=[
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required'
                /*'confirm_password' => 'same:password|required_with:password',*/
                ];
                  

        $messages = array(
            'email.required' => 'Please enter email',
            'password.required' => 'Please enter password'
        );
        $validator = \Validator::make($inputArr, $rules, $messages);
        return $validator;
    }
    public function profile()
    {
        return $this->hasOne('App\Models\UsersProfile','user_id','id');
    }
    public function social()
    {
        return $this->hasMany('App\Models\Social','user_id','id');
    }
    public function subscribe()
    {
        return $this->hasOne('Dexel\User\Models\SubscribeModel','user_id','id');
    }
}
