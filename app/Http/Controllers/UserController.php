<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Reward;
use App\Models\UsersExport;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Dd;

class UserController extends Controller
{
    public function scan()
    {
        return view('scan');
    }

    public function main()
    {
        return view('main');
    }

    public function Users()
    {
        $User = User::query()->paginate(10);
        return view('admin.Users', compact('User'));
    }

    public function dashboard()
    {
        if (!\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('login-admin');
        }
        //dd('sss');
        return view('admin.dashboard');
    }

    public function Exit()
    {
        if (!\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('login-admin');
        }
        \Illuminate\Support\Facades\Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/'); // Redirect to
    }


    public function guide()
    {
        // dd($Company);
        return view('guide');
    }

//////////user

    public function edit($id)
    {
        $User = User::find($id);
        return view('edit', compact('User'));
    }

    public function update(Request $request, $id)
    {

        $User = User::find($id);
        $User->fullname = $request->input('fullname');
        $User->phone = $request->input('phone');
        $User->update();
        return redirect()->back()->with('User', 'users Updated Successfully');
    }

    public function usersDelete(Request $request, $id)
    {
        $User = User::find($id);
        $User->delete();
        return redirect()->back()->with('User', 'User delete Successfully');
    }

///////company
    public function editCompany($id)
    {
        $Company = Company::find($id);
        return view('edit', compact('Company'));
    }

    public function updateCompany(Request $request, $id)
    {

        $Company = Company::find($id);
        $Company->name = $request->input('name');
        $Company->address = $request->input('address');
        $Company->contact_name = $request->input('contact_name');
        $Company->contact_position = $request->input('contact_position');
        $Company->contact_phone = $request->input('contact_phone');
        $Company->description = $request->input('description');
        $Company->update();
        return redirect()->back()->with('Company', 'Company Updated Successfully');
    }

    public function DeleteCompany(Request $request, $id)
    {
        $Company = Company::find($id);
        $Company->delete();
        return redirect()->back()->with('Company', 'Company delete Successfully');
    }

/////////Reward


    public function editReward($uuid)
    {

        $Reward = Reward::find($uuid);

        return view('edit', compact('Reward'));
    }

    public function updateReward(Request $request, $uuid)
    {

        $Reward = Reward::find($uuid);
        $Reward->name = $request->input('name');
        $Reward->description = $request->input('description');
        $Reward->company_id = $request->input('company_id');
        $Reward->update();
        return redirect()->back()->with('Reward', 'Reward Updated Successfully');
    }

    public function DeleteReward(Request $request, $uuid)
    {
        $Reward = Reward::find($uuid);
        $Reward->delete();
        return redirect()->back()->with('Reward', 'Reward delete Successfully');
    }


    public function store(Request $request)
    {
//        dd($request->all());

        $inputs = $request->all();
        // بررسی اینکه پسورد جدیدی وارد شده یا خیر
        if ($request->has('password') && strlen($request->password) > 0) {
            $inputs['password'] = Hash::make($request->password);  // رمزگذاری پسورد جدید
        } else {
            unset($inputs['password']);  // اگر پسورد جدید وارد نشده، فیلد پسورد را نادیده بگیریم
        }

        $User = null;
        if (isset($inputs['id']) && strlen($inputs['id']) > 0) {
            $User = User::find($inputs['id']);
            unset($inputs['id']);
        }

        if (!$User) {
            $User = new User();  // در صورتی که کاربر جدید باشد
        }
        $User->fill($inputs);
//        $User->password = Hash::make($inputs['password']);
//        dd($User);
        $User->save();
//\dd($User);
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $User = User::find($_POST['id']);
        $User->delete();
        return redirect()->back();
    }

    public function info(Request $request)
    {
        return User::query()->find($request->id);
    }

    public function Company()
    {
        $User = Company::query()->paginate(10);
        // dd($Company);
        return view('admin.Users', compact('User'));
    }


    public function reportExcel(Request $request)
    {
        return (new UsersExport($request->id))->download('users.xlsx');
    }

}
