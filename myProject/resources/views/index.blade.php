@extends('layouts.app')


@section('content')

<div>
    <h3>Liste des postes</h3>

    @foreach ($posts as $post)

    <ul>
        <li><a href="{{route('form.show', $post->id)}}">{{$post->title}}</a></li>
    </ul>


    @endforeach



<a href="/form/create"><h4>create new</h4></a>


</div>


<button class="btn btn-danger">click</button>





@endsection

@section('footer')

@endsection


