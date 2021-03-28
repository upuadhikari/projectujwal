@extends('admin.adminmaster')
@section('content')
<div class="container">

      <form method="POST" 
      action="{{url('admin/programs/add-program/')}}">
          @csrf
          <div class="field">
        <label class="label">Program Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="ProgramName" name ="name">
        </div>
      </div>
      <div class="field">
        <label class="label">Program Detail</label>
        <div class="control">
        <input class="input" type="text" placeholder="ProgramName" name ="name">
        </div>
      </div>


    

  <div class="field">
  <label class="label">Program Picture</label>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="profile_pic">
    <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label>
  </div>
</div>

    

    
    <button class="button is-success">Submit</button>
  </form>

</div>

@stop