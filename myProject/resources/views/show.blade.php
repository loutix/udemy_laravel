@extends('layouts.app')


@section('content')

    <div>

        <h2>Show page</h2>
        @foreach ($post as $detail)
            <ul>
                <li>Hello data : {{ $detail }}</li>
            </ul>

        @endforeach

    </div>

<a href="{{url('/form/'.($post1->id).'/edit')}}"><button>Editer </button> </a>

<br>


@endsection

@section('footer')

@endsection
