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
            <a href="{{url('admin/programs/search-program')}}" class="button is-primary">Add Porgram</a>
        </div>
         <h2 style="color:blue">Search result </h2>

         <table border="1px" class="table">
             <tr>
                 <th>Program Name</th>
                 <th>Detail</th>
                 <th>Action</th>

             </tr>

             @foreach($data as $program)
                <tr>
                    <td>{{$program->name}}</td>
                    <td>{{$program->detail}}</td>
                    <td>
                        
                        <form method="post" action="{{url('admin/programs/delete-program/'.$program->id)}}"  >
                            <a href="{{url('admin/programs/edit-programs/'.$program->id)}}" class="btn btn-primary">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>
                    <!-- <td><a href="{{url('admin/programs/delete-program/'.$program->id)}}" class="btn btn-default">
                        Delete
                    </a></td> -->
                </tr>
             @endforeach


         </table>
        <!--  <p>Red background </p> -->
</div>
 @stop