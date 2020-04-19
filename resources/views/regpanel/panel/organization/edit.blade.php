@extends('layouts.app_admin')


@section('content')
	<div class="nav_menu">
		@component('regpanel.panel.components.breadcrumb')
			@slot('title') Редактирование организации @endslot
			@slot('parent') Главная @endslot
			@slot('organization') Список организаций @endslot
			@slot('active') Редактирование организации {{$organization->title}} @endslot
		@endcomponent
	</div>

	<!-- Main content -->
	<section class="content">
			<div class="row">
              <div class="col-md-12 col-sm-12 ">
              
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
                    <form method="POST" action="{{route('regpanel.panel.organizations.update', $organization->id)}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" data-toggle="validator" >
                    @method('PATCH')
                    @csrf
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Организация <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="title" id="first-name" required="required" class="form-control " value="{{$organization->title}}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Описание <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <textarea class="form-control" name="description" rows="3" placeholder="Описание">{{$organization->description}}</textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Лого <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                          <div>
                             @include('regpanel.panel.organization.include.image_single_edit')
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
              </div>
            </div>

			<!--Department table-->
            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bordered table <small>Bordered table subtitle</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  @if($menu)
                  	<div class="x_content">
                    	@include('regpanel.panel.department.menu.customMenuItems', ['items' => $menu->roots()])
                  	</div>
                  @endif
                </div>
              </div>
              <!--Department table-->
              <!--Stuff table-->
            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bordered table <small>Bordered table subtitle</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">ФИО</th>
                          <th style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">Должность</th>
                          <th style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;"><i class="fa fa-edit"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($getAllStuffs as $stuff)
                        <tr>
                          <td style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">{{$stuff->surname}} <br>{{$stuff->name}}<br>{{$stuff->fathersname}}</td>
                          <td style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">{{$stuff->name}}</td>
                          <td style="width: 30px; position: inherit;">
                          	<a href="{{route('regpanel.panel.stuffs.edit', $stuff->id)}}" title="Редактировать"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                              @if ($stuff)
                              		<a class="delete" href="{{route('regpanel.panel.stuffs.deletestuff', $stuff->id)}}" title="Удалить из БД"><i class="fa fa-fw fa-close text-danger"></i></a>
                              @endif
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="row">
                    <div class="col-sm-5">
                      <div class="dataTables_info" id="datatable-fixed-header_info" role="status" aria-live="polite">
                         <p>{{count($getAllStuffs)}} сотрудников из {{$countstuffs}}</p>
                      </div>
                    </div>
                      @if ($getAllStuffs->total() > $getAllStuffs->count())
                      <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="datatable-fixed-header_paginate">
                          <ul class="pagination">
                            <li class="paginate_button">
                              {{$getAllStuffs->links()}}
                            </li>
                          </ul>
                        </div>
                      </div>
                       @endif
                  </div>
                </div>
              </div>
              <!--Stuff table-->
	</section>
	<!--/.content-->
	<div class='hidden' data-name='{{$id}}'></div>
@endsection