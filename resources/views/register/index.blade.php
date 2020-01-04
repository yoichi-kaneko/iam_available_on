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
                                    <div class="radio-button">
                                        <input name="weekday_default_status" type="radio" class="with-gap radio-col-blue" id="weekday_default_status_1" value="1">
                                        <label for="weekday_default_status_1">◯</label>
                                        <input name="weekday_default_status" type="radio" class="radio-col-yellow with-gap" id="weekday_default_status_2" value="2">
                                        <label for="weekday_default_status_2">△</label>
                                        <input name="weekday_default_status" type="radio" class="radio-col-red with-gap" id="weekday_default_status_3" value="3">
                                        <label for="weekday_default_status_3">×</label>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">
                                土日祝日のデフォルト予定
                                <small>土日祝日にデフォルトでセットされるマークを選択してください。</small>
                            </h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="radio-button">
                                        <input name="holiday_default_status" type="radio" class="with-gap radio-col-blue" id="holiday_default_status_1" value="1">
                                        <label for="holiday_default_status_1">◯</label>
                                        <input name="holiday_default_status" type="radio" class="radio-col-yellow with-gap" id="holiday_default_status_2" value="2">
                                        <label for="holiday_default_status_2">△</label>
                                        <input name="holiday_default_status" type="radio" class="radio-col-red with-gap" id="holiday_default_status_3" value="3">
                                        <label for="holiday_default_status_3">×</label>
                                    </div>
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
