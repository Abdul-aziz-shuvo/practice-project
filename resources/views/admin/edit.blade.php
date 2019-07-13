@extends('layouts.app')

@section('content')

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="border p-5 shadow-sm">
          @method('PATCH')
          @csrf
          @foreach ($roles as $key => $role)
            <div class="form-group mt-3">
                    <input type="checkbox" id='role{{ $key+1 }}'  name='roles[]' value="{{ $role->id }}"
                        {{-- @foreach ($user->roles as $userRole)
                            {{ $userRole->name == $role->name ? 'checked' : ''}}
                        @endforeach --}} 
                           {{-- U can do first one too --}}

                        {{ $user->hasAnyRole($role->name) ? 'checked' : '' }}
                        >      
                    <label for="role{{ $key+1 }}">{{ $role->name  }}</label> 
                    
            </div>
          @endforeach
          <button type="submit" class="btn btn-primary">Update</button>
    </form>      

@endsection