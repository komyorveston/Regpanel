@foreach($organization as $organization_list)
	<option value="{{$organization_list->id}}" 
		@isset($item->id)
		@if($organization_list->id == $item->organization_id) selected @endif
		@if($item->organization_id == $organization_list->id)  @endif
		@endisset
		>
		{{$organization_list->title}}
	</option>
@endforeach