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

        <div class="buttons" style="float: right;">
            <a href="{{url('admin/users/add-user')}}" class="button is-primary">Add User</a>
        </div>
         <h2 style="color:blue">Search result </h2>

         <table border="1px" class="table">
             <tr>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Action</th>

             </tr>

             @foreach($data as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        
                        <form method="post" action="{{url('admin/users/delete-user/'.$user->id)}}"  >
                            <a href="{{url('admin/users/edit-user/'.$user->id)}}" class="btn btn-primary">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>
                    <!-- <td><a href="{{url('admin/user/delete-user/'.$user->id)}}" class="btn btn-default">
                        Delete
                    </a></td> -->
                </tr>
             @endforeach


         </table>
        <!--  <p>Red background </p> -->
</div>
 @stop