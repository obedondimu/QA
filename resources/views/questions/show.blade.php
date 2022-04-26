@extends('layouts.app')

@section('content')
    <div class="question">
        <div class="question-wrap question-content">
            <div class="question-content-user-icon"></div>
            <h1 class="question-content-title">
                {{ $question->title }}
            </h1>
        </div>
        <div class="question-wrap question-content">
            <div class="question-content-votes"></div>
            <div class="question-content-description">
                {{ $question->description }}
            </div>
        </div>
        <div class="question-wrap">
            <div></div>
            <div class="question-content-recation d-flex justify-content-between">
                <div class="question-content-recation-stats"></div>
                <div class="question-content-recation-actions d-flex">
                    <button class="btn btn-secondary me-2" title="Comment">
                        <i class="fa-solid fa-comment-dots"></i>
                    </button>
                    @if ($question->is_author)
                        <a class="btn btn-primary me-2" title="Edit" href="{{ route('q.edit', $question->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('q.destroy', $question->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    @endif
                </div>

            </div>
        </div>

        <hr>

        @foreach ($question->answers as $answer)
            <div class="question-wrap question-content">
                <div class="question-content-votes"></div>
                <div class="question-content-description">
                    {{ $answer->description }}
                </div>
            </div>
        @endforeach

        <div class="question-answer">
            <form action="{{ route('q.answer') }}" method="POST">
                @csrf
                <div>
                    <label for="description">Answer</label>
                    <textarea name="description" id="description" rows="5" class="form-control"
                        placeholder="Enter your answer"></textarea>
                </div>
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <div><input type="submit" value="Answer" class="btn btn-primary"></div>
            </form>
        </div>
        {{-- <div class="question-answer">
            <form action="{{ route('q.answer.id', $question->id) }}" method="POST">
                @csrf
                <div>
                    <label for="description">Answer</label>
                    <textarea name="description" id="description" rows="5" class="form-control"
                        placeholder="Enter your answer"></textarea>
                </div>
                <div><input type="submit" value="Answer" class="btn btn-primary"></div>
            </form>
        </div> --}}

    </div>
@endsection
