<style>
  .audio-player {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #000;
    padding: 10px;
    z-index: 9999;
  }

  .controls {
    display: flex;
    align-items: center;
  }


  .audio-player
  button {
    margin: 0 5px;
    background: no-repeat;
    color: white;
    font-size: 17px;
    border: none;
}
  input[type="range"] {
    width: 100%;
  }

  .volume-bar {
    display: none;
    width: 10%;
  }

  .seek-bar {
    width: 70%;
    background-color: #f00;
    height: 5px;
  }

  .song-list {
    list-style: none;
    padding: 0;
    margin: 10px 0;
  }

  .song-list li {
    cursor: pointer;
    padding: 5px;
    color: #fff;
  }

  .song-list li:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }

  .volume-icon {
    color: #fff;
  }
</style>

<div class="audio-player w-100">
  <div class="controls">
    <button class="previous-btn d-none">&#8249;</button>
    <button class="play-btn"><i class="fa fa-play"></i></button>
    <button class="next-btn d-none">&#8250;</button>
    <input type="range" class="seek-bar" min="0" max="100" value="0">
    <button class="volume-btn"><i class="fa fa-volume-up"></i></button>
    <input type="range" class="volume-bar" min="0" max="100" value="100">
  </div>
</div>

<script>
  // Get audio player elements
  const audioPlayer = document.querySelector('.audio-player');
  const playBtn = audioPlayer.querySelector('.play-btn');
  const previousBtn = audioPlayer.querySelector('.previous-btn');
  const nextBtn = audioPlayer.querySelector('.next-btn');
  const seekBar = audioPlayer.querySelector('.seek-bar');
  const volumeBtn = audioPlayer.querySelector('.volume-btn');
  const volumeBar = audioPlayer.querySelector('.volume-bar');
  const volumeIcon = audioPlayer.querySelector('.volume-icon');

  // Create audio object
  const audio = new Audio();

  // Set initial values
  let currentSongIndex = 0;
  let isPlaying = false;
  let isMuted = false;

  // Function to play or pause the audio
  function togglePlay() {
    if (isPlaying) {
      audio.pause();
    } else {
      audio.play();
    }
    isPlaying = !isPlaying;
    updatePlayButton();
  }

  // Function to update the play button text
  function updatePlayButton() {
    playBtn.innerHTML = isPlaying ? '<i class="fa fa-pause"></i>' : '<i class="fa fa-play"></i>';
  }

  // Function to load and play the next song
  function playNextSong() {
    currentSongIndex++;
    if (currentSongIndex >= songs.length) {
      currentSongIndex = 0;
    }
    loadAndPlaySong();
  }

  // Function to load and play the previous song
  function playPreviousSong() {
    currentSongIndex--;
    if (currentSongIndex < 0) {
      currentSongIndex = songs.length - 1;
    }
    loadAndPlaySong();
  }

  // Function to load and play the song at the current index
  function loadAndPlaySong() {
    const song = songs[currentSongIndex];
    audio.src = song.preview_url;
    audio.play();
    isPlaying = true;
    updatePlayButton();
  }

  // Function to toggle mute
  function toggleMute() {
    if (isMuted) {
      audio.volume = volumeBar.value / 100;
      isMuted = false;
    } else {
      audio.volume = 0;
      isMuted = true;
    }
    updateMuteIcon();
  }


// Function to update the mute icon
function updateMuteIcon() {
    volumeBtn.innerHTML = isMuted ? '<i class="fa fa-volume-off"></i>' : '<i class="fa fa-volume-up"></i>';
}

// Function to update the song progress
function updateSongProgress() {
    const currentTime = audio.currentTime;
    const duration = audio.duration;
    const progress = (currentTime / duration) * 100;
    seekBar.value = progress;
}

// Function to poll every one second
function poll() {
    updateSongProgress();
}

// Poll every one second (1000 milliseconds)
setInterval(poll, 1000);

  // Event listeners for player controls
  playBtn.addEventListener('click', togglePlay);
  previousBtn.addEventListener('click', playPreviousSong);
  nextBtn.addEventListener('click', playNextSong);
  volumeBtn.addEventListener('click', toggleMute);

  // Event listener for seek bar
  seekBar.addEventListener('input', function () {
    const seekTime = (audio.duration / 100) * seekBar.value;
    audio.currentTime = seekTime;
  });

  // Event listener for volume bar
  volumeBar.addEventListener('input', function () {
    audio.volume = volumeBar.value / 100;
    if (isMuted) {
      toggleMute();
    }
  });

  // Event listener for updating the seek bar and current time
  audio.addEventListener('timeupdate', function () {
    const currentTime = audio.currentTime;
    const duration = audio.duration;
    const progress = (currentTime / duration) * 100;
    seekBar.value = progress;
  });

  // Function to play the song when the row is clicked
  function playSongOnClick(event) {
    const songSrc = event.currentTarget.dataset.src;
    if (songSrc) {
      audio.src = songSrc;
      audio.play();
      isPlaying = true;
      updatePlayButton();
    }
  }

  // Get song row elements
  const songRows = document.querySelectorAll('.song-row');

  // Add click event listener to song rows
  songRows.forEach((songRow) => {
    songRow.addEventListener('click', playSongOnClick);
  });

  // Automatically play the first song on page load
  loadAndPlaySong();

  // Event listener for when the song ends
  audio.addEventListener('ended', function () {
    playNextSong();
  });

</script>
