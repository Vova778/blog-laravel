@extends('layouts.app')

@section('content')
    @foreach ($articles as $article)
        <x-article-card class="" :$article>
            <div>
                <x-link-button :href="route('articles.show', $job)">
                    Show
                </x-link-button>
            </div>
        </x-article-card>
    @endforeach
@endsection
