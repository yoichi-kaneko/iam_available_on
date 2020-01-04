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
                            <h2 class="card-inside-title">メールアドレス（変更不可）</h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line disabled">
                                        <input type="text" class="form-control" placeholder="{{ $email }}" disabled="">
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">表示名</h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="16字以内">
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">
                                平日のデフォルト予定
                                <small>平日にデフォルトでセットされるマークを選択してください。</small>
                            </h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @include('form/status',['prefix' => 'weekday_default_'])
                                </div>
                            </div>
                            <h2 class="card-inside-title">
                                土日祝日のデフォルト予定
                                <small>土日祝日にデフォルトでセットされるマークを選択してください。</small>
                            </h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @include('form/status',['prefix' => 'holiday_default_'])
                                </div>
                            </div>
                            <h2 class="card-inside-title">表示テキスト</h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="1" class="form-control no-resize auto-growth" placeholder="200字以内"></textarea>
                                    </div>
                                </div>
                            </div>
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
