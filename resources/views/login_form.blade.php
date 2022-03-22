@extends('layouts')
@section('title')
Quiz | Login
@endsection
@section('content')
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 form_box">
                    @if(count($errors) > 0)
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger alert-dismissible show" role="alert">{{ $error }}</li>
                        @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <!-- Username input -->
                        <div class="mt">
                            <label class="form-label" for="form2Example1">Username</label>
                            <input type="text" name="username" placeholder="Enter Name" id="form2Example1" class="form-control" />
                        </div>

                        <div class="mt">
                          <label class="form-label" for="form2Example1">Email address</label>
                          <input type="email" name="email" placeholder="Enter Email" id="form2Example1" class="form-control" />
                         
                        </div>
                      
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        
            @endsection
   
