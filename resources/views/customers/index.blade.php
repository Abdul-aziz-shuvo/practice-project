

@extends('layouts.app')

@section('title','Customers List')


@section('content')

<div class="row">




  <div class="col-4  mt-4" >
      <a href="{{ route('customer.create') }}" class="btn btn-primary mb-5">Add Customer</a>
     
      <h1>Customers</h1>
          <table class="table table-bordered mt-3">
              <tr class="bg-info">
                <th scope='col'>Serial</th>
                <th  scope='col'>Customer name</th>
                
              </tr>
            <?php  $count = 1; ?>
                 @foreach ($customers as $customer)

                        <tr class="bg-dark text-white">
                          <th scope='row'>{{$count++}}</td>
                          <td><a href="customer/{{$customer->id}}">{{$customer->name}}</a></td>                     
                        </tr>

                 @endforeach
                </table>
  </div>
</div>


</div>
@endsection