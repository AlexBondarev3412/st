@extends('bookshelf.bookshelf-index')

@section('title', 'Просмотр книги')

@section('content')
    <h1>{{$post->title}}</h1>
    <h3>Автор: {{$post->author}}</h3>
    <p>{!! nl2br($post->text) !!}</p>

    <a href="{{ URL::to('bookshelf/'.$post->id.'/edit/') }}" class="btn btn-primary">Дописать книгу</a>
@endsection
