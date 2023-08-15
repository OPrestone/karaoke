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
            <form method="POST" action="{{ route('dashboard.songs.import') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="excel_file">Excel File</label>
        <input type="file" name="excel_file" id="excel_file" class="form-control @error('excel_file') is-invalid @enderror" required>
        @error('excel_file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Import Songs</button>
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
