<!DOCTYPE html>
<html>
<head>
    <title>List of Singers</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>List of Singers</h1>

    <ul>
        @foreach ($users as $user)
            <li>
                <strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}
                <br>
                <strong>Votes:</strong>
                    <span id="vote_count_{{ $user->id }}">{{ $user->vote_count }}</span>
                    <br>
                    <button onclick="submitVote({{ $user->id }})">Vote</button>
                @if ($user->singer)
                @else
                    No Singer
                @endif
            </li>
        @endforeach
    </ul>

    <script>
        function submitVote(singerId) {
            // Send an AJAX request to submit the vote
            axios.post('/vote/' + singerId)
                .then(function(response) {
                    // Update the vote count on the page
                    document.getElementById('vote_count_' + singerId).textContent = response.data.vote_count;
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
</body>
</html>
