@extends('layouts.app')


@section('content')

    <h3>EDIT</h3>

    <p>{{$editPost->title}}</p>

    <form  method="POST" action="/form/{{$editPost->id}}">
      {{ csrf_field() }}

      <input type="hidden" name="_method" value="PUT">
        <label for="toto">Titre:</label>
        <input type="text" id="toto" name="title" placeholder="entrer un titre" value='{{$editPost->title}}'><br>
        <input type="submit" value="modifier">
    </form>

    <br>

    <h3>DELETE</h3>
    {{$editPost->id}}

    <form  method="post" action="/form/{{$editPost->id}} ">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="supprimer">
    </form>

@endsection

@section('footer')

@endsection


