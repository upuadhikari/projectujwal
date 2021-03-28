@extends('admin.adminmaster')
@section('content')
<div class="container">

      <form method="POST" 
      action="{{url('admin/experts/add-expert/')}}" enctype="multipart/form-data">
          @csrf
          <div class="field">
        <label class="label">Expert Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="ProgramName" name ="name">
        </div>
      </div>
      <div class="field">
        <label class="label">Experience</label>
        <div class="control">
          <input class="input" type="text" placeholder="ProgramDetail" name ="experience">
        </div>
        <div class="field">
        <label class="label">Mobile Number</label>
        <div class="control">
          <input class="input" type="text" placeholder="ProgramDetail" name ="mobile">
        </div>

        <div class="field">
        <label class="label">Profile Picture</label>
        <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="picture">
    <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label>
  </div>
        
      </div>
 <button class="button is-success">Submit</button>
  </form>

</div>

@stop