@extends('layouts.dash')

@section('title', 'Edit User')
@section('content')
 
<main  class="content">
<div class="container-fluid p-0"> 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Import Song</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>
                    {{$error}}
                </div>
                @endforeach
            </div>
            @endif
            
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
				</div>
			</main>

            @endsection