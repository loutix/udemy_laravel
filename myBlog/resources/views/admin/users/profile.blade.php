<x-admin-master>


    @section('content')


        <h1>User Profile: {{ $user->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-4">
                {!! Form::open(['route' => ['user.profile.update', $user], 'method' => 'put', 'files' => true]) !!}


                <div class="m-4">
                    <img class="img-profile rounded-circle" height="80px"
                        src="{{ $user->avatar }}">
                </div>

                <div class="form-group">
                    {!! Form::label('avatar', 'Avatar') !!}
                    <br>
                    {!! Form::file('avatar', null, ['class' => 'form-control', 'placeholder' => 'enter a title']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', $user->username, [
                    'class' => 'form-control ' . ($errors->has('username') ? 'is-invalid' : ''),
                    'placeholder' => 'enter your username',
                    ]) !!}

                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('password-confirm', 'Confirm Password') !!}
                    {!! Form::password('password-confirm', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Valider', ['class' => 'btn btn-success']) !!}


                {!! Form::close() !!}

            </div>
        </div>



    @endsection






</x-admin-master>
