<div class="form-group">
    <label for="name">Name</label>
  <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control"> 
      <div>{{ $errors->first('name') }}</div>
</div> 
 
<div class="form-group">
  <label for="email">Email</label>
  <input type="text" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control">
  <div>{{ $errors->first('email') }}</div>
</div>

<div class="form-group">
  <label for="active">Status</label>
  <select name="active" id="active" class="form-control">
     <option value="" disabled>Select customer status</option>

      @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
    <option value="{{$activeOptionKey}}" {{ $customer->active == $activeOptionValue ? 'selected' : ''}}>{{$activeOptionValue}}</option>
      @endforeach
  </select>
</div>

<div class="form-group">
  <label for="branch_id">Branch</label>
  <select name="branch_id" id="branch_id" class="form-control">
   @foreach ($branches as $branch)
     <option value=" {{ $branch->id }}" {{ $branch->id == $customer->branch_id ? 'selected' : ''}}>{{ $branch->name }}</option>
   @endforeach  
  </select>
</div>

@csrf
