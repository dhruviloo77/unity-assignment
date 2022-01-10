<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::all(); 
        $users = User::all();  

        return view('companies',compact('companies','users'));
    }

    public function store(Request $request) {

        $this->validate($request,[
            'cid' => 'required',
            'cname' => 'required',
        ]);

        $company = new Company;
        $company->id = $request->cid;
        $company->name = $request->cname;
        $company->save();

        return redirect('companies')->with(['message' => 'Company Successfully added.']);
    }

    public function update($id, Request $request) {

        $company = Company::find($id);
        $company->id = $request->cid;
        $company->name = $request->cname;
        $company->update();

        return redirect('companies')->with(['message' => 'Company Successfully Edited.']);
    }

    public function delete($id) {

        $company = Company::find($id);    
        $company->delete();

        return redirect('companies')->with(['message' => 'Company Successfully Deleted.']);
    }

    public function addUserToCompany($id, Request $request) {

        $user = User::find($request->user_id);
        $user->company_id = $id;

        $user->update();
        return redirect('companies')->with(['message' => 'User Successfully Added.']);

    }


}
