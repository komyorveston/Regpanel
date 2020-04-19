
@foreach($positions as $position_list)
	<option value="{{$position_list->id ?? "" }}" 
		
	>
	{{$position_list->title ?? ""}}
	</option>


@endforeach