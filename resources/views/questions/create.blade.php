@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <h1>Create question</h1>
        <form action="{{ route('q.store') }}" method="POST" class="create-form">
            @method('post')
            @csrf

            <div class="create-form-title mb-3">
                <input name="title" type="text" id="title" placeholder="Question title" class="form-control" />
            </div>

            <div class="create-form-description mb-3">
                <textarea rows="8" name="description" placeholder="Enter a description" class="form-control"></textarea>
            </div>
            <div class="actions">
                <input type="submit" value="Create Question" class="btn btn-primary" />
            </div>
        </form>
    </div>
@endsection
