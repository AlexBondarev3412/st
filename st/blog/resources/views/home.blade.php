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
                    @if(!is_null($user))
                    <h1>{{ __('Пользователь: '.$user->name) }}</h1>
                    <h3>{{ __('Комментарии: ') }}</h3>
                    <div class="comments">
                        <ul class="list-group">
                            @if(is_null($user->comments)) {{ "Комментарии отсутствуют!" }}
                            @endif
                            @php
                                $i = 0;
                            @endphp
                            @foreach($user->comments as $comment)
                                <li class="list-group-item" style="margin-bottom: 5px">
                                    <strong>
                                        <a href="/user/{{ $comment->author_id }}"> {{ \App\User::find($comment->author_id)->name }}</a> ({{ $comment->created_at->diffForHumans() }}):
                                        @if($user->id == Auth::id() || $comment->author_id == Auth::id())
                                            <a href="{{ URL::to('comment/'.$comment->id.'/del/') }}" class="btn badge-danger" style="float:right;padding: 3px">Удалить комментарий</a>
                                        @endif

                                    </strong><br>


                                        {!! nl2br($comment->body) !!}

                                </li>
                                @if($loop->iteration > 4)
                                    @break
                                @endif
                            @endforeach
                        </ul>
                        @if(count($user->comments) > 5)
                            <center><a href="/" class="btn btn-primary" style="padding: 3px">Еще комментарии</a></center><br>
                        @endif

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
                @else
                    {{ "Пользователь не найден" }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
