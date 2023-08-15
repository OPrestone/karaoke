
@extends('layouts.dash-auth')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')
    <style>
        .lyrics {
    animation: fadeIn 0.5s linear;
    font-size: 60px;
    color: black;
    display: block;
    font-weight: 900;
    font-family: system-ui;
}
        .inactive,
        .lyrics.inactive.active  {
            color: black;
            font-size: 20px;
            display: none;
        }

        .lyrics.active {
            color: red;
            font-size: 60px !important;
            display: block;
            text-align: center;
        }
        #lyrics-container{
    height: 375px;
    margin-top: 20vh;
    overflow-y: hidden;
    text-align: center;
}

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @media (max-width:768px) {
            .right-hook,
       .navbar{
           display: none !important;
       }
       .lyrics.active{
        font-size: 35px !important;
        line-height: 35px !important;
       }
       body::before {
        height: 100vh !important;
    }
       .lyrics{
        font-size: 35px !important;
        line-height: 35px !important;
       }}
    </style>
    <div class="row">
        <div class="mx-auto">
    <div id="lyrics-container"></div>
</div>
    </div>
				</div>
			</main>
    <script>
        const lyricsData =
       {"error":false,"syncType":"LINE_SYNCED","lines":[{"startTimeMs":"3630","words":"Huh, huh, huh, huh, huh, huh, huh, huh","syllables":[],"endTimeMs":"0"},{"startTimeMs":"8620","words":"Huh, huh, huh, huh, huh, huh, huh, huh","syllables":[],"endTimeMs":"0"},{"startTimeMs":"12540","words":"Everybody, di body, body, di body, di body, body","syllables":[],"endTimeMs":"0"},{"startTimeMs":"15000","words":"Di body, body, di body, di body, oluwaBurna ti d\u00e9 o","syllables":[],"endTimeMs":"0"},{"startTimeMs":"19340","words":"","syllables":[],"endTimeMs":"0"},{"startTimeMs":"21680","words":"(Baby o) baby yes, na me be your client","syllables":[],"endTimeMs":"0"},{"startTimeMs":"27870","words":"When you whine, you dey do me science","syllables":[],"endTimeMs":"0"},{"startTimeMs":"32320","words":"Any market you sell, I dey buy am","syllables":[],"endTimeMs":"0"},{"startTimeMs":"36940","words":"You make my body dey feel one kind","syllables":[],"endTimeMs":"0"},{"startTimeMs":"41820","words":"If I ask you now, you go deny am","syllables":[],"endTimeMs":"0"},{"startTimeMs":"46310","words":"But I know say you dey do me science","syllables":[],"endTimeMs":"0"},{"startTimeMs":"51190","words":"My baby smart but me I too wise o","syllables":[],"endTimeMs":"0"},{"startTimeMs":"55810","words":"As you dey dance, mi baby, na suicide o","syllables":[],"endTimeMs":"0"},{"startTimeMs":"61230","words":"Everybody know that I'm the girl dem controller","syllables":[],"endTimeMs":"0"},{"startTimeMs":"65870","words":"Anywhere mi dey, mi want the girl dem come over","syllables":[],"endTimeMs":"0"},{"startTimeMs":"70550","words":"You're playing Russian Roulette with loaded revolver","syllables":[],"endTimeMs":"0"},{"startTimeMs":"75220","words":"And if you kill yourself, we go call \u1eccl\u1ecdpa","syllables":[],"endTimeMs":"0"},{"startTimeMs":"80590","words":"\u266a","syllables":[],"endTimeMs":"0"},{"startTimeMs":"99320","words":"She dey call me every moment","syllables":[],"endTimeMs":"0"},{"startTimeMs":"101980","words":"Live my life and enjoy every moment","syllables":[],"endTimeMs":"0"},{"startTimeMs":"104490","words":"Na the vibe me I dey for this new year, yeah","syllables":[],"endTimeMs":"0"},{"startTimeMs":"108800","words":"I dey find g\u00e9l\u00e8 t\u00f3 beautiful, yeah","syllables":[],"endTimeMs":"0"},{"startTimeMs":"111230","words":"I dey find where my body go cooleh","syllables":[],"endTimeMs":"0"},{"startTimeMs":"113260","words":"Cooleh, cooleh, body go cooleh","syllables":[],"endTimeMs":"0"},{"startTimeMs":"115460","words":"Truly, my ability","syllables":[],"endTimeMs":"0"},{"startTimeMs":"121390","words":"Girl, e need the type of man with agility","syllables":[],"endTimeMs":"0"},{"startTimeMs":"124920","words":"'Cause you get all the qualities to be my baby","syllables":[],"endTimeMs":"0"},{"startTimeMs":"130180","words":"If dem say I do you wrong, \u1eccl\u1ecdrun, it wasn't me","syllables":[],"endTimeMs":"0"},{"startTimeMs":"136080","words":"Baby yes, na me be your client","syllables":[],"endTimeMs":"0"},{"startTimeMs":"140660","words":"When you whine, you dey do me science","syllables":[],"endTimeMs":"0"},{"startTimeMs":"145340","words":"Any market you sell I dey buy am","syllables":[],"endTimeMs":"0"},{"startTimeMs":"150030","words":"You make my body dey feel one kind","syllables":[],"endTimeMs":"0"},{"startTimeMs":"154740","words":"If I ask you now, you go deny am","syllables":[],"endTimeMs":"0"},{"startTimeMs":"159570","words":"But I know say you dey do me science","syllables":[],"endTimeMs":"0"},{"startTimeMs":"164150","words":"My baby smart but me I too wise o","syllables":[],"endTimeMs":"0"},{"startTimeMs":"168890","words":"As you dey dance, mi baby, na suicide o","syllables":[],"endTimeMs":"0"},{"startTimeMs":"174180","words":"Everybody know that I'm girl dem controller","syllables":[],"endTimeMs":"0"},{"startTimeMs":"178730","words":"Anywhere mi dey, mi want the girl dem come over","syllables":[],"endTimeMs":"0"},{"startTimeMs":"183460","words":"You're playing Russian Roulette with loaded revolver (baby o)","syllables":[],"endTimeMs":"0"},{"startTimeMs":"188200","words":"And if you kill yourself, we go call \u1eccl\u1ecdpa","syllables":[],"endTimeMs":"0"},{"startTimeMs":"191870","words":"Wee wan, wee wan, wee wan, wee wan","syllables":[],"endTimeMs":"0"},{"startTimeMs":"195180","words":"Wee wan, wee wan, wee wan","syllables":[],"endTimeMs":"0"},{"startTimeMs":"195410","words":"","syllables":[],"endTimeMs":"0"}]}

        const lyricsContainer = document.getElementById("lyrics-container");
        let previousLine = null;

        function displayLyrics() {
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
                    clearTimeout(timeout);

                }, line.startTimeMs);

                lyricsContainer.appendChild(span);
            });
        }

        displayLyrics();
    </script>

            @endsection
