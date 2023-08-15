@extends('layouts.dash-auth')
@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")
@section('content')

<main class="content  ">
    <div class=" p-0">
        <div class="text-center">
            <h1 class="big-title text-white mt-5">
                Your Winner!
            </h1>
            <div class="box">
                <img src="/assets/docs/img/winner.png" class="w-100" alt="">
            </div>
            <h2 class="gold-title">
                Randy <b>Jabali</b>
            </h2>
            <h3 class="text-white">
                Song: Mississippi
            </h3>

        </div>
    </div>


@endsection

<style>
    .gold-title{
        font-size: 5rem;
        color: #f3c981;
        font-weight: 800;
    }
    .big-title{
        font-size: 5rem;
    }
    body::before {
    background: #030027 !important;
}
    .box{
        width: 30%;
        margin: auto;
    background-image: url(/assets/docs/img/avatar-3.jpg);
    background-size: 65%;
    background-repeat: no-repeat;
    background-position: center;
}
    .text-center{
        position: relative;
    }
    .fixed-right{
    position: fixed;
    right: 0;
    bottom: 60px;
    display: block !important;
}
    .audio-player{
        display: none;
    }
	.fa {
    font-size: 18px !important;
}
.bg-black{
    background-color: black;
}
.bg-black .svg-inline--fa {
    width: 20px;
    height: 20px;
}
 .fixed-right .svg-inline--fa {
    width: 26px;
    height: 26px;
}
.bg-btn .svg-inline--fa.fa-w-16 {
    width: 25px;
    height: 25px;
}
	.bg-btn{
    padding: 15px;
    font-size: 23px;
    border-radius: 50%;
    position: relative;
    fill: #E90E66;
filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
}
	@media (max-width:768px) {
		 .right-hook,
	.navbar{
        display: none !important;
    }
	.content{
		padding: 0 !important;
	}
	.plyr--video {
    overflow: hidden;
    height: 100vh;
}
	}
</style>


