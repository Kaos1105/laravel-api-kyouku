@extends('layouts.app')

@section('content')

    @include('component.nav-header')

    <form method="GET" action="{{ route('users.index') }}">
        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-form-label text-md-right">キーワード</label>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <input class="form-control" placeholder="メールアドレス、または視聴パスワードを入力してください。"
                           value="{{ app('request')->input('keyword') }}" name="keyword">
                </div>
            </div>
            <div class="col-md-5">
                <div class="d-flex align-items-center">
                    <button class="form-control btn btn-primary" style="margin: 0 20px; width: 120px"
                            type="submit">検索
                    </button>
                    <a href="{{route('users.new')}}" class="form-control btn btn-success w-auto"
                       role="button">ユーザー追加</a>
                    <a href="{{route('users.show-import')}}" class="form-control btn btn-danger w-auto"
                       style="margin-left: 20px"
                       role="button">CSVアップ</a>
                </div>
            </div>
        </div>
    </form>

    {!! $users->links('pagination') !!}

    <table class="table table-stripped">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">メールアドレス</th>
            <th scope="col">視聴パスワード</th>
            <th scope="col" id="sort">配信動画区分 <span class="fa fa-sort"></span>
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                @if(app('request')->input('page'))
                    <th scope="row">{{ $loop->iteration + 20*(app('request')->input('page') - 1) }}</th>
                @else
                    <th scope="row">{{ $loop->iteration }}</th>
                @endif
                <td>{{$user->email}}</td>
                <td>{{$user->security_code}}</td>
                <td>{{$user->video_type}}</td>
            </tr>
        @empty
            <p class="text-center">適応ユーザーが見つけません。ご確認ください。</p>
        @endforelse
        </tbody>
    </table>
    {!! $users->links('pagination') !!}
    <script>
      document.getElementById('sort').addEventListener('click', click)

      function click () {
        var url = window.location.href

        var order = 'desc'

        if (url.indexOf('desc') > -1) {
          order = 'asc'
        }

        window.location = updateQueryStringParameter(url, 'sort', order)
      }

      function updateQueryStringParameter (uri, key, value) {
        var re = new RegExp('([?&])' + key + '=.*?(&|$)', 'i')
        var separator = uri.indexOf('?') !== -1 ? '&' : '?'
        if (uri.match(re)) {
          return uri.replace(re, '$1' + key + '=' + value + '$2')
        } else {
          return uri + separator + key + '=' + value
        }
      }
    </script>
@endsection


