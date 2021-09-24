@extends('layouts.app')


@section('content')


    <h3>Form</h3>

    {{-- <form  method="post" action="/form">
      {{ csrf_field() }}

        <label for="toto">First name:</label>
        <input type="text" id="toto" name="title"><br><br>
        <input type="submit" value="valider">
    </form> --}}



    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(['url' => '/form', 'method' => 'post', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title :') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'enter a title']) !!}
    </div>

    <br>

    <div class="form-group">
        {!! Form::label('upload', 'upload :') !!}
        {!! Form::file('upload', ['class' => 'form-control']) !!}
    </div>

    <br>



    {!! Form::submit('Nouveau', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection

@section('footer')

@endsection
