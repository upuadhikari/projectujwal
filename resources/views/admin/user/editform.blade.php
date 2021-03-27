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
action="{{url('admin/users/edit-user/'.$user->id)}}">
          @csrf
          <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="name" value="{{$user->name}}">
        </div>
      </div>


      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input is-danger" type="email" placeholder="Email input" value="{{$user->email}}" name="email">
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
          <input class="input" type="text" placeholder="Text input" name="mobile" value="{{$user->mobile}}">
        </div>
      </div>

<!--   <div class="input-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="profile_pic">
    <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label>
  </div>
</div> -->

      <div class="field">
        <label class="label">Status:</label>
        <div class="control">
          <div class="select">
            <select name="status">
              @if ($user->status==1)
              <option value="1" selected >
                  Active
              </option>
              <option value="0">Inactive</option>
              @else
               <option value="0" selected >
                  Inactive
              </option>
              <option value="1">Active</option>
              @endif
            </select>
          </div>
        </div>
      </div>


      <div class="field">
        <div class="control">
        <label >Role:</label>
        @if($user->role == 2)
          <label class="radio">
            <input type="radio" name="role" value="3">
            Admin
          </label>
          <label class="radio">
            <input type="radio" name="role" value="2" checked="checked">
            Seller
          </label>
          <label class="radio">
            <input type="radio" name="role" value="1">
            Normal User
          </label>
        @endif

        @if($user->role == 3)
          <label class="radio">
            <input type="radio" name="role" value="3" checked="checked">
            Admin
          </label>
          <label class="radio">
            <input type="radio" name="role" value="2" >
            Seller
          </label>
          <label class="radio">
            <input type="radio" name="role" value="1">
            Normal User
          </label>
        @endif
        @if($user->role == 1)
            <label class="radio">
            <input type="radio" name="role" value="3" checked="checked">
            Admin
          </label>
            <label class="radio">
            <input type="radio" name="role" value="2" >
            Seller
          </label>
          <label class="radio">
            <input type="radio" name="role" value="1" checked="checked">
            Normal User
          </label>

        @endif
        </div>
      </div>
    <button class="button is-success">Submit</button>
  </form>

</div>

@stop