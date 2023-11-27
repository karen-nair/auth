<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;


class CompanyController extends Controller
{
   /**
     * Show the list of companies.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companys = Company::all();
        return view('company.index', compact('companys'));
    }

    /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {

        $request->validate([
          'name' => 'required|max:255'
        ]);

        if($request->hasFile('logo')){
          $file = $request->file('logo');
          $filename = $file->getClientOriginalName();
          $file->storeAs('public/',$filename);
        }

        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $filename;
        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('company.index')
          ->with('success', 'Company created successfully.');
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
        $request->validate([
          'name' => 'required|max:255'
        ]);
        $company = Company::find($id);
        $company->update($request->all());
        return redirect()->route('company.index')
          ->with('success', 'Company updated successfully.');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('company.index')
          ->with('success', 'Company deleted successfully');
      }

      /**
       * Show the form for creating a new company.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
        return view('company.create');
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
        $company = Company::find($id);
        $employees = Employee::where('company', '=', $id)->get();

        return view('company.show', ['company'=> $company, 'employees'=>$employees]);
      }

      /**
       * Show the form for editing the specified company.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
        $company = Company::find($id);
        return view('company.edit', compact('company'));
      }
}
