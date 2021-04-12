@extends('layouts.index')

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
        w[l] = w[l] || []
        w[l].push({
          'gtm.start':
            new Date().getTime(), event: 'gtm.js',
        })
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''
        j.async = true
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl
        f.parentNode.insertBefore(j, f)
      })(window, document, 'script', 'dataLayer', 'GTM-KK8GXFB')</script>
    <!-- End Google Tag Manager -->
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

@section('google')
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KK8GXFB"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
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

        <div class="s1_password">
            <form name="form1" id="form1" action="{{route('check-password')}}" method="post">
                <p>視聴パスワード</p>

                <label>
                    <input type="text" class="w100" onblur="" name="security_code" value="" maxlength="60" size="60"
                           style="-webkit-text-security: disc;">
                </label>

                <picture>
                    <!--[if IE 9]>
                    <video style="display: none;"><![endif]-->
                    <source media="(min-width:781px)" srcset="{{asset('images/btn_next.png')}}">
                    <source media="(max-width:780px)" srcset="{{asset('spimages/btn_next.png')}}">
                    <!--[if IE 9]></video><![endif]-->
                    <img id="send" src="{{asset('images/btn_next.png')}}" alt="次へ" class="switching"
                         style="cursor: pointer" onclick="$('form').submit()">
                </picture>
            </form>
        </div>
        @php
            $message = \Illuminate\Support\Facades\Session::get('message');
            $status = \Illuminate\Support\Facades\Session::get('status');
        @endphp
        @if ($message)
            <div style="padding-top: 0;padding-bottom: 50px;" class="s1_info">
                <p style="{{($status) ? '': 'color: red'}}">{{$message}}</p>
            </div>
        @endif
        <div class="s2_inner">
            <div class="s2_inner_txt_bx">
                <div class="s2_inner_txt">
                    <div class="title-border-right">利用規約</div>
                    <b>【当サイトについて】</b>
                    <p class="indent">※当サイトは当選者ご本人様のみ視聴いただけます。</p>
                    <p class="indent">※当サイトは日本国内からのみ視聴可能です。</p>
                    <p class="indent">※視聴パスワード1件につき、1台の視聴デバイスからのみ視聴が可能になります。</p>
                    <p class="indent">※視聴に伴う通信費はお客様のご負担となります。</p>
                    <p class="indent">※インターネット回線やシステム上のトラブルにより、配信映像や音声の乱れ、動画の一時中断・途中終了の可能性がございます。</p>
                    <p class="indent">※お客様のインターネット環境、視聴環境に伴う不具合に関しては責任を負いかねます。</p>
                    <p class="indent">※視聴ページURL、視聴パスワードの転売・譲渡等は固くお断りさせていただきます。</p>
                    <p class="indent">※当サイトは、いかなる機材においても録音/録画/撮影（スクリーンショット含む）は禁止とさせていただきます。</p>
                    <p class="indent">※動画サイトなどへの無断転載・共有を行った場合、法的責任に問われる場合がございます。</p>
                    <p class="indent">※禁止行為を発見した場合は視聴パスワードの無効化の措置を取らせていただきますので、ご了承ください。</p>
                    <hr>
                    <b>【推奨環境】</b>
                    <p>▼PC</p>
                    <p>Windows（最新バージョンのGoogle Chrome、Microsoft Edge）</p>
                    <p>Mac（最新バージョンのGoogle Chrome、Safari）</p>
                    <p>▼スマートフォン・タブレット</p>
                    <p>Android 5以上（最新バージョンのGoogle Chrome）</p>
                    <p>iOS 12.2以上（最新バージョンのSafari、Google Chrome）</p>
                    <p class="indent">※当サイトではJavaScriptを使用しております。正しくご利用いただくため、お使いのブラウザのメニュー設定で有効にしていただきますようお願いいたします。</p>
                    <p class="indent">※上記推奨環境は動作を保障するものではありませんので、あらかじめご了承ください。</p>
                    <p class="indent">※OSのバージョンアップ方法などにつきましては、各端末メーカー、または携帯電話会社へお問合せください。</p>
                </div>
            </div>
        </div>
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
