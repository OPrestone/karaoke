@extends('layouts.dash-auth')

@section('title', 'Edit User')
@section('content')
 
<main  class="content">
    <div class="container-fluid p-0 text-center h-100">
        <h1 class="my-4">Scan To Vote</h1>
        <div class="d-flex justify-content-center">
            <div class="align-self-center mb-5">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/QR_deWP.svg/1200px-QR_deWP.svg.png" class="ratio11 w-100" alt="">
            </div>
        </div>
    
    </div> 
</main> 
<style> 
img{
    height: 75vh;
}
h1{
    font: 50px sans-serif;
    font-weight: 800;
}
</style>
@endsection
