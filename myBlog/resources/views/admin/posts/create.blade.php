<x-admin-master>
    @section('content')

        <div class="container">


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <h1>Create</h1>

            {!! Form::open(['action' => 'PostController@store', 'method' => 'POST', 'files' => true]) !!}

            <div class='form-group'>
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label('post_image', null) !!}
                {!! Form::file('post_image', ['class' => 'form-control-file']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label('body', 'Body') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter the article']) !!}
            </div>

            {!! Form::submit('Envoyer', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    @endsection


</x-admin-master>
