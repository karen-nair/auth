@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employee') }}</div>

                   <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                    <div class="container-fluid">
                      <a class="navbar-brand h1" href={{ route('employees') }}>CRUD Employee</a>
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
                        <h3>Add a employee</h3>
                        <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                            <label for="first">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                          </div>

                          <div class="form-group">
                            <label for="first">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                          </div>

                          <div class="form-group">
                            <label for="company">Company</label>
                            <select class="form-control" name="company">
                               @foreach ($companies as $company)
                                <option value="{{ $company->id }}">
                                  {{ $company->name }}
                                </option>
                                @endforeach

                            </select>

                          </div>

                          <div class="form-group">
                            <label for="last">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                          </div>

                           <div class="form-group">
                            <label for="phone">Phone</label>

                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>

                         
                          <br>
                          <button type="submit" class="btn btn-primary">Create employee</button>
                        </form>
                      </div>
                    </div>
                  </div>
              
                        </div>
                    </div>
                </div>
            </div>
@endsection
