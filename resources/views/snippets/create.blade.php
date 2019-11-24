@extends('layouts.app')

@section('content')
    <h1>New Snip</h1>

    <form action="/snippets" method="POST">
        {{ csrf_field() }}

        @if ($snippet->id)
            <input type="hidden" name="forked_id" value="{{ $snippet->id }}">
        @endif
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" placeholder="Enter title" value="{{ $snippet->title }}">
            <small id="titleHelp" class="form-text text-muted">Think of something catchy & descriptive</small>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="language">Language</label>
                <select name="language_id" class="form-control">
                    <option selected>Choose...</option>
                    @foreach($languages as $language)
                        <option value="{{$language->id}}">{{$language->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea rows="4" name="body" type="text" class="form-control">{{ $snippet->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publish Snip</button>
    </form>
@endsection
