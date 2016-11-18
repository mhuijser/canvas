@extends('backend.layout')

@section('title')
    <title>{{ \App\Models\Settings::blogTitle() }} | Home</title>
@stop

@section('content')
    <section id="main">
        @include('backend.partials.sidebar-navigation')
        <section id="content">
            <div class="container">
                @if(\App\Models\User::isAdmin(Auth::user()->role))
                    @include('backend.home.sections.welcome')
                @endif
                <div class="row">
                    @if(\App\Models\User::isAdmin(Auth::user()->role))
                        <div class="col-sm-6 col-md-6">
                            @include('backend.home.sections.at-a-glance')
                        </div>
                    @endif
                    <div class="col-sm-6 col-md-6">
                        @include('backend.home.sections.quick-draft')
                    </div>
                    <div class="col-sm-6 col-md-6">
                        @include('backend.home.sections.recent-posts')
                    </div>
                    <div class="col-sm-6 col-md-6">
                        @include('backend.home.sections.canvas-news')
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    @if(Session::get('_login'))
        @include('backend.partials.notify', ['section' => '_login'])
        {{ \Session::forget('_login') }}
    @endif
    @include('backend.shared.components.slugify')
    {!! JsValidator::formRequest('App\Http\Requests\PostCreateRequest', '#postCreate') !!}
@stop
