@extends('layouts.app')

@section('script')
    <script src="{{ asset('js/script.js') }}" defer></script>
@endsection

@section('content')

    @include('component.nav-header')

    <form method="POST" action="{{ route('users.preview.import') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row col-md-6 d-block">
            <a href="{{route('users.index')}}" class="form-control btn btn-link w-auto"
               style="margin: 0 20px;">＜戻る
            </a>
        </div>

        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-md-3 col-form-label text-md-left">インポートファイル<b
                        class="float-right require-label">※必須</b></label>
            <div class="col-md-4">
                <input type="file" accept=".csv,.xls,.xlsx" name="file" id="upload-file">
            </div>
        </div>
        @php
            $data = Session::get('data');
            $dataSuccess = Session::get('result');
            $fileErrors = Session::get('error');
        @endphp

        <div class="form-group row col-md-4 offset-md-3 d-block text-center">
            <button class="form-control btn btn-primary w-auto" style="margin: 0 20px;"
                    id="btn-preview-csv"
                    {{Session::has('result') ? 'hidden' : '' }} {{Session::has('data') ? 'disabled' : ''}}
                    type="submit">確認
            </button>
            @if(Session::has('result'))
                <button class="btn btn-primary w-auto" id="import" type="button"
                        data-url="{{Session::has('result') ? route('users.import') : '' }}"
                        data-token="{{Session::has('result') ? Session::token() : '' }}"
                        data-import="{{Session::has('result') ? json_encode($dataSuccess) : '' }}"
                >インポート
                </button>
            @endif
        </div>
        <div class="form-group row message">
            @error('file')
            <div class="offset-3 col-md-12 require-div">※インポートファイルを選択してください。</div>
            @enderror

            @if($fileErrors)
                <div class="offset-3 col-md-12 require-div">{{$fileErrors}}</div>
            @endif

            @if($data)
                @include('users.datatable_import',['dataImport' => $data])
            @endif

            @if($dataSuccess)
                @include('users.datatable_import',['dataImport' => $dataSuccess])
            @endif
        </div>
    </form>
@endsection
