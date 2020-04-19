@foreach($organizations as $organization_list)
		<option value="{{$organization_list->id ?? "" }}" 
		@isset($item->id)
			@if($organization_list->id == $item->organization_id) 
				selected
			@endif
			@if($item->id == $organization_list->id) 
				disabled
			@endif
		@endisset
	>
		{!! $delimiter ?? ""!!} {{$organization_list->title ?? ""}}
	</option>

@endforeach