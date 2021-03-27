<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>User table</h1>
<table border="2px">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
    </tr>
    
@foreach($data as $user)
  <tr>
    <td>{{$user->name}}</td>
  <td>{{$user->email}}</td>
  <td><a href="{{url('admin/user/edit-user/'.$user->id)}}">Edit</a></td>
  <td><a href="{{url('admin/user/delete-user/'.$user->id)}}" class="btn btn-default">Delete</a></td>
  </tr> 
@endforeach
</table>

</body>
</html>
