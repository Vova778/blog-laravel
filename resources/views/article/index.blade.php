@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column">
                @foreach ($articles as $article)
                    <x-article-card :$article />
                @endforeach
            </div>
        </div>
    </div>
@endsection
