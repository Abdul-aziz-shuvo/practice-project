@extends('layouts.app')

@section('title','Contact Information')
    


@section('content')
    <div class="container">
           <div class="row">
             <div class="col-5 mt-5">
               <h1>Email Us</h1>
                    <form class="mt-5">
                      <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1" class="font-weight-bold">Your Massage</label>
                        <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
              </div>

     

             <div class="col-6 offset-1 mt-5">
               <h1>Our Information</h1>
               <div class="mt-5">
                  <span class="font-weight-bold">Phone : </span> <span class="text-muted">+8801847156959</span>
                  <br><span class="font-weight-bold">Location : </span> <span class="text-muted">Hathazari,Chittagong</span>
               </div>
             </div>
           </div>
    </div> 
@endsection