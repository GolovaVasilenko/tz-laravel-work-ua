@extends('layout')

@section('content')

    <div class="row">
        <div class="col">
            <form action="{{ route('genres.store') }}" method="post">
                @csrf
                <input type="text" class="form-control" name="genre_name" value="{{ old('genre_name') }}" />
                <button type="submit" class="btn btn-sm btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
