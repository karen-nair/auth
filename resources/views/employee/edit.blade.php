@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employee') }}</div>

                   <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                    <div class="container-fluid">
                      <a class="navbar-brand h1" href={{ route('employees') }}>CRUD employee</a>
                      <div class="justify-end ">
                        <div class="col ">
                          <a class="btn btn-sm btn-success" href={{ route('employee.create') }}>Add employee</a>
                        </div>
                      </div>
                    </div>
                  </nav>

                 <div class="container h-100 mt-5">
                  <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-10 col-md-8 col-lg-6">
                      <h3>Update employee</h3>
                      <form action="{{ route('employee.update', $employee->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="first_name">First Name</label>
                          <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ $employee->first_name }}" required>
                        </div>

                        <div class="form-group">
                          <label for="last_name">Last Name</label>
                          <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ $employee->last_name }}" required>
                        </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email" name="email"
                            value="{{ $employee->email }}" required>
                        </div>

                        

                       <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ $employee->phone }}" required>
                        </div>
                        
                        <button type="submit" class="btn mt-3 btn-primary">Update Post</button>
                      </form>
                    </div>
                  </div>
                </div>
              
                        </div>
                    </div>
                </div>
            </div>
@endsection
