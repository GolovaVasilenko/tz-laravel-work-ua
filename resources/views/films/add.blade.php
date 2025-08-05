@extends('layout')

@section('content')
    <div class="row">
        <div class="col">
            <h2>ADD New Movie</h2>

            <form method="post" action="{{ route('movies.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select name="genres[]" multiple size="4">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Movie Name</label>
                    <input class="form-control" type="text" name="film_name">
                </div>

                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="poster" class="form-control">
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="status" type="checkbox" value="1" id="checkDefault">
                    <label class="form-check-label" for="checkDefault">
                        Status Published
                    </label>
                </div>
                <button type="submit" class="btn btn-sm btn-success">Add New Movie</button>
            </form>
        </div>
    </div>

@endsection
