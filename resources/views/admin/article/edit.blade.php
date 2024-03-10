@extends('layouts.app')

@section('content')
  @include('admin.article.form', ['article' => $article])
@endsection
