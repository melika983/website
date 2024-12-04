<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'uuid' => 'required',
            'address' => 'required',
        ]);


        $inputs = $request->all();
        //dd($inputs);
        $company = null;
        if (isset($inputs['id']) && strlen($inputs['id']) > 0) {
            $company = Company::find($inputs['id']);
            unset($inputs['id']);
        }

        if (!$company) {
            $company = new Company();
        }
        $company->fill($inputs);
        $company->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $company = Company::find($_POST['id']);
        $company->delete();
        return redirect()->back();
    }

    public function info(Request $request)
    {
        return Company::query()->find($request->id);
    }

    public function Company()
    {
        $Company = Company::query()->paginate(10);
        return view('admin.Company', compact('Company'));
    }
}
