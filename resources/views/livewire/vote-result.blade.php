<div>

<main class="content  "  wire:poll.1000ms>
    <div class="">
        <div class="row mb-3 g-0">
            <div class="col-6">
                <div class="p-5 text-white bg-darks a100h">
                    <h1 class="text-white">1 <sup>St</sup></h1>
                    <div class="text-center">
                            <img src="{{asset('uploads/users/'.$user->image)}}" class="ratio11" height="200" style="border-radius: 50%; border:3px solid" alt="">

                            <h1 class=" text-warning">{{$user->first_name}} {{$user->last_name}}</h1>
                            @php
            $this_user = App\Models\Registration::where('user_id', $user->id)->first();

        @endphp
        @if ($this_user)

        @php
            $my_song = App\Models\Song::where('track_id', '=', $this_user->song_id)->first();
         @endphp
        @php
          @endphp
        @endif

                            <h2 class=" text-white">Song: {{$my_song->track_name}}</h2>
                            By  {{$my_song->artist}}
                            <h2 class=" text-white mt-4">Current Score</h2>

                    <div>
                        @foreach ($votes as $vote)
                            @if ($vote->vote_count > 0)
                                <h3 class="text-bigger">{{ number_format(($vote->votes / $vote->vote_count) * 10,1) }}%</h3>
                            @else
                                <h3 class="text-bigger">0%</h3>
                            @endif
                        @endforeach
                    </div>

                    </div>
                </div>
            </div>

            @php
            $this_user = App\Models\Registration::where('user_id', $user->id)->first();

        @endphp
        @if ($this_user)

        @php
            $my_song = App\Models\Song::where('track_id', '=', $this_user->song_id)->first();
         @endphp
        @php
          @endphp
        @endif
            <div class="col-6 align-self-center">
            <div class="card-body bg-darks a100h p-4">
            <h2 class=" text-white mt-4">Live Voters</h2>
									<table id="datatables- " class="table bg-darks" style="width:100%">
										<thead>
											<tr>
        <tr>
            <th>
                IMG
            </th>
            <th>UserName</th>
            <th>Vote</th>
            <th>
                Comment
            </th>
        </tr>
											</tr>
										</thead>
										<tbody>

                                            @php
                                            $voter = DB::table('voters')->where('event_id', '=', $this_user->event_id)->take(3)->get();
                                       @endphp
                                            @foreach ($voter as $item)

    <tr>
        @php
            $user = App\Models\User::find($item->voter_id);
        @endphp
        @if ($user)
            <td>
				<img src="{{asset('uploads/users/'.$user->image)}}"  height="40px" class="ratio11" style="object-fit: cover;" alt="">
		</td>
            <td>{{$user->first_name}} {{$user->last_name}}</td>
        @endif
            <td>{{ ($item->votes) * 10}}%</td>
            <td>{{ $item->comment}}</td>
    </tr>
        @endforeach
										</tfoot>
									</table>
								</div>
            </div>

        </div>
    </div>

</main>




</div>
