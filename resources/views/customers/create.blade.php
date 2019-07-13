
@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-5 mt-4">
        <h1 class="mb-4">Add Customer</h1>
        <form action="{{ route('customer.store') }}" method='POST'>
          @csrf
        
          @include('customers.form')
        
          <br>
          <button class="btn btn-primary ml-1">Save</button>
         
        </form>
      </div>
</div>

@endsection