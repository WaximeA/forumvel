@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $category->title }}</h1>
                <p>{{ $category->description }}</p>
            </div>
        </div>
        <a href="{{ route('categories') }}" class="btn btn-primary">Return</a>
    </div>
@endsection
