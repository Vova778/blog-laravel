@extends('layouts.app')

@section('content')
  @include('admin.post.form', ['post' => $post])
@endsection
