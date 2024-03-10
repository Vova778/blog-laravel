@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-center">Dashboard</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('articles.create') }}" class="btn btn-success ml-]">Add New Post</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Num of Comments</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->user->name }}</td>
                                            <td>{{ $article->comments_count }}</td>
                                            <td>{{ $article->created_at }}</td>
                                            <td>{{ $article->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('articles.show', $article) }}" class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('articles.edit', $article) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <x-pagination :paginator="$articles" />

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
