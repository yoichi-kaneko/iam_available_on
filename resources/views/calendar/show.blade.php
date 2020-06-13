@extends('layouts.app')
@section('page_title', $user_info['display_name'] . 'さんのカレンダー')
@section('use_page_loader', true)
@section('page_noindex', true)

@if (!empty($user_info['is_owner']))
    @section('use_ajax_post', true)
@endif

@section('content')
    <section class="content page-calendar">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 card">
                        <div class="header">
                            <h2>
                                @if (!empty($user_info['is_owner']))
                                    {{ $user_info['display_name'] }}さん（あなた）のカレンダー
                                @else
                                    {{ $user_info['display_name'] }}さんのカレンダー
                                @endif
                            </h2>
                            @if (empty($user_info['is_owner']))
                            <ul class="header-dropdown m-r--5" style="left: 270px;">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="zmdi zmdi-help-outline"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <li style="width:300px;">
                                            <span style="font-size: 9pt;">
                                                このページはスケジュール情報の共有専用ページです。相手方への連絡が必要な場合には個別の手段にてお願いします。
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            @endif
                        </div>
                        <div class="body">
                            <p class="margin-0">
                                {!! nl2br(e($user_info['description'])) !!}
                                @if (!empty($user_info['is_owner']))
                                    <div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3" data-url="{{ url()->current() }}" data-color="default" data-size="small" data-count="false" style="display: none;"></div>
                                    <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
                                @endif
                            </p>
                        </div>
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
    <script src="{{ mix('js/pages/calendar.js') }}"></script>
@endsection
