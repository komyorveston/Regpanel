@foreach($departments as $department_list)
	<option value="{{$department_list->id}}" 
		@isset($item->id)
		@if($department_list->id == $item->department_id) selected @endif
		@if($item->department_id == $department_list->id)  @endif
		@endisset
		>
		{!! $delimiter ?? ""!!} {{$department_list->title ?? ""}}
	</option>

	@if (count($department_list->children) > 0)
		@include('regpanel.panel.stuff.include.departments_for_stuff',[
			'departments' => $department_list->children,
			'delimiter' => '-' . $delimiter,
			'item' => $item,
		])
	@endif
@endforeach