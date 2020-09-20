<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
Use Illuminate\Support\Facades\Hash;
Use Illuminate\Support\Facades\Auth;
Use App\Http\Controllers\PreDefinedController as preDefiendFun;
Use App\ForgetPasswordRequests as ForgetPassword;
Use Illuminate\Support\Carbon;
class AuthController extends Controller
{
    //Constructor
    public function __construct(){
        $this->preDefiend = new preDefiendFun();
    }

    //Login page
    public function loginPage(Request $request)
    {
        if(Auth::check()):
            $roles = $this->preDefiend->getRoleName(Auth::user()->role);
            return redirect('aPanel/' . strtolower(urlencode($roles->role_name)) . '/dashboard');
        else:
            return view('auth.login');
        endif;
    }

    //login User access
    public function loginAccessAccountPage(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        //dd(['email'=>$request->email,'password'=>Hash::make($request->password)]);
        $credentials = ['email' => $request->email, 'password' => $request->password, 'status' => 1];
        if (Auth::attempt($credentials)):
            try {
                if (Auth::user()->is_verified > 0):
                    $roles = $this->preDefiend->getRoleName(Auth::user()->role);
                    return redirect('aPanel/' . strtolower(urlencode($roles->role_name)) . '/dashboard');
                else:
                    Auth::logout();
                    return redirect('login')->with('warning', 'Your account is not verified.');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('failed', 'Enter your valid credentials');
            }
        else:
            return redirect('login')->with('warning', 'Opp\'s..! You have entered invalid credentials');
        endif;
    }

    //register setup page (init account)
    public function registerPage(Request $request)
    {
        return view('auth.register');
    }

    //save setupAccount page (save details)
    public function SaveSetupAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|numeric|min:10',
            'password' => 'required|string|min:8',
        ]);

        $createUser =  User::create(['name'=>$request->name,'email'=>$request->email,'mobile'=>$request->mobile,'password'=>Hash::make($request->password),'role'=>1,'access'=>1])->id;
        if($createUser > 0):
            return redirect('login')->with('success','Account as created success. Please verify mail id.');
        else:
            return redirect('login')->with('failed','Registration Failed. Please check it once. Try again.!');
        endif;
    }

    //Forget password
    public function forgetPasswordPage(Request $request)
    {
        return view('auth.forgetPassword');
    }

    //check and send request url to change password
    public function requestForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
        ]);

        $checkUserMail = $this->preDefiend->checkUserMail($request->email);
        if (isset($checkUserMail->email)):
            try {
                if ($request->email == $checkUserMail->email):
                    $_token = md5($request->email . '_' . date('d-m-Y H:i s'));
                    $forgetpassword = ForgetPassword::create(['email' => $request->email, '_token' => $_token])->id;
                    if ($forgetpassword > 0) {
                        //TODO : Code to send eMail to change password with +15min to change password in mail
                        $requestUrl = asset('changePassword/' . urlencode($request->email) . '/' . $_token);
                        return redirect('login')->with('success', 'Success Reset Password Link Sent To Your Mail id.');
                    } else {
                        return redirect()->back()->with('warning', 'Unable to sent change password request. try again later..!');
                    }
                else:
                    return redirect()->back()->with('warning', 'Email id not found. Unable to change password..!');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('failed', $exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed', 'Please Enter Registered eMail Id and Try Again..!');
        endif;
    }

    //Reset password with confirm link
    public function changePasswordPage(Request $request)
    {
        if(isset($request->mail_id) && isset($request->_token)){
            $forget_request = ForgetPassword::where(['_token'=>$request->_token,'status'=>0])->first();
            if(isset($forget_request->_token) && $forget_request->_token == $request->_token){
                $currentTime = time();
                $expireTime = strtotime($forget_request->created_at.'+30 minutes');
                if($currentTime >= $expireTime) {
                    ForgetPassword::where(['email' => $forget_request->email,'status'=>0])->delete();
                    return redirect()->to('login')->with('warning', 'Your change password request link as expired..!');
                }else{
                    $user = User::where('email', $forget_request->email)->first();
                    return view('auth.changePassword',compact('user','forget_request'));
                }
            }else{
                return redirect()->back()->with('warning', 'Invalid token to reset login password..!');
            }
        }else{
            return redirect()->back()->with('warning', 'Invalid request to reset login password..!');
        }

    }

    //change password
    public function updateNewPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed|required_with:confirmPassword',
            'confirmPassword' => 'required|string|min:8',
        ]);

        if(isset($request->email) && isset($request->_request_token)):
            try {
                $forget_request = ForgetPassword::where(['_token' => $request->_request_token, 'id' => $request->_request_token_id, 'status' => 0])->first();
                if (isset($forget_request->_token) && $forget_request->_token == $request->_request_token):
                    $currentTime = time();
                    $expireTime = strtotime($forget_request->created_at . '+30 minutes');
                    if ($currentTime >= $expireTime):
                        ForgetPassword::where(['email' => $forget_request->email, 'status' => 0])->delete();
                        return redirect()->to('login')->with('warning', 'Your change password request link as expired..!');
                    else:
                        $user = User::where('email', $forget_request->email)->first();
                        if ($request->password == $request->confirmPassword):
                            $changePassword = User::where(['email' => $request->email, 'id' => $request->id])->update(['password' => Hash::make($request->password)]);
                            if ($changePassword > 0):
                                ForgetPassword::where(['_token' => $request->_request_token, 'id' => $request->_request_token_id, 'status' => 0])->update(['status' => 1]);
                                return redirect()->to('login')->with('success', 'Your new password as successfully changed.');
                            else:
                                return redirect()->to('login')->with('warning', 'Failed to update your new password.');
                            endif;
                        else:
                            return redirect()->back()->with('warning', 'Password and Confirm Password must be same..!');
                        endif;
                    endif;
                else:
                    return redirect()->back()->with('warning', 'Invalid token to reset login password..!');
                endif;
            }catch (\Exception $e){
                return redirect()->back()->with('warning', 'Invalid request to reset login password..!');
            }
        else:
            return redirect()->back()->with('warning', 'Invalid request to reset login password..!');
        endif;
    }

    //Logout Account
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

}
