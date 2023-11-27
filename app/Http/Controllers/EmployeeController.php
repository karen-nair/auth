<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;


class EmployeeController extends Controller
{
   /**
     * Show the list of employees.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
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
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255'

        ]);


        $employee = new Employee();
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->company = $request->input('company');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();

        return redirect()->route('employees')
          ->with('success', 'employee created successfully.');
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
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255'

        ]);
        $employee = Employee::find($id);

        $employee->update($request->all());
        return redirect()->route('employees')
          ->with('success', 'employee updated successfully.');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees')
          ->with('success', 'employee deleted successfully');
      }

      /**
       * Show the form for creating a new employee.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
        $companys = \App\Models\Company::all();

        return view('employee.create', ['companies'=>$companys]);
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
        $employee = Employee::find($id);
        $company = Company::where('id', '=', $employee->company)->get();

        return view('employee.show', ['employee'=>$employee, 'companies'=>$company]);
      }

      /**
       * Show the form for editing the specified employee.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
      }
}
