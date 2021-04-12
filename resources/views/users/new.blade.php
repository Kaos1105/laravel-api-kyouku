@extends('layouts.app')
@section('style')
    <style>
        .padding_04 {
            padding: 0.375rem 0.4rem;
        }
    </style>
@endsection
@section('content')

    @include('component.nav-header')

    <form method="GET" action="{{ route('users.preview') }}">
        <div class="form-group row col-md-6 d-block">
            <a href="{{ route('users.index') }}" class="form-control btn btn-link w-auto"
               style="margin: 0 20px;">＜戻る
            </a>
        </div>
        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-md-3 col-form-label text-md-left">メールアドレス <b
                        class="float-right require-label">※必須</b></label>
            <div class="col-md-4">
                <input class="form-control padding_04" type="email" value="{{ old('email') }}"
                       name="email">
            </div>
        </div>
        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-md-3 col-form-label text-md-left">視聴パスワード <b
                        class="float-right require-label">※必須</b></label>
            <div class="col-md-4">
                <input class="form-control padding_04" minlength="8" maxlength="8"
                       placeholder="大文字と数字8文字で視聴パスワードを指定してください。"
                       value="{{ old('security_code') }}" name="security_code">
            </div>
        </div>
        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-md-3 col-form-label text-md-left">配信動画区分 <b
                        class="float-right require-label">※必須</b></label>
            <div class="col-md-4">
                <select class="form-control padding_04" name="video_type" required>
                    <option selected>-----</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
            </div>
        </div>
        <div class="form-group row col-md-4 offset-md-3 d-block text-center">
            <button class="form-control btn btn-primary" style="margin: 0 20px; width: auto"
                    type="submit">確認
            </button>
        </div>
        <div class="form-group row">
            @error('email')
            <div class="offset-3 col-md-12 require-div">{{$message}}</div>
            @enderror
            @error('security_code')
            <div class="offset-3 col-md-12 require-div">{{$message}}</div>
            @enderror
            @error('video_type')
            <div class="offset-3 col-md-12 require-div">{{$message}}</div>
            @enderror
        </div>
    </form>
@endsection
