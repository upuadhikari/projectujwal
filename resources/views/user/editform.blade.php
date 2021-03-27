
<form method="post" action="edit-user/{{$user->id}}">
<div class="mb-3">
    <label for="exampleInputtext1" class="form-label">name</label>
    <input type="text" class="form-control" id="exampleInputtext1" value="{{$user->name}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" value="">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>