@extends('layouts.app')

@if (!empty($user_info['is_owner']))
    @section('use_ajax_post', true)
@endif

@section('content')
    <section class="content page-calendar">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-7">
                        <h2>{{ $user_info['display_name'] }}さんのカレンダー</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="card" id="calendar_card">
                        <div class="body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="card" id="calendar_list_card">
                        <div id="calendar_list" class="body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="modal_button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal" style="display: none;">MODAL</button>
    </section>

    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalLabel"><span id="schedule_date"></span></h4>
                </div>
                <div class="modal-body">
                    @include('form/status',['prefix' => 'schedule_'])
                    <div class="form-group">
                        <div class="form-line">
                            <input id="schedule_comment" type="text" class="form-control" placeholder="16文字まで" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="preloader pl-size-xs" id="schedule_loader" style="display: none;">
                        <div class="spinner-layer pl-grey">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div>
                            <div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                        </div>
                    </div>
                    <input name="schedule_id" id="schedule_id" type="hidden">
                    <button id="save_schedule" type="button" class="btn btn-link waves-effect">SAVE</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <script id="event_list" type="text/x-jsrender">
        <div class="event-name event_list @{{:event_class}}" id="schedule_@{{:id}}">
          @{{:date}} @{{:text}}
        </div>
    </script>
    <script>
        const USER_CODE = '{{ $user_info['user_code'] }}';
    </script>
@endsection

@section('js_file')
    {{Html::script('assets/js/pages/calendar/calendar.js')}}
@endsection
