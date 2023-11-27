@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                 <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <div class="container-fluid">
                  <a class="navbar-brand h1" href={{ route('employees') }}>CRUD employees</a>
                  <div class="justify-end ">
                    <div class="col ">
                      <a class="btn btn-sm btn-success" href={{ route('employee.create') }}>Add employee</a>
                    </div>
                  </div>
                </div>
              </nav>
              <div class="container mt-5">
                <div class="row">
                  @foreach ($employees as $employee)
                    <div class="col-sm">
                      <div class="card">
                        <div class="card-header">
                          <h5 class="card-title">{{ $employee->name }}</h5>
                        </div>
                        <div class="card-body">
                          <p class="card-text">{{ $employee->email }}</p>
                          <p class="card-text">

                            <img src="<?php echo 'http://localhost/auth/storage/app/public/'.$employee->logo;?>" width="100">
                           
                          </p>
                          

                          <p class="card-text">{{ $employee->website }}</p>

                        </div>

                        
                        <div class="card-footer">
                          <div class="row">
                            <div class="col-sm">
                              <a href="{{ route('employee.edit', $employee->id) }}"
                        class="btn btn-primary btn-sm">Edit</a>
                            </div>
                            <div class="col-sm">
                                 <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
