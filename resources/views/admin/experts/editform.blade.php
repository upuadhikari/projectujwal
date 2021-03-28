@extends('admin.adminmaster')
@section('content')
<div class="container">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('errors') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

  <form method="POST" 
action="{{url('admin/experts/edit-expert/'.$expert->id)}}">
          @csrf
          <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="name" value="{{$expert->name}}">
        </div>
      </div>

      <div class="field">
        <label class="label">Experience</label>
        <div class="control">
          <input class="input" type="text" placeholder name ="experience" value ="{{$expert->experience}}">
        </div>

        <div class="field">
        <label class="label">Mobile Number</label>
        <div class="control">
          <input class="input" type="text" placeholder="Mobile Number" name ="mobile" value ="{{$expert->mobile}}">
        </div>
    <button class="button is-success" style="margin-top:20px;" >Submit</button>

      </div>


      
<!--   <div class="input-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="profile_pic">
    <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label>
  </div>
</div> -->

      </div>
  </form>

</div>

@stop