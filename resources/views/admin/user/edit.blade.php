
@extends('layouts.master')

@section('title', 'Edit User')
@section('content')

<div class="container-fluid px-4">

<h1 class="mt-4">Edit User</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Edit User</li>
</ol>

<div class="row">
    <div class="card w-100">
        <div class="card-header">
            <h4>Edit User
            </h4>
        </div>
        <div class="card-body">
        @if (session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif
<table class="table table-bordered">
 
 <tbody>
     <div class="mb-3">
         <label for="">Full Name</label>
         <p class="form-control">{{$user->name}}</p>
     </div>
     <div class="mb-3">
         <label for="">Email ID</label>
         <p class="form-control">{{$user->email}}</p>
     </div>
     <div class="mb-3">
         <label for="">Created At</label>
         <p class="form-control">{{$user->created_at->format('d/m/y')}}</p>
     </div>
     <div class="mb-3">
         <label for="">Full Name</label>
         <p>{{$user->name}}</p>
     </div>
 <form action="{{ url('admin/update-user/'.$user->id)}}" class="form-control" method="POST">
     @csrf
     @method('PUT')
     <textarea name="description" id="" cols="30" rows="10" placeholder="{!!$user->description!!}"></textarea>
     <div class="mb-3">
         <label for="">Role As</label>
         <select name="role_as" id="">
             <option value="1" {{$user->role_as == '1' ? 'selected':''}}>Admin</option>
             <option value="0" {{$user->role_as == '0' ? 'selected':''}}>User</option>
             <option value="2" {{$user->role_as == '2' ? 'selected':''}}>Blogger</option>
         </select>
     </div>
     <div class="mb-3">
         <button type="submit" class="btn btn-primary">Update User</button>
     </div>
 </form>
 </tbody>

</table>
        </div>
    </div>
</div>

</div>



@endsection