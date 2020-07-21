@extends('bookshelf.bookshelf-index')
@section('title', "Книжная полка")
@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Автор</th>
            <th width="340px">Взаимодействие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($post as $p)
            <tr>
                <th scope="row"> {{ $p->id }}</th>
                <td>{{ $p->title }}</td>
                <td>{{ $p->author }}</td>
                <td><a href="{{ URL::to('bookshelf/'.$p->id) }}" class="btn btn-primary" style="width: 150px;margin-right: 10px">Прочитать книгу</a><a href="{{ URL::to('bookshelf/'.$p->id.'/edit/') }}" class="btn btn-primary" style="width: 150px;">Дописать книгу</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$post->links()}}
@endsection
