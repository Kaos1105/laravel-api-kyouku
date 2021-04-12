@extends('layouts.app')

@section('content')

    @include('component.nav-header')

    <form method="POST" action="{{ route('users.create') }}">
        @csrf
        <div class="form-group row col-md-6 d-block">
            <a onClick="window.history.back()" class="form-control btn btn-link w-auto"
               style="margin: 0 20px;">＜戻る
            </a>
        </div>
        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-md-2 col-form-label text-md-left">メールアドレス</label>
            <div class="col-md-4">
                <p class="form-control border-0">{{$user['email']}}</p>
            </div>
        </div>
        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-md-2 col-form-label text-md-left">視聴パスワード</label>
            <div class="col-md-4">
                <p class="form-control border-0">{{$user['security_code']}}</p>
            </div>
        </div>
        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-md-2 col-form-label text-md-left">配信動画区分</label>
            <div class="col-md-4">
                <p class="form-control border-0">{{$user['video_type']}}</p>
            </div>
        </div>
        <div class="form-group row col-md-4 offset-md-3 d-block text-center">
            <button class="form-control btn btn-primary w-auto"
                    type="submit">ユーザー追加
            </button>
        </div>
        <input type="hidden" name="email" value="{{$user['email']}}">
        <input type="hidden" name="security_code" value="{{$user['security_code']}}">
        <input type="hidden" name="video_type" value="{{$user['video_type']}}">
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
