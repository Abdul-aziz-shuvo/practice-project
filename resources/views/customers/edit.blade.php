
@extends('layouts.app')

@section('title','Edit Customer ' . $customer->name)
    


@section('content')
<div class="row">
    <div class="col-8 mt-4">
    <h1 class="mb-4">Edit Customer {{$customer->name}}</h1>
    <form action="/customer/{{$customer->id}}" method='POST'>
          @method('PATCH')
          @csrf
          @include('customers.form')
        
          <br>
          <button class="btn btn-info ml-1">Save</button>
         
        </form>
      </div>
</div>

@endsection