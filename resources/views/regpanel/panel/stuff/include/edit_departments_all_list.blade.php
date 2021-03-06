
@foreach($departments as $department_list)
	<option value="{{$department_list->id ?? "" }}" 
		@isset($item->id)
			@if($department_list->id == $item->department_id) 
				selected
			@endif
			@if($item->id == $department_list->id) 
				disabled
			@endif
		@endisset
	>
		{!! $delimiter ?? ""!!} {{$department_list->title ?? ""}}
	</option>

	@if (count($department_list->children) > 0)
		@include('regpanel.panel.department.include.edit_departments_all_list',
		[
			'departments' => $department_list->children,
			'delimiter' => ' - ' . $delimiter,
		])
	@endif

@endforeach