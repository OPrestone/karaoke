<!DOCTYPE html>
<html>
<head>
    <title>Lyrics</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lyrics</h1>
        
        <form method="POST" action="{{ route('lyrics.store') }}">
            @csrf
            <div class="form-group">
                <label for="trackId">Track ID:</label>
                <input type="text" name="trackId" id="trackId" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Lyrics</button>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
