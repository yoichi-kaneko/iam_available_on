@extends('layouts.app')
@section('page_title', '退会')

@section('content')
    <section class="content page-index">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-7">
                        <h2>User Withdraw</h2>
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
                            <form id="withdraw_form" action="{{ action('WithdrawController@post') }}" method="POST">
                                <div class="col-sm-6">
                                    <input type="checkbox" id="agree_withdraw" name="agree_withdraw" class="filled-in">
                                    <label for="agree_withdraw">退会に合意する</label>
                                </div>
                                {{ csrf_field() }}
                                <button class="btn btn-raised btn-black waves-effect" type="submit">退会する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
