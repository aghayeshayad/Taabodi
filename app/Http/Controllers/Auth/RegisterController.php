<?php

namespace App\Http\Controllers\Auth;

use App\Events\SendSmsVerification;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        ($this->validator($request->all()))->validate();

        $user = $this->create($request->all());
        $user->assignRole('User');

        return redirect('/');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'mobile' => ['required', 'max:11', 'min:11', 'unique:users'],
            'name' => 'required',
            'email' => 'nullable|email',
            'role' => 'required',
            'password' => ['required','min:6']

        ],
            [
                'mobile.required' => 'شماره تماس اجباری است',
                'role.required' => 'پذیرفتن قوانین اجباری است',
                'name.required' => 'نام کاربری اجباری است',
                'password.required' => 'رمزعبور اجباری است',
                'email.email' => 'ایمیل درست وارد نشده است',
                'mobile.unique' => 'شماره تماس تکراری است',
                'mobile.max' => 'طول شماره تماس بیش تر از 11 رقم است',
                'mobile.min' => 'طول شماره تماس کم تر از 11 رقم است',
                'password.min' => 'رمز عبور حداقل باید 6 کاراکتر باشد',
            ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'mobile' => $data['mobile'],
            'name' => $data['name'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        auth()->login($user);
        
        return $user;
    }

    public function verify(Request $request)
    {
        $rules = [
            'mobile' => 'required|max:11|min:11',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return new Response('کد اعتبارسنجی یا شماره تماس نادرست است', 201);
        }
        $userInfo = User::where('mobile', $request->mobile)->where('trans_code', $request->trans_code)->first();
        if ($userInfo) {
            $userInfo->update([
                'trans_code' => null,
                'verified' => 1
            ]);
            return $request->wantsJson()
                ? new Response('', 201)
                : redirect()->route('login');
        } else {
            session()->flash('errors', 'کد اعتبارسنجی نادرست است');
            return back();
        }
    }
}
