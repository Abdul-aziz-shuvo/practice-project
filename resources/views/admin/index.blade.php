@extends('layouts.app')

@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Action</th>
           
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                   
                    <td> {{ implode(',', $user->roles()->get()->pluck('name')->toArray() ) }} </td>
                   

                    <td><a href="{{ route('users.edit',$user->id ) }}" class="btn btn-primary float-left">Edit</a>

                    <form action="{{ route('users.destroy',$user->id) }}" method='POST'>
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger float-right" onclick ="return PreventDelete()">delete</button>
                    </form>
                </td>
                </tr>
                
            @endforeach

            
        </tbody>
    </table>
    {{ $users->links() }}
    <script>

              
        function PreventDelete(){
            return confirm('Are you sure?');
        }
    </script>
@endsection