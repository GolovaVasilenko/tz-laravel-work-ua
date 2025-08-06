@extends('layout')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Edit Movie</h2>

            <form method="post" action="{{ route('movies.update', [$movie]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select name="genres[]" multiple size="4">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}"
                            @foreach($movie->genres as $mg)
                                @if($genre->id == $mg->id) selected @endif
                            @endforeach
                            >{{ $genre->genre_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Movie Name</label>
                    <input class="form-control" type="text" name="film_name" value="{{ $movie->film_name }}">
                </div>
                @if($movie->poster)
                    <div class="form-group">
                        <img src="{{ $movie->poster }}" width="280" />
                    </div>

                @else
                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="poster" class="form-control">
                    </div>
                @endif

                <div class="form-check">
                    <input class="form-check-input" name="status" @if($movie->status) checked @endif type="checkbox" value="1" id="checkDefault">
                    <label class="form-check-label" for="checkDefault">
                        Status Published
                    </label>
                </div>
                <button type="submit" class="btn btn-sm btn-success">Add New Movie</button>
            </form>
        </div>
    </div>

@endsection
