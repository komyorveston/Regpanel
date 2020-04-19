 
@foreach($items as $item)

	<p class="item-p">
		<a class="list-group-item" href="{{route('regpanel.panel.departments.edit', $item->id)}}">{{$item->title}}</a>
		<span>
			@if (!$item->hasChildren())
				<a href="{{url("/panel/departments/mydel?id=$item->id")}}" class="delete">
					<i class="fa fa-fw fa-close text-danger"></i>
				</a>
			@else
				<i class="fa fa-fw fa-close"></i>
			@endif
		</span>
	</p>

	@if ($item->hasChildren())
		<div class="list-group">
			@include(env('THEME').'regpanel.panel.department.menu.customMenuItems', ['items' => $item->children()])
		</div>
	@endif


@endforeach