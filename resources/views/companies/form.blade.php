<div class="form-group mt-5">
    <label for="company_name">Company Name : </label>
    <input type="text" id="company_name" name='name' class="form-control">
    <span class='text-danger'>{{$errors->first('name')}} </span>  
</div>
<button class="btn btn-success mt-3">Save</button>  
           
