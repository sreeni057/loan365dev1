<?php

namespace Dexel\Authentication\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Hash;
use App\Models\Expertise;
use App\Models\Admins;
use App\Models\AdminsProfile;

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
    public function __construct(Request $request)
    {
         $this->request = $request;
        //$this->middleware('guest', ['except' => 'logout']);
    }
    
    public function getLoginForm()
    {
        return view('authentication::admin.login');
    }

 public function authenticate()
    {
        $email = $this->request->input('username');
        $password = $this->request->input('password');
         
        if (auth()->guard('admin')->attempt(['email' => $email, 'password' => $password,'active'=> '1', 'email_verified' => '1'])) 
        {
            
            return redirect()->intended('/');
        }
        else
        {
            return redirect()->intended('login/coach')->with('message', 'Invalid Login Credentials !')->withInput();
        }
    }
    
    
    public function getLogout() 
    {
        auth()->guard('admin')->logout();
        //return redirect()->intended('login/coach');
        return redirect()->intended('/');
    }

    public function getProfile() 
    {
        $expertise = Expertise::all();
        $user = Auth::guard('admin')->user();
        return view('authentication::admin.profile',['expertise'=>$expertise,'user'=>$user]);
    }    
    public function postProfile() 
    {
    	/*echo "<pre>";
    	print_r($_FILES);
    	dd($_POST);*/
        $login_input = $this->request->only('fname','lname','phone','password','confirm_password');
        $profile_input = $this->request->only('gender','dob','about','address','expert_in','social_link','tag_line');
        $profile_input['photo'] = $this->request->file('photo',NULL);
        $profile_input['image_base'] = $this->request->only('image_base');
        $profile_input['cover_img'] = $this->request->file('cover_img',NULL);
        //dd($profile_input);
        $validator = Admins::validation_edit(array_merge($login_input,$profile_input));
        if ($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        if(isset($login_input['password']) && ($login_input['password']))
        {
            $login_input['password'] = \Hash::make($login_input['password']);
        }
        else
        {
            unset($login_input['password']);    
        }
        unset($login_input['confirm_password']);
        $admin = Auth::guard('admin')->user();
        $admin->update($login_input);
        $expert_in = $profile_input['expert_in'];
        unset($profile_input['expert_in']);
        $profile_input['dob'] = date('Y-m-d',strtotime($profile_input['dob']));
        //dd($profile_input);
        if(isset($profile_input['image_base']['image_base']) && ($profile_input['image_base']))
        {
        try
            {
            	$base64_img_array   =   explode(':', $profile_input['image_base']['image_base']);
				$img_info           =   explode(',', end($base64_img_array));
				$img_file_extension = '';
				           if (!empty($img_info)) {
				               switch ($img_info[0]) {
				                   case 'image/jpeg;base64':
				                       $img_file_extension = 'jpeg';
				                       break;
				                   case 'image/jpg;base64':
				                       $img_file_extension = 'jpg';
				                       break;
				                   case 'image/gif;base64':
				                       $img_file_extension = 'gif';
				                       break;
				                   case 'image/png;base64':
				                       $img_file_extension = 'png';
				                       break;
				               }
				           }
				       $nameofimage     = rand(23232,99999).'.'.$img_file_extension;
				       $uploadPath      = "uploadimages";
				       $img_file_name   = public_path().'/'.$uploadPath.$nameofimage;
				       $img_file        = file_put_contents($img_file_name, base64_decode($img_info[1]));
				       //dd($img_file_name);
                $imageFileName = "/profile/coach/".$admin->id."/".time() . '.' . $img_file_extension;
                $s3 = \Storage::disk('s3');
                $s3->deleteDirectory(env('S3_ASSET_PATH','assets')."/profile/coach/".$admin->id);
                $s3->put(env('S3_ASSET_PATH','assets').$imageFileName, file_get_contents($img_file_name), 'public');
                $profile_input['photo'] = $imageFileName;
                unlink($img_file_name);
            }
            catch (Exception $e)
            {
                //put default image
                if($profile_input['gender'] == 'M')
                {
                    $profile_input['photo'] = '/profile/coach/default_m.png';
                }
                else if($profile_input['gender'] == 'F')
                {
                    $profile_input['photo'] = '/profile/coach/default_f.png';
                }
                else
                {
                    $profile_input['photo'] = '/profile/coach/default.png';
                }
            }
        }
        else
        {
            unset($profile_input['photo']);
        }

        if(isset($profile_input['cover_img']) && ($profile_input['cover_img']))
        {
        try
            {
                $imageFileName = "/profile_cover/coach/".$admin->id."/".time() . '.' . $profile_input['cover_img']->getClientOriginalExtension();
                $s3 = \Storage::disk('s3');
                $s3->deleteDirectory(env('S3_ASSET_PATH','assets')."/profile_cover/coach/".$admin->id);
                $s3->put(env('S3_ASSET_PATH','assets').$imageFileName, file_get_contents($profile_input['cover_img']), 'public');
                $profile_input['cover_img'] = $imageFileName;
            }
            catch (Exception $e)
            {
                $profile_input['cover_img'] = '/profile_cover/coach/default.png';
                
            }
        }
        else
        {
             unset($profile_input['cover_img']);
        }

        $admin->profile->update($profile_input);
        $admin->expertise()->sync($expert_in);
        return redirect('coach/myprofile')->with(['message'=>'Updated successfully!']);
    }
}
