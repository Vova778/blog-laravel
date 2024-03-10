@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column gap-3">
                @foreach ($posts as $post)
                    <x-post-card :$post>
                        <div>
                            <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">
                                Show
                            </a>
                        </div>
                    </x-post-card>
                @endforeach

                <x-pagination :paginator="$posts" />

            </div>
            <div class="col-md-2">
                <x-sidebar />
            </div>
        </div>
    </div>

@endsection
