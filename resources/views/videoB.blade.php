@extends('layouts.index')

@section('style')
    <link href="{{ asset('css/colorbox.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"></script>
    <script>
      $(function () {
        $(document).ready(colorbox)
        $(window).on('resize', colorbox)

        function colorbox () {
          var baseWidth = $(window).width()
          var w = baseWidth * 0.8
          var h = w * 0.565
          $('.movie-modal').colorbox({
            iframe: true,
            innerWidth: w,
            innerHeight: h,
            maxWidth: '90%',
          })
        }
      })
    </script>
    <!-- Google Tag Manager -->
    <script>
      (function (w, d, s, l, i) {
        w[l] = w[l] || []
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js',
        })
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : ''
        j.async = true
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl
        f.parentNode.insertBefore(j, f)
      })(window, document, 'script', 'dataLayer', 'GTM-KK8GXFB')
    </script>
    <!-- End Google Tag Manager -->
@endsection

@section('google')
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KK8GXFB" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
@endsection

@section('main')
    <div class="v_head01">
        <div class="inner">
            <div class="v_head01_ttl">
                <picture>
                    <!--[if IE 9]>
                    <video style="display: none;"><![endif]-->
                    <source media="(min-width:781px)" srcset="{{ asset('images/v_kv_ttl01.png') }}">
                    <source media="(max-width:780px)" srcset="{{ asset('spimages/v_kv_ttl01.png') }}">
                    <!--[if IE 9]></video><![endif]-->
                    <img src="{{ asset('images/v_kv_ttl01.png') }}" alt="SUPER JUNIOR オリジナル動画" class="switching">
                </picture>
            </div>
        </div>
    </div>

    <div class="v_s1">

        <div class="v_s1_th_flex">
            <div class="v_s1_th">
                <a class="movie-modal" href="{{route('show-popup-video',['code'=>'MTQ='])}}">
                    <picture>
                        <!--[if IE 9]>
                        <video style="display: none;"><![endif]-->
                        <source media="(min-width:781px)" srcset="{{ asset('images/th01.png') }}">
                        <source media="(max-width:780px)" srcset="{{ asset('spimages/th01.png') }}">
                        <!--[if IE 9]></video><![endif]-->
                        <img src="{{ asset('images/th01.png') }}" alt="" class="switching">
                    </picture>
                </a>
            </div>

            <div class="v_s1_th">
                <a class="movie-modal" href="{{route('show-popup-video',['code'=>'MjI='])}}">
                    <picture>
                        <!--[if IE 9]>
                        <video style="display: none;"><![endif]-->
                        <source media="(min-width:781px)" srcset="{{ asset('images/th02.png') }}">
                        <source media="(max-width:780px)" srcset="{{ asset('spimages/th02.png') }}">
                        <!--[if IE 9]></video><![endif]-->
                        <img src="{{ asset('images/th02.png') }}" alt="" class="switching">
                    </picture>
                </a>
            </div>

            <div class="v_s1_th">
                <a class="movie-modal" href="{{route('show-popup-video',['code'=>'MTg='])}}">
                    <picture>
                        <!--[if IE 9]>
                        <video style="display: none;"><![endif]-->
                        <source media="(min-width:781px)" srcset="{{ asset('images/th03.png') }}">
                        <source media="(max-width:780px)" srcset="{{ asset('spimages/th03.png') }}">
                        <!--[if IE 9]></video><![endif]-->
                        <img src="{{ asset('images/th03.png') }}" alt="" class="switching">
                    </picture>
                </a>
            </div>

            <div class="v_s1_th">
                <a class="movie-modal" href="{{route('show-popup-video',['code'=>'MTA='])}}">
                    <picture>
                        <!--[if IE 9]>
                        <video style="display: none;"><![endif]-->
                        <source media="(min-width:781px)" srcset="{{ asset('images/th04.png') }}">
                        <source media="(max-width:780px)" srcset="{{ asset('spimages/th04.png') }}">
                        <!--[if IE 9]></video><![endif]-->
                        <img src="{{ asset('images/th04.png') }}" alt="" class="switching">
                    </picture>
                </a>
            </div>

            <div class="v_s1_th">
                <a class="movie-modal" href="{{route('show-popup-video',['code'=>'OA=='])}}">
                    <picture>
                        <!--[if IE 9]>
                        <video style="display: none;"><![endif]-->
                        <source media="(min-width:781px)" srcset="{{ asset('images/th05.png') }}">
                        <source media="(max-width:780px)" srcset="{{ asset('spimages/th05.png') }}">
                        <!--[if IE 9]></video><![endif]-->
                        <img src="{{ asset('images/th05.png') }}" alt="" class="switching">
                    </picture>
                </a>
            </div>

            <div class="v_s1_th">
                <a class="movie-modal" href="{{route('show-popup-video',['code'=>'MjA='])}}">
                    <picture>
                        <!--[if IE 9]>
                        <video style="display: none;"><![endif]-->
                        <source media="(min-width:781px)" srcset="{{ asset('images/th06.png') }}">
                        <source media="(max-width:780px)" srcset="{{ asset('spimages/th06.png') }}">
                        <!--[if IE 9]></video><![endif]-->
                        <img src="{{ asset('images/th06.png') }}" alt="" class="switching">
                    </picture>
                </a>
            </div>

            <div class="v_s1_th">
                <a class="movie-modal" href="{{route('show-popup-video',['code'=>'MTY='])}}">
                    <picture>
                        <!--[if IE 9]>
                        <video style="display: none;"><![endif]-->
                        <source media="(min-width:781px)" srcset="{{ asset('images/th07.png') }}">
                        <source media="(max-width:780px)" srcset="{{ asset('spimages/th07.png') }}">
                        <!--[if IE 9]></video><![endif]-->
                        <img src="{{ asset('images/th07.png') }}" alt="" class="switching">
                    </picture>
                </a>
            </div>

            <div class="v_s1_th">
                <a class="movie-modal" href="{{route('show-popup-video',['code'=>'MTI='])}}">
                    <picture>
                        <!--[if IE 9]>
                        <video style="display: none;"><![endif]-->
                        <source media="(min-width:781px)" srcset="{{ asset('images/th08.png') }}">
                        <source media="(max-width:780px)" srcset="{{ asset('spimages/th08.png') }}">
                        <!--[if IE 9]></video><![endif]-->
                        <img src="{{ asset('images/th08.png') }}" alt="" class="switching">
                    </picture>
                </a>
            </div>
        </div>

        <div class="v_s1_logout">
            <a href="{{route('welcome')}}">
                <picture>
                    <!--[if IE 9]>
                    <video style="display: none;"><![endif]-->
                    <source media="(min-width:781px)" srcset="{{ asset('images/btn_logout.png') }}">
                    <source media="(max-width:780px)" srcset="{{ asset('spimages/btn_logout.png') }}">
                    <!--[if IE 9]></video><![endif]-->
                    <img src="{{ asset('images/btn_logout.png') }}" alt="ログアウト" class="switching">
                </picture>
            </a>
        </div>


        <div class="s3_info">
            <picture>
                <!--[if IE 9]>
                <video style="display: none;"><![endif]-->
                <source media="(min-width:781px)" srcset="{{ asset('images/contact_titlle.png') }}">
                <source media="(max-width:780px)" srcset="{{ asset('spimages/contact_titlle.png') }}">
                <!--[if IE 9]></video><![endif]-->
                <img src="{{ asset('images/contact_titlle.png') }}" alt="本キャンペーンに関するお問い合わせ先" class="switching">
            </picture>
            <h4>「SUPER JUNIOR 限定動画&グッズ当たる!<br class="br-sp">キャンペーン」事務局</h4>
            <h2 class="pc">0120-522-004</h2>
            <h2 class="sp"><a href="tel:0120522004">0120-522-004</a></h2>
            <div class="s3_info_img">
                <picture>
                    <!--[if IE 9]><video style="display: none;"><![endif]-->
                    <source media="(min-width:781px)" srcset="{{asset('images/contact_hour.png')}}">
                    <source media="(max-width:780px)" srcset="{{asset('spimages/contact_hour.png')}}">
                    <!--[if IE 9]></video><![endif]-->
                    <img src="{{asset('images/contact_hour.png')}}" alt="受付時間" class="switching">
                </picture>
            </div>
            <h3>10時～17時（土・日・祝日を除く) </h3>
            <div class="s3_info_img">
                <picture>
                    <!--[if IE 9]><video style="display: none;"><![endif]-->
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