@extends('layout')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('genres.update', [$genre]) }}">
                @csrf
                @method('PUT')
                <input type="text" class="form-control" name="genre_name" value="{{ $genre->genre_name }}" required />
                <button type="submit" class="btn btn-sm btn-success">Edit</button>
            </form>
        </div>
    </div>

@endsection
