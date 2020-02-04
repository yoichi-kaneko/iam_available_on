@extends('layouts.app')
@section('page_title', 'トップ')

@section('content')
    <section class="content page-index">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-7">
                        <h2>Top</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            @if (!Auth::check())
                                <div class="button-demo">
                                    <a href="{{ action('Auth\LoginController@redirectToGoogle') }}">
                                        <button type="button" class="btn btn-raised btn-primary waves-effect"><i class="zmdi zmdi-google"></i>&nbsp;Sign in by google</button>
                                    </a>
                                </div>
                            @else
                                <div class="button-demo">
                                    <a href="{{ action('Auth\LogoutController@index') }}">
                                        <button type="button" class="btn btn-raised btn-primary waves-effect">Logout</button>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
