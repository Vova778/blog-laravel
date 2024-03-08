@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column gap-3">
                @foreach ($articles as $article)
                    <x-article-card :$article>
                        <div>
                            <a class="btn btn-primary" href="{{ route('articles.show', $article) }}">
                                Show
                            </a>
                        </div>
                    </x-article-card>
                @endforeach

                <x-pagination :paginator="$articles" />

            </div>
            <div class="col-md-2">
                <x-sidebar />
            </div>
        </div>
    </div>

@endsection
