@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex">
                    <h1>Categories</h1>
                    @if(!$isMember)
                        <p class="btn float-right"><a href="{{ URL::route('add_category') }}" class="btn btn-success">Create a category</a></p>
                    @endif
                </div>
                <br>
                @forelse ($categories as $category)
                @empty($category->parent_id )
                <div class="card">
                    <h5 class="card-header parent-category cat-{{$category->id}}"><a href="{{ route('category', $category->id) }}">{{ $category->title }}</a> <p>{{$category->description}}</p></h5>
                </div>
                @endif
                @isset($category->parent_id )
                    <div class="card-body">
                        <p class="card-text child-category parent-{{$category->parent_id}}" data-parent="{{$category->parent_id}}" >
                            <a href="{{ route('category', $category->id) }}">{{ $category->title }}</a> ({{$category->description}})</p>
                @endif
                @empty
                    <p>
                        <span>There isn't any category..</span>
                        @if(!$isMember)
                            <span>create one </span>
                            <a href="{{ route('add_category') }}" class="btn btn-primary">here</a>
                        @endif
                    </p>

                @endforelse
            </div>
        </div>
        <a href="{{ route('homepage') }}" class="btn btn-primary">Return</a>
    </div>
@endsection
