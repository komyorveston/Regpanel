@extends('layouts.app_admin')

@section('content')
    	<div class="nav_menu">
    		  @component('regpanel.panel.components.breadcrumb')
    			    @slot('title') Список оргинизаций @endslot
    			    @slot('parent') Главная @endslot
    			    @slot('active') Список организаций @endslot
    		  @endcomponent
    	</div>
    
    	<section class="content">
    			<div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
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
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">Организация</th>
                              <th style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">Описание</th>
                              <th style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">Лого</th>
                              <th style="width: 30px; overflow: hidden;">Действия</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($getAllOrganizations as $organization)
                            <tr>
                              <td style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">{{$organization->title}}</td>
                              <td style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">{{$organization->description}} </td>
                              <td style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">{{$organization->img}}</td>
                              <td style="width: 30px; position: inherit;">
                                  <a href="{{route('regpanel.panel.organizations.edit', $organization->id)}}" title="Редактировать"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                  @if ($organization)
                                  <a class="delete" href="{{route('regpanel.panel.organizations.deleteorganization', $organization->id)}}" title="Удалить из БД"><i class="fa fa-fw fa-close text-danger"></i></a>
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
                             <p>{{count($getAllOrganizations)}} сотрудников из {{$count}}</p>
                          </div>
                        </div>
                          @if ($getAllOrganizations->total() > $getAllOrganizations->count())
                          <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="datatable-fixed-header_paginate">
                              <ul class="pagination">
                                <li class="paginate_button">
                                  {{$getAllOrganizations->links()}}
                                </li>
                              </ul>
                            </div>
                          </div>
                           @endif
                      </div>
                    </div>
                </div>
    	</section>

@endsection