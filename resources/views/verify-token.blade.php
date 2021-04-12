@extends('layouts.index')

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('form').submit(function (e) {
          $('#form1').append("<input name='_token' value='{{csrf_token()}}' type='hidden'>")
          //disable the submit button
          var img = $('#send')
          var clickHandler = img[0].onclick
          img[0].onclick = false
        })
      })
    </script>
@endsection

@section('main')
    <div class="head">
        <div class="inner">
            <div class="logo">
                <a href="https://www.lux.co.jp/" target="_blank">
                    <picture>
                        <!--[if IE 9]>
                        <video style="display: none;"><![endif]-->
                        <source media="(min-width:781px)" srcset="{{asset('images/logo.png')}}">
                        <source media="(max-width:780px)" srcset="{{asset('spimages/logo.png')}}">
                        <!--[if IE 9]></video><![endif]-->
                        <img src="{{asset('images/header_title.png')}}" alt="LUX" class="switching">
                    </picture>
                </a>
            </div>
            <div class="kv_ttl">
                <picture>
                    <!--[if IE 9]>
                    <video style="display: none;"><![endif]-->
                    <source media="(min-width:781px)" srcset="{{asset('images/title.png')}}">
                    <source media="(max-width:780px)" srcset="{{asset('spimages/title.png')}}">
                    <!--[if IE 9]></video><![endif]-->
                    <img src="{{asset('images/title.png')}}" alt="SUPER JUNIOR スペシャルメッセージ動画" class="switching">
                </picture>
            </div>
        </div>
    </div>

    <div class="s1">
        <div class="s1_info">
            <p><b>ご応募の際に登録いただいたメールアドレス（※）へセキュリティーコードを送信しました。<br>ご確認の上、下記へセキュリティーコードを入力してください。</b><br><br></p>

            <p class="ml">（※）<br>【WEB応募の方】<br>Unilever Membersにご登録いただいているメールアドレス<br><br>【ハガキ応募の方】<br>応募ハガキにご記入いただいたメールアドレス<br
                        class="br-sp"></p>
            <p class="ml"><a href="#modal-01">メールが届かない場合はコチラ</a></p>
        </div>

        <div class="s1_password">
            <form name="form1" id="form1" action="{{route('check-token')}}" method="post">
                <p>セキュリティーコード</p>
                <label>
                    <input type="text" class="w100" onblur="" name="token_key" value="{{ old('token_key') }}"
                           maxlength="60" size="60">
                    <input name="id" type="hidden" value="{{app('request')->get('id')}}">
                </label>
                <input type="hidden" name="security_code"
                       value="{{\Illuminate\Support\Facades\Session::get('security_code')}}">
                <picture>
                    <!--[if IE 9]>
                    <video style="display: none;"><![endif]-->
                    <source media="(min-width:781px)" srcset="{{asset('images/btn_login.png')}}">
                    <source media="(max-width:780px)" srcset="{{asset('spimages/btn_login.png')}}">
                    <!--[if IE 9]></video><![endif]-->
                    <img id="send" onclick="$('form').submit()" style="cursor: pointer"
                         src="{{asset('images/btn_login.png')}}"
                         alt="ログイン"
                         class="switching">
                </picture>
            </form>
        </div>

        @php
            $message = \Illuminate\Support\Facades\Session::get('message');
            $status = \Illuminate\Support\Facades\Session::get('status');
        @endphp
        @if ($message)
            <div style="padding-top: 0" class="s1_info">
                <p style="{{($status) ? '': 'color: red'}}">{{$message}}</p>
            </div>
        @endif

        <div class="s3_info">
            <picture>
                <!--[if IE 9]>
                <video style="display: none;"><![endif]-->
                <source media="(min-width:781px)" srcset="{{asset('images/contact_titlle.png')}}">
                <source media="(max-width:780px)" srcset="{{asset('spimages/contact_titlle.png')}}">
                <!--[if IE 9]></video><![endif]-->
                <img src="{{asset('images/contact_titlle.png')}}" alt="本キャンペーンに関するお問い合わせ先" class="switching">
            </picture>
            <h4>「SUPER JUNIOR 限定動画&グッズ当たる!<br class="br-sp">キャンペーン」事務局</h4>
            <h2 class="pc">0120-522-004</h2>
            <h2 class="sp"><a href="tel:0120522004">0120-522-004</a></h2>
            <div class="s3_info_img">
                <picture>
                    <!--[if IE 9]>
                    <video style="display: none;"><![endif]-->
                    <source media="(min-width:781px)" srcset="{{asset('images/contact_hour.png')}}">
                    <source media="(max-width:780px)" srcset="{{asset('spimages/contact_hour.png')}}">
                    <!--[if IE 9]></video><![endif]-->
                    <img src="{{asset('images/contact_hour.png')}}" alt="受付時間" class="switching">
                </picture>
            </div>
            <h3>10時～17時（土・日・祝日を除く) </h3>
            <div class="s3_info_img">
                <picture>
                    <!--[if IE 9]>
                    <video style="display: none;"><![endif]-->
                    <source media="(min-width:781px)" srcset="{{asset('images/contact_date.png')}}">
                    <source media="(max-width:780px)" srcset="{{asset('spimages/contact_date.png')}}">
                    <!--[if IE 9]></video><![endif]-->
                    <img src="{{asset('images/contact_date.png')}}" alt="受付期間" class="switching">
                </picture>
            </div>
            <h3>2021年1月12日（火)～2021年5月31日（月)</h3>
        </div>

    </div>
@endsection

<!-- Modal -->
<div class="modal-wrapper" id="modal-01">
    <a href="#!" class="modal-overlay"></a>
    <div class="modal-window">
        <div class="modal-content">
            <h3>メールが届かない場合は、<br class="br-sp">以下の内容をご確認ください。</h3>
            <h5>■迷惑メールフォルダ</h5>
            <p>迷惑メールフォルダに入っている場合があります。<br>
                メールの差出人は「noreply@luxcampaign21sj.com」で、件名は「【SUPER JUNIOR 限定動画】セキュリティコードのご案内」です。</p>
             
            <h5>■携帯キャリアでの受信制限</h5>
            <p>各携帯キャリアでの設定でメールが届かない場合があります。<br>
                下記URLをご確認いただき、設定を解除をしてから再度お試しください。<br>
                （各キャリアの関連ページ：<a href="https://www.nttdocomo.co.jp/info/spam_mail/domain/" target="_blank">docomo</a>、<a
                        href="https://www.softbank.jp/mobile/support/mail/antispam/email-i/white/" target="_blank">softbank</a>、<a
                        href="https://www.au.com/support/service/mobile/trouble/mail/email/filter/detail/domain/"
                        target="_blank">au</a>）</p>
            <p>※上記のいずれにも当てはまらない場合は、誠に恐れ入りますがキャンペーン事務局までお問い合わせください。</p>
        </div>
        <a href="#!" class="modal-close">×</a>
    </div>
</div>
<!-- //Modal -->