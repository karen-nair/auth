@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                   <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                    <div class="container-fluid">
                      <a class="navbar-brand h1" href={{ route('company.index') }}>CRUD Company</a>
                      <div class="justify-end ">
                        <div class="col ">
                          <a class="btn btn-sm btn-success" href={{ route('company.create') }}>Add company</a>
                        </div>
                      </div>
                    </div>
                  </nav>

                 <div class="container h-100 mt-5">
                  <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-10 col-md-8 col-lg-6">
                      <h3>Update Company</h3>
                      <form action="{{ route('company.update', $company->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" name="name"
                            value="{{ $company->name }}" required>
                        </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email" name="email"
                            value="{{ $company->email }}" required>
                        </div>

                        <div class="form-group">
                          <label for="logo">Logo</label>
                          <input type="text" class="form-control" id="logo" name="logo"
                            value="{{ $company->logo }}" required>
                        </div>

                        <div class="form-group">
                          <label for="website">Website</label>
                          <input type="text" class="form-control" id="website" name="website"
                            value="{{ $company->website }}" required>
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
