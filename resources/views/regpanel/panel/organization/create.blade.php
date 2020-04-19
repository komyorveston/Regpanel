@extends('layouts.app_admin')
 

@section('content')
	<div class="nav_menu">
		@component('regpanel.panel.components.breadcrumb')
			@slot('title') Добавление новой организации @endslot
			@slot('parent') Главная @endslot
			@slot('organization') Список организаций @endslot
			@slot('active') Создание организации @endslot
		@endcomponent
	</div>
		<!--Main content-->
	<section class="content">
		<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <form method="POST" action="{{route('regpanel.panel.organizations.store', $item->id)}}" data-toggle="validator">
                @csrf
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Заголовок организации <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="title" id="first-name" required="required" class="form-control " value="{{old('title')}}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Описание <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <textarea class="form-control" name="description" rows="3" placeholder="Описание" value="{{old('description')}}"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Лого <span class="required">*</span>
                        </label>
                      	<div class="col-md-6 col-sm-6  form-group has-feedback">
					                <div>
                      		   @include('regpanel.panel.organization.include.image_single_create')
                          </div>
                  		 </div>
                	   </div>
                      <div class="ln_solid"></div>
                      <input type="hidden" id="_token" value="{{csrf_token()}}">
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						              <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </form>
              </div>
            </div>
	</section>
	<!--/.content-->
@endsection