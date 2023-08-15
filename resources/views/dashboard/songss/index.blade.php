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
            <form method="POST" action="{{ route('dashboard.songss.import') }}"> 
    @csrf
    <textarea name="track_ids" rows="5" cols="40"  class="form-control @error('track_id') is-invalid @enderror" required> </textarea>
    @error('track_ids')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="submit" class="btn btn-primary mt-4">Import</button>
</form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
				</div>
			</main>

            @endsection