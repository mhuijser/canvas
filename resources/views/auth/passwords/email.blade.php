@extends('backend.layout')

@section('title')
    <title>{{ Settings::blogTitle() }} | Forgot Password</title>
@stop

@section('login')
    <div class="contain">
        <section id="main">
            <section id="content">
                <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                    <div class="card">
                        <div class="card-body card-padding" id="login-ch">
                            <p class="f-20 f-300">Forgot your password?</p>
                            @include('shared.errors')
                            @include('auth.passwords.partials.email-form')
                        </div>
                    </div>
                    <p class="text-center"><a href="/"><i class="zmdi zmdi-long-arrow-return"></i> Back to the blog</a>
                    </p>
                </div>
            </section>
        </section>
    </div>
@endsection

@section('unique-js')
    {!! JsValidator::formRequest('App\Http\Requests\ForgotPasswordRequest', '#forgot-password') !!}
    @include('backend.shared.components.show-password', ['inputs' => 'input[name="password"]'])
@stop
