<div class="text-center col-4 col-md-2 mb-4">
  <a href="{{url('artist/'.$item->id.'/'.$item->name)}}">
<img src="{{$item->image_url }}"     class="ratio11 mb-2 w-100" style="object-fit: cover; border-radius:50%" alt="">
<h5>{{$item->name}}</h5>
</a>
</div>
