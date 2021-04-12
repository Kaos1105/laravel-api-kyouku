@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('ログイン画面') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="username"
                       class="col-md-4 col-form-label text-md-right">{{ __('ログインID') }}</label>

                <div class="col-md-6">
                    <input id="username" class="form-control @error('username') is-invalid @enderror"
                           name="username" value="{{ old('username') }}" autocomplete="username"
                           autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="password"
                       class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password"
                           autocomplete="current-password">
                </div>
            </div>

            <div class="form-group row">
                @error('username')
                <div class="offset-4 col-md-12 require-div">{{$message}}</div>
                @enderror
                @error('password')
                <div class="offset-4 col-md-12 require-div">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group row mb-0 text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        {{ __('ログイン') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
      $(document).ready(function () {
        $('form').submit(function () {
          if (typeof jQuery.data(this, 'disabledOnSubmit') == 'undefined') {
            jQuery.data(this, 'disabledOnSubmit', { submited: true })
            $('input[type=submit], input[type=button]', this).each(function () {
              $(this).attr('disabled', 'disabled')
            })
            return true
          } else {
            return false
          }
        })
      })
    </script>
@endsection


