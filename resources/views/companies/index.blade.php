@extends('layouts.app')

@section('title','Company list')
    

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="company/create" class="btn btn-primary mb-5">Add Company</a>
                </div>
                <div class="col-6">
                    <table class="table  table-bordered">
                        <tr>
                            <th colspan="3">Company Name</th>
                        </tr>

                        <div class="row">
                            <?php $count = 1; ?>
                                @foreach ($companies as $company)
                                <tr>
                                    <td>{{$count++}}</td>
                                   
                                        <td>{{$company->name}}</td>                                 
                                   
                                <td>
                                    <form action="/company/{{$company->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                                    
                                  

                                </tr>
                            @endforeach
                        </div>

                      
                    </table>
                </div>
            </div>
        </div>




@endsection