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
                        <h3>Add a Company</h3>
                        <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                          </div>

                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                          </div>

                           <div class="form-group">
                            <label for="logo">Logo</label>

                            <input type="file" name="logo"  id="logo" class="form-control" placeholder="Logo">
                            <div class="form-control-position">
                                <i class='bx bx-photo-album'></i>
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website">
                          </div>

                         
                          <br>
                          <button type="submit" class="btn btn-primary">Create Company</button>
                        </form>
                      </div>
                    </div>
                  </div>
              
                        </div>
                    </div>
                </div>
            </div>
@endsection
