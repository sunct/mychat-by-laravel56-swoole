<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Mockery as m;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;

class RegisterController extends Controller
{
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
    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError','emailVerify']]);
    }
    // 验证失败后的跳转地址
    public $redirectIfVerificationFails = '/emails/verification-result/failure';
    // 检测到用户已经验证过后的跳转地址
    public $redirectIfVerified = '/emails/verification-result/success';
    // 验证成功后的跳转地址
    public $redirectAfterVerification = '/emails/verification-result/success';


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        $this->guard()->login($user);
        // 生成用户的验证 token，并将用户的 verified 设置为 0
        UserVerification::generate($user);

        // 给用户发邮件
        UserVerification::send($user, '请验证您的邮箱');

        return redirect($this->redirectPath());
    }


    public function emailVerify(Request $request)
    {
        $user = Auth::user();
        // 给用户发邮件
        if(!$user->verified){
            // 生成用户的验证 token，并将用户的 verified 设置为 0
            UserVerification::generate($user);
            UserVerification::send($user, '请验证您的邮箱');
            alert()->success('验证邮箱邮件发送成功！请注意查收！');
        }else{
            alert()->success('该邮箱已通过验证，无需再次验证！');
        }
        return redirect($this->redirectPath());

    }



}
