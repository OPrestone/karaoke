<!DOCTYPE html>
<html>
<head>
    <title>Vote for {{ $singerName }}</title>
</head>
<body>
    <h1>Vote for {{ $singerName }}</h1>
    <form action="{{ route('vote.submit', $singer) }}" method="POST">
        @csrf
        <button type="submit">Vote</button>
    </form>
</body>
</html>
