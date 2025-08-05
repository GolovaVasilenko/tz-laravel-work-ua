@extends('layout')

@section('content')

    <div class="row">
        <div class="col">
            <h2>Genre List</h2>
            <div class="hblock">
                <a href="{{ route('genres.create') }}" class="btn btn-sm btn-primary">Create new Genre</a>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Genre Name</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($genres as $genre)
                            <tr>
                                <td>{{ $genre->genre_name }}</td>
                                <td>{{ $genre->created_at }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ route('genres.edit', [$genre]) }}">Edit</a>
                                    <form action="{{ route('genres.destroy', [$genre]) }}" style="display:inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3">Not Found Genres!</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
