<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Reward;
use App\Models\Statics;
use App\Models\User;

// Ensure your User model is correctly imported
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function username()
    {
        $username = Auth::user() ? Auth::user()->name : 'مهمان';
        return view('main', compact('username'));
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'phone' => 'required',
            ]);
            $user = User::where('phone', $request->input('phone'))->first();
            if ($user) {
                $randomcode = rand(100000, 999999);
                $user->sms_code = $randomcode;
                $user->password = Hash::make($randomcode);
                $user->save();
                session(['verifiecode' => $randomcode, 'phone' => $user->phone]);
                $phone = $user->phone;
                // dd( $randomcode);

                $this->GetCode($phone, $randomcode);
                return response()->json(['success' => true, 'message' => 'کد ارسال شد']);
            } else {
                //new user
                $phone = $request->input('phone');
                $randomcode = rand(100000, 999999);
                session(['verifiecode' => $randomcode, 'phone' => $phone]);
                //new user
                $user = new User();
                $user->fullname = $request->input('fullname');
                $user->phone = $phone;
                $user->password = Hash::make($randomcode);
                $user->sms_code = $randomcode;
                $user->save();

                $this->GetCode($phone, $randomcode);
                return response()->json(['success' => true, 'message' => 'کاربر ایجاد شد و کد ارسال گردید']);
            }
        }
        return view('register'); // Display the registration form
    }

    public static function GetCode($phone, $randomcode)
    {
        return Statics::sms([
            'mobile' => $phone,
            'templateId' => '128428',
            'parameters' => [
                [
                    'name' => 'CODE',
                    'value' => $randomcode
                ],
            ],
        ]);
    }

    public function handel($request)
    {
        if (!Auth::check()) {
            return redirect('/register');
        }
    }

    public function adminLogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::query()->where('phone', $request->username)->first();
        if ($user == null) {
            return back()->withErrors(['pass' => 'نام کاربری وجود ندارد']);
        }
        if (!$user->is_verified || !$user->is_admin) {
            return back()->withErrors(['pass' => 'دسترسی ندارید']);
        }
        if (Auth::attempt(['phone' => $request->username, 'password' => $request->password], true)) {
            return redirect(url('admin'));
        }
        return back()->withErrors(['pass' => 'رمز عبور نامعتبر']);
    }

    public function adminLoginShow(Request $request){
        return view('admin.login'); // Display the registration form
    }

    public function verify(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'pass' => 'required',
            ]);
            if ($request->pass == session('verifiecode')) {
                $phone = session('phone');
                $user = User::where('phone', $phone)->first();
                // dd($phone);
                // dd($user);
                if (!$user) {
                    return back()->withErrors(['pass' => 'کاربری وجود ندارد ']);
                }
                if ($user) {
                    if ($user->password == null) {
                        $user->is_verified = 1;
                        $user->save();
                        Auth::login($user);
                        return redirect()->intended('companies')->with('username', $user->fullname);
                    }
                    if (Auth::attempt(['phone' => $phone, 'password' => $request->pass], true)) {
                        $user->is_verified = 1;
                        $user->save();
                        return redirect()->intended('companies')->with('username', $user->fullname);
                    }
                }
                return back()->withErrors(['pass' => 'خطا در ورود']);

                // return redirect()->intended('main');
                // return view('main');

            }
            return back()->withErrors(['pass' => 'کد اشتباه است']);
        }
    }

    public function help()
    {
        return view('help');
    }
    public function about_us()
    {
        return view('site.about_us');
    }

    public function userRewards()
    {
        if (!Auth::check()){
            return redirect(env('SITE_URL') . '/register');
        }
        $rewards = Reward::query()->where(['user_id' => Auth::id()])
            //->select([''])
            ->join('rewards_details','reward_id','=','rewards.id')->get();
        //dd($rewards);
        return view('site.user_rewards', compact('rewards'));
    }

    public function page3()
    {
        return view('page3');
    }

    public function companies()
    {
//        if (!Auth::check()){
//            return redirect(env('SITE_URL') . '/register');
//        }
        $companies = Company::with('user')->get();
        $user = User::query()->find(Auth::id());
//        dd($companies);

        return view('site.companies', compact('companies','user'));
    }

}
