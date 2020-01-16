@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">API Dashboard</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('home', Auth::user()->id) }}">
                            @csrf
                            @method('PATCH')

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('User Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email"
                                           value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="api_token"
                                       class="col-md-4 col-form-label text-md-right">{{ __('API Token') }}</label>

                                <div class="col-md-6">
                                    <input id="api_token" type="text" class="form-control" name="api_token"
                                           value="{{ Auth::user()->api_token }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="webhook_url"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Webhook URL') }}</label>

                                <div class="col-md-6">
                                    <input id="webhook_url" type="webhook_url"
                                           class="form-control @error('webhook_url') is-invalid @enderror"
                                           name="webhook_url" value="{{ Auth::user()->webhook_url }}"
                                           autocomplete="webhook_url" autofocus>
                                    <strong>We will notify this URL of new jobs and events.</strong>
                                    Clear this value to disable Webhook notifications.
                                    <i>New to Webhooks? <a href="http://webhook.site/" target="_blank">Try out Webhooks
                                            here!</a></i>
                                    <strong>
                                    </strong>

                                    @error('webhook_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="webhook_called_at"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Webhook Last Called') }}</label>

                                <div class="col-md-6">
                                    <input id="webhook_called_at" type="text" class="form-control"
                                           name="webhook_called_at" value="{{ Auth::user()->webhook_called_at }}"
                                           disabled>
                                    <strong>Last time we called your Webhook URL.</strong>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="webhook_secret"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Webhook Secret') }}</label>

                                <div class="col-md-6">
                                    <input id="webhook_secret" type="text" class="form-control" name="webhook_secret"
                                           value="{{ config('webhook-server.secret') }}" disabled>
                                    <strong>Secret we use to sign our Webhook payload.</strong>
                                    <i>Use this if you'd like to verify the payload contents.</i>
                                </div>
                            </div>

                            <div class="form-row text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
