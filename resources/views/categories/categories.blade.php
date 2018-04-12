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
                {{--<ul class="list-group list-group-flush">--}}
                        {{--@forelse ($categories as $category)--}}
                            {{--<li @empty($category->parent_id ) class="list-group-item parent-category cat-{{$category->id}}" data-cat="{{$category->id}}"@endif--}}
                            {{--@isset($category->parent_id ) class="list-group-item child-category parent-{{$category->parent_id}}" data-parent="{{$category->parent_id}}" @endif>--}}
                                {{--<a href="{{ route('category', $category->id) }}">{{ $category->title }}</a>--}}
                            {{--</li>--}}
                        {{--@empty--}}
                            {{--<p>There isn't any category.. create one <a href="{{ route('add_category') }}" class="btn btn-primary">here</a></p>--}}
                        {{--@endforelse--}}
                {{--</ul>--}}
                {{--<br>--}}

                @forelse ($categories as $category)
                @empty($category->parent_id )
                <div class="card">
                    <h5 class="card-header parent-category cat-{{$category->id}}"><a href="{{ route('category', $category->id) }}">{{ $category->title }}</a></h5>
                </div>
                @endif
                @isset($category->parent_id )
                    <div class="card-body">
                        <p class="card-text child-category parent-{{$category->parent_id}}" data-parent="{{$category->parent_id}}" >
                            <a href="{{ route('category', $category->id) }}">{{ $category->title }}</a></p>
                @endif
                @empty
                    <p>There isn't any category.. create one <a href="{{ route('add_category') }}" class="btn btn-primary">here</a></p>
                @endforelse
            </div>
        </div>
        <a href="{{ route('homepage') }}" class="btn btn-primary">Return</a>
    </div>
@endsection
