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
        <th>Id</th>
        <th>Product Name</th>
        <th>Price</th>
    </tr>
@foreach($data as $d)
  <tr>
  <td>{{$d->id}}</td>
  <td>{{$d->productname}}</td>
  <td>{{$d->price}}</td>
  </tr> 
@endforeach
</table>

</body>
</html>
