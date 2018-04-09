@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex">
                    <h1>Categories</h1>
                    <p class="btn float-right"><a href="{{ URL::route('add_category') }}" class="btn btn-success">Create a category</a></p>
                </div>
                <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->description }}</td>
                            </tr>
                        @empty
                            <p>There isn't any category.. create one <a href="{{ URL::route('add_category') }}" class="btn btn-primary">here</a></p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{ URL::route('homepage') }}" class="btn btn-primary">Return</a>
    </div>
@endsection
