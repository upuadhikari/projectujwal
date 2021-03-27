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
            <a href="{{url('admin/experts/add-expert')}}" class="button is-primary">Add Experts</a>
        </div>
         <h2 style="color:blue">List of Experts</h2>

         <table border="1px" class="table">
             <tr>
             <th>Profile Pic</th>
                 <th>Expert Name</th>
                 <th>Experience</th>
                 <th>Mobile Number</th>
                 <th>Action</th>

             </tr>

             @foreach($data as $expert)
                <tr>
                    <td>{{$expert->name}}</td>
                    <td>{{$expert->experience}}</td>
                    <td>{{$expert->mobile}}</td>
                    <td>
                        
                        <form method="post" action="{{url('admin/experts/delete-expert/'.$expert->id)}}"  >
                            <a href="{{url('admin/experts/edit-expert/'.$expert->id)}}" class="btn btn-primary">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>
                    <!-- <td><a href="{{url('admin/experts/delete-expert/'.$expert->id)}}" class="btn btn-default">
                        Delete
                    </a></td> -->
                </tr>
             @endforeach


         </table>
        <!--  <p>Red background </p> -->
</div>
 @stop