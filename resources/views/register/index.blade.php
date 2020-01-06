@extends('layouts.app')

@section('content')
    <section class="content page-index">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-7">
                        <h2>User Registration</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert bg-pink alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <form action="{{ action('RegisterController@post') }}" method="POST">
                            <h2 class="card-inside-title">メールアドレス（変更不可）</h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line disabled">
                                        <input type="text" class="form-control" placeholder="{{ $input_data['email'] }}" disabled="">
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">表示名</h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="display_name" type="text" class="form-control" placeholder="16字以内" value="{{ $input_data['display_name'] }}">
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">
                                平日のデフォルト予定
                                <small>平日にデフォルトでセットされるマークを選択してください。</small>
                            </h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @include('form/status',['prefix' => 'weekday_default_', 'value' => $input_data['weekday_default_status']])
                                </div>
                            </div>
                            <h2 class="card-inside-title">
                                土日祝日のデフォルト予定
                                <small>土日祝日にデフォルトでセットされるマークを選択してください。</small>
                            </h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @include('form/status',['prefix' => 'holiday_default_', 'value' => $input_data['holiday_default_status']])
                                </div>
                            </div>
                            <h2 class="card-inside-title">表示テキスト</h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="description" rows="1" class="form-control no-resize auto-growth" placeholder="128字以内">{{ $input_data['description'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                            {{ csrf_field() }}
                                <input type="hidden" name="email" value="{{ $input_data['email'] }}" >
                                <input type="hidden" name="encrypted" value="{{ $input_data['encrypted'] }}" >
                            <button class="btn btn-raised btn-primary waves-effect" type="submit">登録する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_file')
    {{Html::script('assets/plugins/autosize/autosize.js')}}
    {{Html::script('assets/js/form.js')}}
@endsection
