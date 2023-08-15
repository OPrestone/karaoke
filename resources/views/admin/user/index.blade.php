
@extends('layouts.master')

@section('title', 'All Users')
@section('content')

<div class="container-fluid px-4">
 
<div class="row">
    <div class="card w-100">
        <div class="card-header">
            <h4>All Users
            </h4>
        </div>
        <div class="card-body">
        @if (session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif
 <table id="example3" data-order='[[ 0, "desc" ]]' class="display" style="min-width: 845px">
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>UserName</th>
            <th>Email</th>
            <th>
                Status
            </th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
        
            <td>{{$item->role_as== '1' ? 'Admin':'User'}}</td>
            <td>
                <a href="{{url('admin/user/'.$item->id)}}" class="btn btn-success">Edit</a>
            </td>
            

        </tr>
        @endforeach
    </tbody>

</table>
        </div>
    </div>
</div>

</div>



@endsection