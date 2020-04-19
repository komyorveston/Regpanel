@extends('layouts.app_admin')

@section('content')

    <div class="nav_menu">
		    @component('regpanel.panel.components.breadcrumb')
			       @slot('title') Список сотрудников @endslot
			       @slot('parent') Главная @endslot
			       @slot('active') Список сотрудников @endslot
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
                          <th style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">ФИО</th>
                          <th style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">Должность</th>
                          <th style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">Отдел</th>
                          <th style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">Организация</th>
                          <th style="width: 30px; overflow: hidden;">Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($getAllStuffs as $stuff)
                        <tr>
                          <td style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">{{$stuff->surname}} <br>{{$stuff->name}}<br>{{$stuff->fathersname}}</td>
                          <td style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">{{$stuff->name}} </td>
                          <td style="max-width: 50px; overflow: hidden;text-overflow: ellipsis;">{{$stuff->name}}</td>
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
                         <p>{{count($getAllStuffs)}} сотрудников из {{$count}}</p>
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
    </section>




@endsection

