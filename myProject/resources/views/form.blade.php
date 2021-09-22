@extends('layouts.app')


@section('content')


<h3>Form</h3>

    <form  method="post" action="/form">
      {{ csrf_field() }}

        <label for="toto">First name:</label>
        <input type="text" id="toto" name="title"><br><br>
        <input type="submit" value="valider">
    </form>

@endsection

@section('footer')

@endsection


