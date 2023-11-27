@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                 <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <div class="container-fluid">
                  <a class="navbar-brand h1" href={{ route('company.index') }}>CRUD Companys</a>
                  <div class="justify-end ">
                    <div class="col ">
                      <a class="btn btn-sm btn-success" href={{ route('company.create') }}>Add company</a>
                    </div>
                  </div>
                </div>
              </nav>
              <div class="container h-100 mt-5">
                <div class="row h-100 justify-content-center align-items-center">
                  @foreach ($companys as $company)
                    <div class="col-sm">
                      <div class="card">
                        <div class="card-header">
                          <a href="{{ route('company.show', $company->id) }}">

                            <h5 class="card-title">{{ $company->name }}</h5>
                          </a>

                        </div>
                        <div class="card-body">
                          <p class="card-text">{{ $company->email }}</p>
                          <p class="card-text">

                            <img src="<?php echo 'http://localhost/auth/storage/app/public/'.$company->logo;?>" width="100">
                           
                          </p>
                          

                          <p class="card-text">{{ $company->website }}</p>

                        </div>

                        
                        <div class="card-footer">
                          <div class="row">
                            <div class="col-sm">
                              <a href="{{ route('company.edit', $company->id) }}"
                        class="btn btn-primary btn-sm">Edit</a>
                            </div>
                            <div class="col-sm">
                                <form action="{{ route('company.destroy', $company->id) }}" method="post">
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
