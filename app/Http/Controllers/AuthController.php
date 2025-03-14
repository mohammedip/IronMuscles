<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Password;
use App\Repositories\AuthRepositoryInterface;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(LoginRequest $request ){

        $user = $this->authRepository->findByEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {

            return redirect()->back()->with('status', 'Invalid login information.');

        }else{
            Auth::login($user);
            // auth()->login($user);
            return view('/dashbord');
        }



    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register(RegisterRequest $request){

        $user =  $this->authRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        // auth()->login($user);

        return redirect()->route('dashbord')->with('status', 'Account created successfully.');
    }
    

    public function forget_password(Request $request){

        $request->validate(['email' => 'required|email']);

        $user=$this->authRepository->findByEmail($request->email);
        if (!$user) {
            return redirect()->back()->with('error', 'Email does not match any account.');
        }
        Password::createToken($user);

        $token = DB::table('password_reset_tokens')->where('email', $request->email)->first()->token;

        Mail::to($user->email)->send(new ResetPasswordMail($token, $user->name));
    
        
            return redirect()->route('forgot_password')->with('status', 'A reset link has been sent to your email.');
        

    }

    public function reset_password(Request $request){

        if($request->password == $request->password_confirmation){

            $token_email = DB::table('password_reset_tokens')->where('token', $request->token)->first();

            if (!$token_email ) {
                return redirect()->back()->with('error', 'Invalid or expired token.');
            }

            $email = $token_email->email;

            $user=$this->authRepository->findByEmail($email);
            if (!$user) {
                return redirect()->back()->with('error', 'Email does not match any account.');
            }
            DB::table('password_reset_tokens')->where('email', $token_email->email)->delete();

            $this->authRepository->update([
                'password' => Hash::make($request->password),
            ],$user);

            return redirect()->route('login')->with('status', 'Password reseted successfully.');
        }
        return redirect()->route('reset_password')->with('error', 'Password not confirmed.');
    }

    
}
