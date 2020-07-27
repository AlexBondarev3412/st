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

                    {{ __('You are logged in!') }}
                    <div class="comments">
                        <ul class="list-group">
                            {{$users}}
                            {{session('id')}}
{{--                            @foreach($user->comments as $comment)--}}
{{--                                <li class="list-group-item">--}}
{{--                                    <strong>--}}
{{--                                        {{ $comment->created_at->diffForHumans() }}:--}}
{{--                                    </strong>--}}
{{--                                    {{ $comment->body }}--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-block">
                            <form method="POST" action="/user/{id}/comments">
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
