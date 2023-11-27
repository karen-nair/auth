@extends('layouts.app')

@section('content')
 <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('company.index') }}>CRUDcompany</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('company.create') }}>Add Company</a>
                </div>
            </div>
    </nav>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $company->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $company->email }}</p>
                    <p class="card-text">{{ $company->logo }}</p>
                    <p class="card-text">{{ $company->website }}</p>
                    <p class="card-text">Employee(s)</p>

                    <ul>
                      @foreach ($employees as $employee)
                      <li>
                        <a class="btn btn-sm btn-success" href={{ route('employee.show', $employee->id) }}>
                          {{ $employee->first_name }}
                          {{ $employee->last_name }}
                        </a>
                      </li>
                      @endforeach

                    </ul>

                </div>

                
                <div class="card-footer">
                    <a href="{{ route('company.edit', $company->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('company.destroy', $company->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
