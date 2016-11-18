@extends('backend.layout')

@section('title')
    <title>{{ Settings::blogTitle() }} | Sign In</title>
@stop

@section('login')
    <div class="contain">
        <section id="main">
            <section id="content">
                <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                    <div class="card">
                        <div class="card-body card-padding" id="login-ch">
                            @include('shared.errors')
                            @include('auth.partials.form')
                        </div>
                    </div>
                    <p class="text-center"><a href="/"><i class="zmdi zmdi-long-arrow-return"></i> Back to the blog</a></p>
                </div>
            </section>
        </section>
    </div>
@endsection

@section('unique-js')
    {!! JsValidator::formRequest('App\Http\Requests\LoginRequest', '#login') !!}
    @include('backend.shared.components.show-password', ['inputs' => 'input[name="password"]'])
@stop
