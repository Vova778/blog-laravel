<!-- resources/views/articles/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-article-card :$article/>
            </div>
            <div class="col-md-2">
                <x-sidebar />
            </div>
            
        </div>
    </div>
@endsection
