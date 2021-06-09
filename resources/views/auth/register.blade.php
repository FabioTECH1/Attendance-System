@extends('layout.layout')
@section('title', 'Welcome')

@section('content')

    <div class="container-fluid my-3 bg-white p-4" style="width: 35%;">
        <form action="{{ route('user.register') }}" method="post" class="row gx-3 gy-2 align-items-center">
            @csrf
            <input type="text" name="comp-name"
                class="form-control my-2 shadow-none @error('comp-name') border-danger @enderror" id=""
                placeholder="Company Name" value="{{ old('comp-name') }}">
            <input type="text" name="designation"
                class="form-control my-2 shadow-none @error('designation') border-danger @enderror" id=""
                placeholder="Designation" value="{{ old('designation') }}">
            <input type="name" name="name" class="form-control my-2 shadow-none @error('name') border-danger @enderror"
                id="" placeholder="Full Name" value="{{ old('name') }}">
            <input type="email" name="email" class="form-control my-2 shadow-none @error('email') border-danger @enderror"
                id="" placeholder="Email" value="{{ old('email') }}">
            <input type="tel" name="number" class="form-control my-2 shadow-none @error('number') border-danger @enderror"
                id="" placeholder="Mobile No." value="{{ old('number') }}">
            <input type="password" name="password"
                class="form-control my-2 shadow-none @error('password') border-danger @enderror" id=""
                placeholder="Password">
            <input type="password" name="password_confirmation"
                class="form-control my-2 shadow-none @error('password') border-danger @enderror" id=""
                placeholder="Repeat Password">

            <button type="submit" class="btn btn-primary shadow-none">Sign Up</button>
        </form>
    </div>
    <div class="container-fluid my-5 text-center ">
        <h5 class="">Already Registered ?</h5>
        <h6> <a class="text-decoration-none" href="{{ route('login') }}">Sign In<a></h6>
    </div>
@endsection
