@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/toggle-switch-edit.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}" defer></script>
@endsection

@section('content')

    @include('component.nav-header')

    @if(count($admins) < 10)
        <div style="padding: 0 2rem;" class="form-group row">
            <a href="{{route('admins.new')}}" style="width: 120px;" class="form-control btn btn-success"
               role="button">アドミン追加</a>
        </div>
    @endif

    <table class="table table-stripped">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">ログインID</th>
            <th scope="col">アドミン管理</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($admins as $admin)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$admin->username}}</td>
                <td>
                    <label class="switch">
                        <input type="checkbox"
                               data-id="{{$admin->id}}"
                               data-url="{{route('admins.changeStatus')}}"
                               class="toggle-class"
                               {{(optional($admin)->id === Auth::user()->id) ? 'disabled' : ''}}
                               name="is_super_admin" {{(optional($admin)->is_super_admin) ? 'checked' : ''}}>
                        <span class="slider round"></span>
                    </label>
                </td>
                <td>
                    <a href="{{route('admins.edit', $admin->id)}}">編集</a>
                    @if(Auth::user()->id !== $admin->id)| <a href="javascript:void(0)"
                                                             data-toggle="modal"
                                                             data-target="#confirm-delete-{{$admin->id}}">削除</a>
                    @include('admins.popup_delete',['id' => $admin->id,'url' => route('admins.delete', $admin->id)])
                    @endif
                </td>
            </tr>
        @empty
            <p class="text-center">適応ユーザーが見つけません。ご確認ください。</p>
        @endforelse
        </tbody>
    </table>
@endsection
@section('script')
    <script src="{{ asset('js/jquery-2.0.3.min.js') }}" defer></script>
@endsection
