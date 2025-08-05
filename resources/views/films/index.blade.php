@extends('layout')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Movie List</h2>
            <div class="hblock">
                <a href="{{ route('movies.create') }}" class="btn btn-sm btn-primary">Create new Movie</a>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Poster</th>
                        <th>Movie Name</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($movies as $movie)
                        <tr>
                            <td><img src="{{ $movie->poster }}" width="100"></td>
                            <td>{{ $movie->film_name }}</td>
                            <td>@if($movie->status) published @else not published @endif</td>
                            <td>{{ $movie->created_at }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('movies.edit', [$movie]) }}">Edit</a>
                                <form action="{{ route('movies.destroy', [$movie]) }}" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3">Not Found Movies!</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
