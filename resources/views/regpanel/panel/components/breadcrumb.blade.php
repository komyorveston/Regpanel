<div>
	<div class="page-title">
		<div class="title_left">
	<h5>@if (isset($title)) {{$title}} @endif</h5>
	    </div>
	<div class="title_right">
	   <div  class="pull-right">
		<li><a href="{{route('regpanel.panel.index.index')}}"><i class="fa fa-dashboard">  </i> {{$parent}}</a></li>
	@if (isset($stuff))
		<li><a href="{{route('regpanel.panel.stuffs.index')}}">{{$stuff}}</a></li>
	@endif
	@if (isset($position))
		<li><a href="{{route('regpanel.panel.positions.index')}}">{{$position}}</a></li>
	@endif
	@if (isset($department))
		<li><a href="{{route('regpanel.panel.departments.index')}}">{{$department}}</a></li>
	@endif
	@if (isset($organization))
		<li><a href="{{route('regpanel.panel.organizations.index')}}">{{$organization}}</a></li>
	@endif
	@if (isset($user))
		<li><a href="{{route('regpanel.panel.users.index')}}">{{$user}}</a></li>
	@endif
		<li><i class="active"></i>{{$active}}</li>
		</div>
	</div>
	</div>
</div>