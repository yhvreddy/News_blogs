<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PreDefinedController as preDefiendFun;
use Illuminate\Http\Request;
use App\User;
use App\RolesModel as Roles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //Constructor
    public function __construct(){
        $this->preDefiend = new preDefiendFun();
    }

    //Users List
    public function index(Request $request)
    {
        $users = User::select('users.*','roles.name as role_name')->join('roles','roles.id','=','users.role')->orderBy('users.created_at')->get();
        return view('users.users_list', compact('users'));
    }

    //Add New user
    public function addNewUser(Request $request)
    {
        $roles = Roles::where(['status' => 1])->whereNotIn('id',[1])->get();
        return view('users.users_add', compact('roles'));
    }

    //save New User details
    public function saveAddUserAccount(Request $request)
    {
        $activeRole = $this->preDefiend->getRoleName(Auth::user()->role);
        $request->validate([
            'role' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|numeric|min:10',
            'password' => 'required|string|min:8',
        ]);

        $checkMail = User::where(['email'=>$request->email])->first();
        if(isset($checkMail->email)){
            return redirect()->back()->with('warning','User eMail already registered..!');
        }else{
            $checkMobile = User::where('mobile',$request->mobile)->first();
            if(isset($checkMobile->mobile)){
                return redirect()->back()->with('warning','User mobile number is already registered..!');
            }else{
                try {
                    $createUser =  User::create(['name'=>$request->name,'email'=>$request->email,'mobile'=>$request->mobile,'password'=>Hash::make($request->password),'role'=>$request->role,'access' => 0,'status'=>1])->id;
                    if($createUser > 0):
                        //TODO:: Create and send user account activate link to mail
                        return redirect('aPanel/'.strtolower(urlencode($activeRole->role_name)).'/users')->with('success','User account as successfully created. Activation link sent to user email.');
                    else:
                        return redirect()->back()->with('failed','User account registration Failed. Please check it once. Try again.!');
                    endif;
                }catch (\Exception $e){
                    return redirect()->back()->with('failed','Invalid request to create user account..!');
                }
            }
        }
    }

    //edit user details
    public function editUserAccount(Request $request)
    {

    }
}
