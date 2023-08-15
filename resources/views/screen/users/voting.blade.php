@extends('layouts.dash-auth')
@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")
@section('content')

@livewire('vote-result', ['user_id' => $user_id], key($user_id))

@endsection

@section('header')

<style>
    .text-bigger {
    color: #00c853!important;
    font-size: 90px;
    font-weight: 800;
}
    .bg-darks{
        background: black ;
        color: white;
        border-radius: 7px;
    }
    .table td  {
    padding: 2px 0.75rem !important;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
    .fixed-right{
    position: fixed;
    right: 0;
    bottom: 60px;
    display: block !important;
}
.table td, .table th {
    border-top: 1px solid #868686 !important;
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
.a100h{
    min-height: 100vh
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
    body {
    position: relative;
    background-image: url(https://i.scdn.co/image/f05f2667aac2bbccd9bf8fcc658b647533257f16) !important;
    background-size: cover;
    background-attachment: fixed;
    height: auto;
}
</style>
@livewireStyles
@endsection

@section('footer')
@parent
@livewireScripts
@push('scripts')
    <script>
        // Poll the vote-result component every one second (1000 milliseconds)
        Livewire.on('pollVoteResult', () => {
            Livewire.emit('refreshVoteResult');
        });
    </script>
@endpush
@endsection
