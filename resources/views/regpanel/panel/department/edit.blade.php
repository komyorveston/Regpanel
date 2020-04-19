@extends('layouts.app_admin')

@section('content')

	<div class="nav_menu">
		@component('regpanel.panel.components.breadcrumb')
			@slot('title') Редактирование отдела @endslot
			@slot('parent') Главная @endslot
			@slot('department') Список отделов @endslot
			@slot('active') Редактирование отдела @endslot
		@endcomponent
	</div>

		<!--Main content-->
	<section class="content">
		<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <form method="POST" action="{{route('regpanel.panel.departments.update', $item->id)}}" data-toggle="validator" id="add">
                @method('PATCH')
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
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Отдел <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="title" id="first-name" required="required" class="form-control" placeholder="Заголовок отдела" value="{{$item->title}}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Отдел<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 ">
                          <select name="parent_id" id="parent_id" class="form-control has-feedback-left" required>
                              <option value="0">Выберите отдел </option>
                                  @include('regpanel.panel.department.include.edit_departments_all_list', ['departments' => $departments])
                          </select>
                          <span class="fa fa-sitemap form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Организация<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 ">
                          <select name="organization_id"  class="form-control has-feedback-left" required >
                              <option value="0">Выберите организацию </option>
                                  @include('regpanel.panel.department.include.organizations_for_dep', ['organizations' => $organizations])
                          </select>
                          <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Описание <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <textarea name="description" id="description" class="form-control" rows="3" placeholder="Описание">{{$item->description}}</textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                      <input type="hidden" id="_token" value="{{csrf_token()}}">
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