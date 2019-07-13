@extends('layouts.app')


@section('content')

    <div class="row">

            <div class="col-1 mt-4">
                <span><a href="/customer/{{$customer->id}}/edit" class="btn btn-info "> edit</a> </span>
            </div>

            <div class="col-1 mt-4">
                <form action="/customer/{{$customer->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </div> 
    </div>

    <div class="row">
        <div class=" col-6 mt-4" >

            <table class="table table-striped">
                    <thead>
                            <tr>
                             
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Active</th>
                              <th scope="col">Company Name</th>
                            </tr>
                    </thead>

                    <tbody>
                        <tr>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->active}}</td>
                                <td>{{$customer->company->name}}</td>
                        </tr>
                    </tbody>
            </table>


            
       </div>
    </div>



@endsection