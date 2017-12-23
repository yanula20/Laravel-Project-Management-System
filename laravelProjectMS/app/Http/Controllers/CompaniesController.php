<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Project;
use App\Company;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$companies = Company::all();

        if( Auth::check()) {


            $companies = Company::all();

            return view('companies.index', ['companies' => $companies]);

        } else {

            return view('auth.login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {

            $company = Company::create(
                [
                    'name' => $request->input('name'),

                    'description' => $request->input('description'), 

                    'user_id' => Auth::user()->id
                ]);
        } 

        if($company) {

            return redirect()->route('companies.show', ['company' => $company->id])->with('success', 'Company created!');

        } else {

            return back()->withInput()->with('errors', 'Error creating new company');

        }      
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {

        $company = Company::where('id', $company->id)->first();
        //$company = Company::find($company->id);
        return view('companies.show', ['company' => $company]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::where('id', $company->id)->first();

        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $companyUpdate = Company::where('id', $company->id)->update([

            'name' => $request->input('name'),

            'description' => $request->input('description')

            ]);

        if($companyUpdate) {

            return redirect()->route('companies.show', ['company' => $company->id])->with('success', 'Company updated sucessfully!');

        } else {

            return back()->withInput()->with('error', 'Company information not updated!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $findCompany = Company::where('id', $company->id);

        if (!$findCompany) {

            return back()->withInput()->with('error', 'Something went wrong in the database!');
            
        } else {

            $findCompany->delete();

            return redirect()->route('companies.index')->with('success', 'Company deleted successfully!');
            
        }
    }
}
