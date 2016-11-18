@extends('backend.layout')

@section('title')
    <title>{{ Settings::blogTitle() }} | New User</title>
@stop

@section('content')
    <section id="main">
        @include('backend.partials.sidebar-navigation')
        <section id="content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin') }}">Home</a></li>
                            <li><a href="{{ url('admin/user') }}">Users</a></li>
                            <li class="active">New User</li>
                        </ol>
                        @include('shared.errors')
                        @include('shared.success')
                        <h2>Create a New User</h2>
                    </div>
                    <div class="card-body card-padding">
                        <form class="keyboard-save" role="form" method="POST" id="createUser" action="{{ url('admin/user') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('backend.user.partials.form.create')

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> Save</button>
                                &nbsp;
                                <a href="{{ url('admin/user') }}"><button type="button" class="btn btn-link">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    {!! JsValidator::formRequest('App\Http\Requests\UserCreateRequest', '#createUser') !!}
    @include('backend.shared.components.show-password', ['inputs' => 'input[name="password"]'])
@stop