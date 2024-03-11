@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 bg-light p-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-center">Dashboard</div>
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-end">
                            <a href="{{ route('posts.create') }}" class="btn btn-success ml-]">Add New Post</a>
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
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->comments_count }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>{{ $post->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('posts.show', $post) }}" class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
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

                        <x-pagination :paginator="$posts" />

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
