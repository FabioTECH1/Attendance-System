@extends('layout.layout')
@section('title', 'Welcome')

@section('content')
    <div class="row">
        <div class="col-sm-4"></div>
        @if (session('msge-2'))
            <div class="col-sm-4 alert alert-success alert-dismissible text-center my-2">
                <h5>{{ session('msge-2') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="alert">×</button>
            </div>
        @endif
        <div class="col-sm-4"></div>
    </div>
    <div class="container-fluid" style="width: 70%; text-align:center">
        <div class="row my-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 my-2">
                <a href="javascript:{}" class="text-decoration-none"
                    onclick="document.getElementById('add-catogory').style.display='flex';">
                    <img class="img-thumbnail p-4" src="/img/category.png" alt="" style="width: 400px">
                    <h5 class="text-secondary">Add new category</h5>
                </a>
            </div>
            <div class="col-sm-4"></div>
            @if (session('msge-1'))
                <p class="text-success">{{ session('msge-1') }} </p>
            @endif
            @error('category')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
        <div class="row" style="display:none" id="add-catogory">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="{{ route('add.category') }}" method="post">
                    @csrf
                    <input class="form-control my-1 shadow-none" type="text" name="category">
                    <button class="btn btn-primary" type="submit">Add</button>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
        @if ($categories->count() > 0)
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form action="{{ route('select.category') }}" method="post">
                        @csrf
                        <select class="form-select my-1 shadow-none" name="selcategory" id="">
                            @foreach ($categories as $category)
                                <option value="{{ $category->category }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary shadow-none" type="submit">Proceed</button>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        @endif
    </div>

@endsection
