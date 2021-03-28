@extends('admin.adminmaster')
@section('content')
<div class="container">

      <form method="POST" 
      action="{{url('admin/programs/add-program/')}}" enctype="multipart/form-data">
          @csrf
          <div class="field">
        <label class="label">Program Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Program Name" name ="name">
        </div>
      </div>
      <div class="field">
        <label class="label">Program Detail</label>
        <div class="control">
        <input class="input" type="text" placeholder="Program Detail" name ="detail">
        </div>
      </div>

<!-- <div class="field">
  <label class="label">Program Picture</label>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="picture">
    <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label>
  </div>
</div> -->

<label for="myfile">Select files:</label>
  <input type="file" id="myfile" name="picture" multiple><br><br>


<!-- <div class="input-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="picture">
    <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label>
  </div>
</div> -->

    

    
    <button class="button is-success">Submit</button>
  </form>

</div>

@stop