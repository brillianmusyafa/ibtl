
@foreach($menu as $item)
@if(count($item['child'])>0)
<li class="dropdown">
	<a href="{{$item['link']}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$item['nama_menu']}} <span class="caret"></span></a>

	<ul class="dropdown-menu">
		@include('helper.menu',['menu'=>$item['child']])
	</ul>
</li>
@else
<li><a href="{{url($item['link'])}}">{{$item['nama_menu']}}</a></li>
@endif
@endforeach