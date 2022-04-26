@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <h1>Edit question</h1>
        <form action="{{ route('q.update', $question->id) }}" method="POST" class="create-form">
            @method('put')
            @csrf

            <div class="create-form-title mb-3">
                <input name="title" type="text" id="title" placeholder="Question title" class="form-control"
                    value="{{ $question->title }}" />
            </div>

            <div class="create-form-description mb-3">
                <textarea rows="8" name="description" placeholder="Enter a description" class="form-control">
                    {{ $question->description }}
                </textarea>
            </div>
            <div class="actions">
                <input type="submit" value="Update Question" class="btn btn-primary" />
                <a href="{{ route('q.show', $question->id) }}" class="btn btn-outline-secondary ms-3">Cancel</a>
            </div>
        </form>
    </div>
@endsection
