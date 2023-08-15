<!-- resources/views/singers.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Singers</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Singers</h1>

    <ul>
        @foreach ($singers as $singer)

        {{dd($singer)}}
            <li>
                {{ $singer->name }}
                <span id="vote-count-{{ $singer->id }}">{{ $singer->vote_count }}</span>
                <button class="vote-btn" data-singer="{{ $singer->id }}">Vote</button>
            </li>
        @endforeach
    </ul>

    <script>
        // AJAX request to submit a vote
        $('.vote-btn').click(function() {
            var singerId = $(this).data('singer');
            $.ajax({
                url: '/vote/' + singerId,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Update the vote count display
                        var voteCount = parseInt($('#vote-count-' + singerId).text());
                        $('#vote-count-' + singerId).text(voteCount + 1);
                    }
                }
            });
        });

        // AJAX request to get live vote counts
        function updateLiveVotes() {
            $.ajax({
                url: '/live-votes',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Update the vote count display for each singer
                    response.forEach(function(singer) {
                        $('#vote-count-' + singer.id).text(singer.vote_count);
                    });
                }
            });
        }

        // Periodically update live vote counts
        setInterval(updateLiveVotes, 5000); // Update every 5 seconds
    </script>
</body>
</html>
