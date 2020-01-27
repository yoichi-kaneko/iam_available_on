@extends('layouts.app')
@section('page_title', $user_info['display_name'] . 'さんのカレンダー')

@if (!empty($user_info['is_owner']))
    @section('use_ajax_post', true)
@endif

@section('content')
    <section class="content page-calendar">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-7">
                        <h2>
                            @if (!empty($user_info['is_owner']))
                                {{ $user_info['display_name'] }}さん（あなた）のカレンダー
                            @else
                                {{ $user_info['display_name'] }}さんのカレンダー
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="m-b-20 card">
                        <div class="body">
                            <p>{!! nl2br(e($user_info['description'])) !!}</p>
                        </div>
                    </div>
                </div>
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

            <button type="button" id="modal_button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#scheduleModal" style="display: none;">MODAL</button>

    </section>
    @if (!empty($user_info['is_owner']))
        @include('modal/owner_schedule')
    @else
        @include('modal/user_schedule')
    @endif

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
    {{Html::script('js/pages/calendar.js')}}
@endsection
