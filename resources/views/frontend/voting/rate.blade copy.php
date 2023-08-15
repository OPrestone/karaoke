@extends('layouts.frontend')

@section('title', 'Edit User')
@section('content')
<style>
    .text-dark h4,.text-dark h5{
        color: black;
    }
    .slider-value{
        font-size: 70px;
        font-weight: 900;
        color: black;
    }
    .slider-container {
      text-align: center;
    }

    /* Style the range slider track with a gradient */
    .slider-container  input[type="range"] {
      -webkit-appearance: none;
      width: 100%;
      height: 11px;
      border-radius: 5px;
      background: linear-gradient(to right, red, orange, green);
      outline: none;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
    }

    /* Change the appearance of the slider thumb/handle */
    .slider-container input[type="range"]::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: #4CAF50;
      cursor: pointer;
    }

    /* Change the appearance of the slider thumb/handle on hover */
    .slider-container  input[type="range"]:hover::-webkit-slider-thumb {
      background: #008CBA;
    }

    /* Change the appearance of the slider thumb/handle when active (being clicked) */
    .slider-container  input[type="range"]:active::-webkit-slider-thumb {
      background: #ff0000;
    }
  </style>
<main class="content">
    <div class="container-fluid p-0">
        <div class="card-body col-12">
             @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

        </div>

        <div class="d-flex justify-content-between col-12">
            <div class="d-flex">
                <img src="https://i.scdn.co/image/ab67616d0000b27356f3c8c9cadd5b95a85c1373" height="40" class="ratio11 " style="border-radius: 50%; object-fit: cover" alt="">
                <div class="mx-2"><h4>Kunta Kinte</h4> <h6>400 Votes</h6></div>
            </div>
            <div class="mx-2"><h2>80%</h2></div>
        </div>
        <div class="fixed-bottom">
        <div class="mx-2 col-12 text-center mt-4"><h4>Tell Us How You Feel About njjj Performance</h4></div>
        <div class="card bg-white  mb-5">
            <div class="text-center card-body text-dark">
                <h4>Rate Njuguna</h4>
  <div class="slider-container">
    <div class="slider-value" id="sliderValue">0</div>
    <input type="range" min="0" max="10" step="1" id="slider">
                <div class="d-flex justify-content-between ">
                <h5>Poor</h5><h5>Excellent</h5>
                </div>
  </div>
                <textarea name="comment" id="comment" cols="30" rows="2" class="form-control my-3">Add Comment</textarea>
                <button class="btn btn-bg w-100 rounded p-2">Submit</button>
            </div>
        </div>

        </div>
    </div>
</main>

<!-- ... (previous HTML code) ... -->

<script>
  // Get references to the slider and the display area
  const slider = document.getElementById('slider');
  const sliderValue = document.getElementById('sliderValue');

  // Set the initial value to 0
  sliderValue.innerText = slider.value;

  // Add an event listener to update the display when the slider value changes
  slider.addEventListener('input', () => {
    sliderValue.innerText = slider.value;
  });
</script>

<script>
    function handleFileUpload(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var roundedImage = document.querySelector('.rounded-image');
            roundedImage.style.backgroundImage = 'url(' + e.target.result + ')';
        }

        reader.readAsDataURL(file);
    }

    function openFileUpload() {
        var fileUpload = document.querySelector('.file-upload');
        fileUpload.click();
    }
</script>
@endsection
