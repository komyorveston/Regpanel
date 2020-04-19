@foreach($position as $position_list)
	<option value="{{$position_list->id}}" 
		@isset($item->id)
		@if($position_list->id == $item->position_id) selected @endif
		@if($item->position_id == $position_list->id)  @endif
		@endisset
		>
		{!! $delimiter ?? ""!!} {{$position_list->title ?? ""}}
	</option>
@endforeach