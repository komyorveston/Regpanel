@extends('layouts.app_admin')


@section('content')
	<div class="nav_menu">
		@component('regpanel.panel.components.breadcrumb')
			@slot('title') Редактирование сотрудника @endslot
			@slot('parent') Главная @endslot
			@slot('stuff') Список сотрудников @endslot
			@slot('active') Редактирование сотрудника @endslot
		@endcomponent
	</div>
 
    <section class="content">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <form method="POST" action="{{route('regpanel.panel.stuffs.update', $item->id)}}" data-toggle="validator" id="add">
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
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Имя <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="name" id="first-name" required="required" class="form-control has-feedback-left" value="{{$item->name}}">
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Фамилия <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="surname" id="last-name" name="last-name" required="required" class="form-control" value="{{$item->surname}}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Отчество <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="fathersname" id="last-name" name="last-name" required="required" class="form-control" value="{{$item->fathersname}}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">E-Mail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="email" id="first-name" required="required" class="form-control has-feedback-left" value="{{$item->email}}">
                          <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

					            <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Телефон <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="phone" id="first-name" required="required" class="form-control has-feedback-left" value="{{$item->phone}}">
                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Отдел<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 ">
                          <select name="parent_id" id="parent_id" class="form-control has-feedback-left" required>
                              <option disabled>Выберите отдел </option>
                                  @include('regpanel.panel.stuff.include.departments_for_stuff', ['departments' => $departments])
                          </select>
                          <span class="fa fa-sitemap form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Организация<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 ">
                          <select name="organization_id" class="form-control has-feedback-left" required>
                              <option disabled>Выберите организацию </option>
                                  @include('regpanel.panel.stuff.include.organizations_for_stuff', ['organization' => $organization])
                          </select>
                          <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Позиция<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 ">
                          <select name="position_id"  class="form-control has-feedback-left" required>
                              <option disabled>Выберите позицию </option>
                                  @include('regpanel.panel.stuff.include.positions_for_stuff', ['position' => $position])
                          </select>
                          <span class="fa fa-slack form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Описание <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <textarea class="form-control" name="description" rows="3" placeholder="Описание" >{{$item->description}}</textarea>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Изображение <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                          <div>
                              @include('regpanel.panel.stuff.include.image_single_edit')
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
                  </div>
                </div>
                </form>
              </div>
            </div>
	</section>
 <div class='hidden' data-name='{{$id}}'></div>

@endsection