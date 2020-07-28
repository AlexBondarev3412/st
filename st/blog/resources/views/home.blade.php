@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>{{ __('Пользователь: '.$user->name) }}</h1>
                    <h3>{{ __('Комментарии: ') }}</h3>
                    <div class="comments">
                        <ul class="list-group">
                            @if(count($user->comments) == 0) {{ "Комментарии отсутствуют!" }}
                            @endif
                            @foreach($user->comments as $comment)
                                <li class="list-group-item" style="margin-bottom: 5px">
                                    <strong>
                                        {{ \App\User::find($comment->author_id)->name }} ({{ $comment->created_at->diffForHumans() }}):
                                    </strong> <br>
                                    {{ $comment->body }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-block">
                            <form method="POST" action="/user/{{ $user->id }}/comments">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <textarea name="body" placeholder="Напишите ваш комментарий" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
