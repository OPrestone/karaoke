@extends('layouts.dash-auth')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')
<main class="content">
  <div class="container-fluid p-0">
    <div class="" style="position:relative">
      <h3 class="text-center text-white"><em>{{$song->name}}{{$song->track_name}} By {{$song->artist}}</em></h3>
    </div>
    <div class="row">
      <div class="mx-auto">
        <div id="lyrics-container"></div>
      </div>
      <div data-video="{{$song->youtube_id}}" data-autoplay="1" data-loop="1" id="youtube-audio"></div>
    </div>
    <div id="counter-container"><p style="top: 76%;left:-50%;position: absolute; white-space: no-wrap; width: 200px; text-align: left">Get Ready</p></div> <!-- Added counter container -->
  </div>
 <style>
   #counter-container {
    font-size: 30px;
    background: #000;
    color: white;
    width: 70px;
    height: 70px;
    text-align: center;
    line-height: 70px;
    border-radius: 50%;
    border: 3px solid #ffb34c;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .lyrics {
    animation: fadeIn 0.5s linear;
    font-size: 50px;
    line-height: 70px;
    color: white;
    display: block;
    font-weight: 900;
    font-family: system-ui;
    text-shadow: 5px 5px 3px black;
  }

  .inactive,
  .lyrics.inactive.active {
    color: white;
    font-size: 20px;
    display: none;
  }

  .lyrics.active {
    color: #ffb34c;
    font-size: 70px !important;
    line-height: 80px !important;
    display: block;
    text-align: center;
  }

  #lyrics-container {
    height: 300px;
    width: 90%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    overflow-y: hidden;
    text-align: center;
  }
  body {
    overflow-y: scroll;
    background: #ececec;
}
  @keyframes fadeIn {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }


  @media (max-width:768px) {
            .right-hook,
       .navbar{
           display: none !important;
       }
       .lyrics.active{
        font-size: 35px !important;
        line-height: 45px !important;
       }
       .lyrics{
        font-size: 35px !important;
        line-height: 45px !important;
       }}
       body::before {
        height: 100vh !important;
    }

    /* CSS for file upload input */
    .file-upload {
      margin-top: 10px;
    }

    /* CSS for rounded image */
    .rounded-image {
      width: 100%;
      aspect-ratio: 1/1;
      border-radius: 50%;
      background-size: cover;
      background-position: center;
      cursor: pointer;
      position: relative;
    }

    /* CSS for image icon */
    .image-icon {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 50px;
      height: 50px;
      background-image: url('image-icon.png'); /* Replace with your desired image icon */
      background-size: cover;
      z-index: 1;
    }
	.btn-dark {
    color: #fff;
    background-color: #000000;
    border-color: #191919;
}
body  {
  position: relative;
  background: url({{$song->image_url}}) no-repeat center center;
  background-size: cover;
}
body::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background:#0d0029e0;
}
    .content {
       height: 0;
    }
</style>

<script src="https://www.youtube.com/iframe_api"></script>
<script>
  let lyricsLoaded = false;

  // Function to start loading the player and lyrics
  function startLoading() {
    let counter = 5;

    // Display the counter for 5 seconds
    const counterInterval = setInterval(() => {
      document.getElementById("counter-container").textContent = counter; // Update the counter element
      counter--;

      if (counter === 0) {
        clearInterval(counterInterval);
        document.getElementById("counter-container").style.display = "none"; // Hide the counter element
        loadPlayerAndLyrics();
      }
    }, 1000);
  }

  // Function to load the YouTube player and display lyrics
  function loadPlayerAndLyrics() {
    // YouTube API callback function
    function onYouTubeIframeAPIReady() {
      // Create an instance of the YouTube player
      const player = new YT.Player('youtube-audio', {
        height: '0',
        width: '0',
        videoId: '{{$song->youtube_id}}',
        playerVars: {
          autoplay: 1,
          loop: 1,
          playlist: '{{$song->youtube_id}}', // For looping, the playlist should have the same video ID
        },
        events: {
          onReady: function (event) {
            event.target.setVolume(0); // You can set the volume (0-100) here if desired
            lyricsLoaded = true; // Set the flag to indicate that the audio is loaded
          },
        },
      });

      // Function to display lyrics only when audio is loaded
      function displayLyricsWhenLoaded() {
        if (lyricsLoaded) {
          const lyricsData = {!! $song->lyrics !!};
          const lyricsContainer = document.getElementById("lyrics-container");
          let previousLine = null;

          lyricsData.lines.forEach((line, index) => {
            const span = document.createElement("span");
            span.className = "lyrics";
            span.textContent = line.words;

            if (line.break) {
              const br = document.createElement("br");
              lyricsContainer.appendChild(br);
            }

            const timeout = setTimeout(() => {
              span.classList.add("active");
              if (previousLine) {
                previousLine.classList.add("inactive");
              }
              previousLine = span;
            }, line.startTimeMs);

            lyricsContainer.appendChild(span);
          });
        } else {
          // If audio is not yet loaded, try again after a short delay
          setTimeout(displayLyricsWhenLoaded, 200);
        }
      }

      displayLyricsWhenLoaded(); // Start displaying lyrics when audio is loaded
    }

    // Load the YouTube API script dynamically
    function loadYouTubeAPI() {
      const tag = document.createElement("script");
      tag.src = "https://www.youtube.com/iframe_api";

      const firstScriptTag = document.getElementsByTagName("script")[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }

    loadYouTubeAPI(); // Load the YouTube API script dynamically
    onYouTubeIframeAPIReady(); // Call the YouTube API callback manually (in case it's already loaded)
  }

  // Wait for the page to finish loading and then start the counter
  window.addEventListener("load", startLoading);
</script>
<div class="plyr__video-embed" id="player" style="opacity:0">
    <iframe
        id="youtubePlayer"
        src="https://www.youtube.com/embed/{{$song->youtube_id}}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;rel=0&amp;autoplay=1&amp;muted=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
        allowfullscreen
        allowtransparency
        allow="autoplay"
        style="display:none" ></iframe>
</div>

<script>
    // Function to show the player and autoplay the video
    function showPlayer() {
        var player = document.getElementById("youtubePlayer");
        player.style.display = "block"; // Show the player
        player.style.opacity = "1"; // Make the player visible
        player.src += "&autoplay=1"; // Add autoplay=1 to the URL again to restart the video
    }

    // Delay the player for 5 seconds
    setTimeout(showPlayer, 5000); // 5000 milliseconds = 5 seconds
</script>

</main>
@endsection
