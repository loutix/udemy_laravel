<x-admin-master>

    @section('content')

        <h1>Users</h1>

        @if (session('user-deleted'))

            <div class='alert alert-danger '>
                {{ session('user-deleted') }}
            </div>
        @endif

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Avatar</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated at</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Avatar</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated at</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </tfoot>


            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <img height='60px' src='{{ $user->avatar }}'>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>

                        <td>
                            <a href="">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                        </td>

                        <td>
                            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                            {!! Form::submit('supprimer', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>

        {{ $users->links() }}
    @endsection


    @section('scripts')

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        {{-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}


    @endsection



</x-admin-master>
