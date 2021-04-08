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

        <label for="myfile">Select files:</label>
        <input type="file" id="myfile" name="picture" multiple><br><br>

        
      </div>
 <button class="button is-success">Submit</button>
  </form>

</div>

@stop