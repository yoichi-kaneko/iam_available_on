@extends('layouts.app')
@section('page_title', 'このサービスについて')

@section('content')
    <section class="content page-index">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-7">
                        <h2>このサービスについて</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <p>
                                このサービスは、大雑把なスケジュール情報を登録して他の人に「この日空いてます」と伝えるためのものです。<br />
                                組織内での時間単位のスケジュール調整ではなく、組織外の者との日付単位での調整を目的としています。
                            </p>
                        </div>
                        <h4>使い方</h4>
                        <div class="body">
                            <img src="{{ asset('/images/howto_1.png') }}">
                            <p>Googleアカウントを用意し、トップページよりログインします。</p>
                        </div>
                        <div class="body">
                            <img src="{{ asset('/images/howto_2.png') }}">
                            <p>利用規約を確認の上ユーザ登録を行います。ここの項目は後で変更する事も可能です。</p>
                        </div>
                        <div class="body">
                            <img src="{{ asset('/images/howto_3.png') }}">
                            <p>
                                ユーザ登録を行うとカレンダーが作成されます。このページはURLを知る人が全て閲覧可能です。<br />
                                表示される予定情報は現在の日付から翌月末までで、昨日以前の予定情報は表示されません。
                            </p>
                        </div>
                        <div class="body">
                            <img src="{{ asset('/images/howto_4.png') }}">
                            <p>その後は自分のスケジュールを打ち込み、必要に応じて相手への共有を行います。</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <p>
                                <a href="{{ action('PageController@termsofservice') }}">利用規約はこちら</a>
                            </p>
                            <p>
                                <a href="{{ action('InquiryController@index') }}">問い合せはこちら</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
