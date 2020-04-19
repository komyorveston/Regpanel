@extends('layouts.app_admin')

@section('content')
	<div class="nav_menu">
		@component('regpanel.panel.components.breadcrumb')
			@slot('title') Список отделов @endslot
			@slot('parent') Главная @endslot
			@slot('active') Список отделов @endslot
		@endcomponent
	</div>

<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">
						<br>
						@if($menu)
							<div class="list-group list-group-root well">

								@include('regpanel.panel.department.menu.customMenuItems', ['items' => $menu->roots()])

							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
</section>
	<!--/.content-->
@endsection