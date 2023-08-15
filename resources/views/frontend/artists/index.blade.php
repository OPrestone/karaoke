@extends('layouts.dash')

@section('title', 'Edit User')
@section('content')
 
<main  class="content">
<div class="container-fluid p-0"> 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Import artist</div>

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
                        <form method="POST" action="{{ route('dashboard.artists.import') }}">
                            @csrf
 
                            <div class="form-group">
                                <label for="id">Spotify artist ID</label>
                                <input type="text" name="artist_id" id="id" class="form-control @error('artist_id') is-invalid @enderror" required>
                                @error('artist_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>  

                            <button type="submit" class="btn btn-primary">Import</button>
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