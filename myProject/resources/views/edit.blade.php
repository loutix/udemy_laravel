@extends('layouts.app')


@section('content')

    <h3>EDIT</h3>

    <p>{{ $editPost->title }}</p>

    {{-- <form  method="POST" action="/form/{{$editPost->id}}">
      {{ csrf_field() }}

      <input type="hidden" name="_method" value="PUT">
        <label for="toto">Titre:</label>
        <input type="text" id="toto" name="title" placeholder="entrer un titre" value='{{$editPost->title}}'><br>
        <input type="submit" value="modifier">
    </form> --}}

    {!! Form::open(['url' => '/form/' . $editPost->id, 'method' => 'put']) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title : ') !!}
            {!! Form::text('title', ($editPost->title), ['placeholder'=>'modifier le titre']) !!}
        </div>

        {!! Form::submit('validation modification', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
    {{-- <input type="text" id="toto" name="title" placeholder="entrer un titre" value='{{ $editPost->title }}'><br>
    <input type="submit" value="modifier"> --}}
    <br>

    <h3>DELETE the number id: <u>  {{ $editPost->id }}</u></h3>

    {!! Form::open(['route'=>['form.destroy',$editPost->id],'method'=>'delete']) !!}
        {!! Form::submit('supprimer', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection

@section('footer')

@endsection
