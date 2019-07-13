@extends('layouts.app')

@section('title','Create Customer')
    


@section('content')
   
   
       
    <div class="row">
        <div class="col-6">
            <form action="/company" method="POST">
                @include('companies/form')
                @csrf
            </form>
        </div>
    </div>
   


 

@endsection