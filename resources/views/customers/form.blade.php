<div class="from-group">
        <label for="" class="mr-3">Name : </label>  
      <input type="text" name='name' value='{{old('name', $customer->name)}}' class="form-control">
        <span class="text-danger">{{$errors->first('name')}}</span>
      </div>
    <br>
      <div class="from-group">
        <label for="" class="mr-3">email : </label>  
        <input type="text" name='email' value='{{old('email', $customer->email)}}' class="form-control">
        <span class="text-danger">{{$errors->first('email')}}</span>

        <label for="status">Status</label>
        <select name="active"  id="" class="form-control">
          <option disabled>Select customer status</option>

         @foreach ($customer->activeOptions()  as $activeOptionKey => $activeOptionValue)
              <option value="{{$activeOptionKey}}" {{$customer->active == $activeOptionValue ? 'selected' : ''}}>
                {{$activeOptionValue}}</option>
         @endforeach
       
        
        </select>


        <label for="company_id">Company</label>
        <select name="company_id"  id="company_id" class="form-control" >
          @foreach ($companies as $company)

        <option value="{{$company->id}}" {{$company->id == $customer->company_id ? 'selected' : ''}}>{{$company->name}} </option>
              
          @endforeach
        </select>
        
      </div>