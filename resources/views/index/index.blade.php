@extends('layouts.app')

@section('content')
    <section class="content page-index">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-7">
                        <h2>Calendar</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Extra</a></li>
                            <li class="breadcrumb-item active">Calendar</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2> BOOTSTRAP DEFAULT BUTTONS <small>Use any of the available button classes to quickly create a styled button</small> </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            @if (!Auth::check())
                                <div class="button-demo">
                                    <a href="{{ action('Auth\LoginController@redirectToGoogle') }}">
                                        <button type="button" class="btn btn-raised btn-primary waves-effect">Sign in by google</button>
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
