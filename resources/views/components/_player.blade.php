
    <!-- Fixed YouTube player at the bottom -->
    <div id="player" style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #000; padding: 10px;">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div id="playPauseBtn" onclick="togglePlay()">
                    <svg class="svg-inline--fa fa-play fa-w-14" id="playIcon" aria-hidden="true" data-prefix="fa" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg><!-- <i class="fa fa-play" id="playIcon"></i> -->
                </div>
                <div id="progressBar" style="width: 90vw; height: 5px; background-color: #ccc; margin: 0 10px;">
                    <div id="progress" style="height: 100%; width: 0; background-color: #ff0000;"></div>
                </div>
            </div>
            <div id="duration">0:00 / 0:00</div>
            <button onclick="toggleFullscreen()" class="btn btn-primary btn-sm" style="position: absolute; right: 0; bottom: 190px; z-index: 999;">Watch Fullscreen</button>
</div>
        <div id="playerContainer">
            <iframe id="playerIframe" rel="0" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" title="YouTube video player"></iframe>
            <div id="playerTitle"></div>
        </div>
    </div>
</div>
</div>
</div>

<style>
    #player iframe {
        position: absolute;
        bottom: 40px;
        right: 0;
    }
    #playerTitle {
        margin-top: 10px;
        font-weight: bold;
    }

    #player {
        z-index: 999;

    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    // Load the YouTube Iframe API asynchronously
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // Create a player object
    var player;
    var isPlaying = false;

    // Playlist of song details
    var playlist = [
        @foreach ($allsongs as $item)
        {
            youtubeId: '{{$item->youtube_id}}',
            title: '{{$item->name}}{{$item->track_name}}'
        },
        @endforeach
    ];
    var currentSongIndex = 0;

    // Function called when the API is ready
    function onYouTubeIframeAPIReady() {
        // Create the YouTube player
        player = new YT.Player('playerContainer', {
            height: '150',
            width: '250',
            playerVars: {
                autoplay: 0,
                controls: 0,
                fs: 1,
                iv_load_policy: 3,
                loop: 1,
                related: 0,
                modestbranding: 1,
                rel: 0
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // Function called when the player is ready
    function onPlayerReady(event) {
        // Set the video title
        var videoTitle = player.getVideoData().title;
        document.getElementById('playerTitle').textContent = videoTitle;
    }

    // Function called when the player state changes
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {
            isPlaying = true;
        } else {
            isPlaying = false;
        }
    }

    // Toggle play/pause
    function togglePlay() {
        if (isPlaying) {
            player.pauseVideo();
        } else {
            player.playVideo();
        }
    }

    // Update the progress bar and duration
    function updateProgressBar() {
        var currentTime = player.getCurrentTime();
        var duration = player.getDuration();
        var progress = (currentTime / duration) * 100;

        document.getElementById('progress').style.width = progress + '%';
        document.getElementById('duration').textContent = formatTime(currentTime) + ' / ' + formatTime(duration);
    }

    // Format time in MM:SS format
    function formatTime(time) {
        var minutes = Math.floor(time / 60);
        var seconds = Math.floor(time % 60);

        if (seconds < 10) {
            seconds = '0' + seconds;
        }

        return minutes + ':' + seconds;
    }

    // Function to play the video
    function playVideo(videoId, title) {
        player.loadVideoById(videoId);
        document.getElementById('playerTitle').textContent = title;
    }

    // Function to play the next song
    function playNextSong() {
        currentSongIndex++;
        if (currentSongIndex >= playlist.length) {
            currentSongIndex = 0;
        }
        var nextSong = playlist[currentSongIndex];
        playVideo(nextSong.youtubeId, nextSong.title);
    }

    // Function to update progress bar and duration periodically
    setInterval(updateProgressBar, 500);

    // Event listener for when a song ends
    player.addEventListener('onStateChange', function(event) {
        if (event.data === YT.PlayerState.ENDED) {
            playNextSong();
        }
    });

    // Toggle fullscreen mode
    function toggleFullscreen() {
        var playerContainer = document.getElementById('playerContainer');

        if (playerContainer.requestFullscreen) {
            playerContainer.requestFullscreen();
        } else if (playerContainer.mozRequestFullScreen) {
            playerContainer.mozRequestFullScreen();
        } else if (playerContainer.webkitRequestFullscreen) {
            playerContainer.webkitRequestFullscreen();
        } else if (playerContainer.msRequestFullscreen) {
            playerContainer.msRequestFullscreen();
        }
    }
</script>
<script>
    // Seek the video to the clicked position on the progress bar
    function seekTo(event) {
        var progressBar = document.getElementById('progressBar');
        var progressBarWidth = progressBar.offsetWidth;
        var clickPosition = event.offsetX;
        var seekPercentage = clickPosition / progressBarWidth;
        var videoDuration = player.getDuration();
        var seekTime = videoDuration * seekPercentage;

        player.seekTo(seekTime);
    }

    // Add a click event listener to the progress bar
    document.getElementById('progressBar').addEventListener('click', seekTo);
</script>

<script>
    function liveSearch() {
        var input = document.getElementById('searchInput');
        var filter = input.value.toUpperCase();
        var songListContainer = document.getElementById('songListContainer');
        var songCards = songListContainer.getElementsByClassName('col-3'); // Update with the appropriate class

        // Loop through all song cards and hide those that don't match the search query
        for (var i = 0; i < songCards.length; i++) {
            var songCard = songCards[i];
            var songTitle = songCard.getElementsByTagName('h5')[0].innerText;

            if (songTitle.toUpperCase().indexOf(filter) > -1) {
                songCard.style.display = '';
            } else {
                songCard.style.display = 'none';
            }
        }
    }

    // Add an event listener to the search input field
    var searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', liveSearch);
</script>
