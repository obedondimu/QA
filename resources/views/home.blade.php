@extends('layouts.app')

@section('content')
    <div class="questions">
        @foreach ($questions as $question)
            <div class="questions-item">
                <div class="questions-item-wrap">
                    <div class="questions-item-user-icon"></div>
                    <a class="questions-item-title" href="{{ route('q.show', $question->id) }}">
                        {{ $question->title }}
                    </a>
                </div>
                <div class="questions-item-wrap">
                    <div class="questions-item-votes"></div>
                    <div class="questions-item-description">
                        {{ $question->description }}
                    </div>
                </div>
                <div class="questions-item-wrap">
                    <div></div>
                    <div class="questions-item-reactions"></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
