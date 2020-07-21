@extends('bookshelf.bookshelf-index')
@section('title', "Редактирование книги")
@section('content')
    <div class="col-md-9">
        {!! Form::model($post, array('route' => array('bookshelf.update', $post->id), 'class' => 'form-inline', 'method' => 'PUT')) !!}
            <div class="form-group mb-2">
                <div class="col-md-3">
                    {!! Form::label('title', 'Название книги') !!}
                </div>
                <div class="col-md-9">
                    {!! Form::text('title',null, ['class' => 'form-control']) !!}
                </div>
            </div>
            @error('title')
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="alert alert-danger">Книга с таким названием уже существует</div>
                    </div>
                </div>
            @enderror
            <div class="form-group mb-2">
                <div class="col-md-3">
                    {!! Form::label('author', 'Автор') !!}
                </div>
                <div class="col-md-9">
                    {!! Form::text('author',null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="col-md-3">
                    {!! Form::label('text', 'Текст') !!}
                </div>
                <div class="col-md-9">
                    {!! Form::textarea('text',null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    {!! Form::submit('Готово',['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
