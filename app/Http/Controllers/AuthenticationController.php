<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\Authentication\SignupRequest;
use App\Http\Requests\Authentication\SigninRequest;
use Exception;
class AuthenticationController extends Controller
{
    use ResponseTrait;

    public function signUpForm() {
        return view('authentication.register');
    }

    public function signUpStore(SignupRequest $request) {
        try{
            $user=new User;
            $user->	full_name=$request->full_name;
            $user->name=$request->name;
            $user->phone=$request->phone;
            $user->email=$request->email;
            $user->password=sha1($request->password);
            $user->role_id=2;
            if($user->save())
            return redirect('login')->with($this->resMessageHtml(true,null,'Successfully Registred'));
        }catch(Exception $e){
            dd($e);
            return redirect('login')->with($this->resMessageHtml(false, 'error', 'Please try again'));
        }
    }
    public function signInForm(){
        return view('authentication.login');
    }
    public function signInCheck(SigninRequest $request) {
        try{
            $user=User::where('phone',$request->PhoneNumber)->where('password',sha1($request->password))->first();
            if($user) {
                $this->setSession($user);
                return redirect()->route($user->role->identity.'.dashboard')->with($this->resMessageHtml (true, null, 'Successfully login'));
            }
        }catch(Exception $e) {
            dd($e);
            return redirect('login')->with($this->resMessageHtml(false, 'error', 'Your phone number or password is wrong!'));
        }
    }
    public function setSession ($user){
        return request()->session()->put(
            [
                'userId'=>$user->id,
                'fullName'=>$user->full_name,
                'userName'=>$user->name,
                'role'=>$user->role->type,
                'identity'=>$user->role->identity,
                'language'=>$user->language,
                'image'=>$user->image?$user->image:'no-image.png'
            ]
        );
    }
    public function singOut(){
        request()->session()->flush();
        return redirect('login')->with($this->resMessageHtml(false,'error','Successfully Logout!'));
    }
}
