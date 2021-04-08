@extends('admin.adminmaster')
@section('content')
<div class="container">

      <form method="POST" 
      action="{{url('admin/users/add-user/')}}" enctype="multipart/form-data">
          @csrf
          <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="name">
        </div>
      </div>


      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input is-danger" type="email" placeholder="Email input" value="" name="email">
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-exclamation-triangle"></i>
          </span>
        </div>
      </div>

       <div class="field">
        <label class="label">Mobile</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name="mobile">
        </div>
      </div>

   

<label for="myfile">Select files:</label>
  <input type="file" id="myfile" name="profile_pic" multiple><br><br>

      <div class="field">
        <label class="label">Status:</label>
        <div class="control">
          <div class="select">
            <select name="status">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
        </div>
      </div>


      <div class="field">
        <div class="control">
        <label >Role:</label>
          <label class="radio">
            <input type="radio" name="role" value="2">
            Expert
          </label>
          <label class="radio">
            <input type="radio" name="role" value="1">
            Normal User
          </label>
          <label class="radio">
            <input type="radio" name="role" value="1">
            Admin
          </label>
        </div>
      </div>
    <button class="button is-success">Submit</button>
  </form>

</div>

@stop