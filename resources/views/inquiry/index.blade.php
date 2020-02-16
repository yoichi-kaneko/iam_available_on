@extends('layouts.app')
@section('page_title', '問い合わせ')

@section('content')
    <section class="content page-index">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-7">
                        <h2>問い合せ</h2>
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
                            <form id="inquiry_form" action="{{ action('InquiryController@post') }}" method="POST">
                            <h2 class="card-inside-title">メールアドレス</h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line disabled">
                                        <input type="text" name="mail" class="form-control" placeholder="{{ $input_data['name'] }}">
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">名前</h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line disabled">
                                        <input type="text" name="name"  class="form-control" placeholder="{{ $input_data['name'] }}">
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">問い合わせ本文</h2>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="text" rows="1" class="form-control no-resize auto-growth" placeholder="400字以内">{{ $input_data['text'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <button class="btn btn-raised btn-primary waves-effect" type="submit">問い合わせする</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_file')
    <script src="{{ mix('js/pages/inquiry.js') }}"></script>
@endsection
