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

            <h1>Edit</h1>

            {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

            <div class='form-group'>
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label('post_image', null) !!}

                <div class="mb-2">
                    <img height='100px' src='{{ $post->post_image }}'>
                </div>

                {!! Form::file('post_image', ['class' => 'form-control-file']) !!}

                <br>

                <div class='form-group'>
                    {!! Form::label('body', 'Body') !!}
                    {!! Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Enter the article']) !!}
                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}

                {!! Form::close() !!}

            </div>
        @endsection


</x-admin-master>
