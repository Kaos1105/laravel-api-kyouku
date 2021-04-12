@extends('layouts.app')

@section('content')
    @include('component.nav-header')

    <form method="POST" action="{{ route('admins.createOrEdit') }}">
        @csrf
        <input name="id" type="hidden" value="{{ request()->id }}">

        <div class="form-group row col-md-6 d-block">
            <a href="{{route('admins.index')}}" class="form-control btn btn-link w-auto"
               style="margin: 0 20px;">＜戻る
            </a>
        </div>

        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-md-3 col-form-label text-md-left">ログインID<b
                        class="float-right require-label">※必須</b></label>
            <div class="col-md-4">
                <input placeholder="英数字のみ入力してください。" class="form-control" minlength="5" maxlength="16"
                       name="username"
                       value="{{!empty($admin->username) ? $admin->username : old('username')}}">
            </div>
        </div>
        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-md-3 col-form-label text-md-left">{{!empty($admin) ? '新パスワード' : 'パスワード'}}
                <b
                        class="float-right require-label">※必須</b></label>
            <div class="col-md-4">
                <input class="form-control" minlength="8" maxlength="16" type="password"
                       name="password">
            </div>
        </div>
        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-md-3 col-form-label text-md-left">確認パスワード<b
                        class="float-right require-label">※必須</b></label>
            <div class="col-md-4">
                <input class="form-control" minlength="8" maxlength="16" type="password"
                       name="confirm_password">
            </div>
        </div>

        <div class="form-group row col-md-4 offset-md-3 d-block text-center">
            <button class="form-control btn btn-primary w-auto" style="margin: 0 20px;"
                    type="submit">確認
            </button>
        </div>
        <div class="form-group row">
            @error('username')
            <div class="offset-3 col-md-12 require-div">{{$message}}</div>
            @enderror
            @error('password')
            <div class="offset-3 col-md-12 require-div">{{$message}}</div>
            @enderror
            @error('confirm_password')
            <div class="offset-3 col-md-12 require-div">{{$message}}</div>
            @enderror
        </div>
    </form>
@endsection
