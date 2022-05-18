<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-75XFPLLNQ1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-75XFPLLNQ1');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>eXmap</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/app.css')}}>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ApPcFw7GdzTHXhj7erJNlk_tpn3P3DrjLSsbAPzasrG0b7f8_EDggHCOVS9brMbx' async defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/BmapQuery.js') }}"></script>

        

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                height: 100vh; /* 変数をサポートしていないブラウザのフォールバック */
                height: calc(var(--vh, 1vh) * 100);
            }
            .bg-image{
                background-image: url({{asset('img/hover_view.png')}});
                background-size: contain;
            }

            .z-index{
                z-index: 1010;
            }

            .z-index2{
                z-index: 1004;
            }

        </style>
    </head>
    <body class="w-full">
        <div id="myMap" class="w-screen"></div>
        <div class="search-bar-wrap absolute top-8 mx-auto flex justify-center items-center drop-shadow-lg z-index left-1/2 -translate-x-1/2 md:max-w-2xl w-full select-none">
            <div class="search-bar w-full pl-6 h-12 bg-white rounded-3xl flex justify-start items-center overflow-hidden">
                <input class="h-10 pl-2 box-border border-r-2" style="width: calc(100% - 120px)" type="text" id="search_word" placeholder="ここで検索">
                <div  id="search" style="width:60px" class="h-10 flex justify-center cursor-pointer border-r-2"><img src="{{ asset('img/search.png') }}" class="m-auto"></div>
                <div  id="cancel" style="width:60px" class="h-10 flex justify-center cursor-pointer"><img src="{{ asset('img/cancel.png') }}" class="m-auto h-3/4"></div>
            </div>
        </div>
        <!-- <form method="GET" action="{{ route('category')}}">
            @csrf
            {{-- <div class="absolute w-full bg-white inset-x-0 top-28 mx-auto mt-4 flex justify-center">
                <div class="w-11/12 bg-green-300 flex justify-center">
                    <div class="flex w-full bg-blue-400 justify-center"> --}}
            <div class="absolute w-full inset-x-0 -top-2 mx-auto mt-4 flex justify-center">
                <div class="w-11/12 flex justify-center">
                    <div class="flex w-full justify-center">
                        {{-- <button id="shokuji" type="submit" name="category_id" value=1 class="z-index appearance-none m-2 h-10 drop-shadow-xl ring ring-orange-400 leading-3 rounded-3xl w-20 text-center text-ms font-bold text-gray-700 bg-white flex justify-center items-center">食事</button>
                        <button id="kankou" type="submit" name="category_id" value=2 class="z-index appearance-none m-2 h-10 drop-shadow-xl ring ring-red-400 leading-3 rounded-3xl w-20 text-center text-ms font-bold text-gray-700 bg-white flex justify-center items-center">観光</button> --}}
                        {{-- <button id="kouen" type="submit" name="category_id" value=3 class="appearance-none m-1 h-10 drop-shadow-lg leading-3 rounded-3xl w-20 text-center text-xs bg-white text-green-300 flex justify-center items-center">公園</button> --}}
                        {{-- <button id="outdoor" type="submit" name="category_id" value=4 class="p-1 box-border appearance-none m-1 h-10 drop-shadow-lg leading-3 rounded-3xl w-20 text-center text-xs bg-white text-blue-400 flex justify-center items-center">アウトドア</button> --}}
                        {{-- <button id="fashion" type="submit" name="category_id" value=5 class="p-1 box-border appearance-none m-1 h-10 drop-shadow-lg leading-3 rounded-3xl w-20 text-center text-xs bg-white text-purple-400 flex justify-center items-center">ファッション</button> --}}
                        {{-- <button id="tomaru" type="submit" name="category_id" value=6 class="appearance-none m-1 h-10 drop-shadow-lg leading-3 rounded-3xl w-20 text-center text-xs bg-white text-pink-300 flex justify-center items-center">泊まる</button> --}}
                    </div>
                </div>
            </div>
        </form> -->
        <!-- <div class="absolute top-[122px] left-[-30px] w-full grid">
            <div class="justify-self-center  w-3/5 md:max-w-md">
                <div id="hiddenMenu" class="hidden w-[120px] rounded-md shadow-lg p-2 bg-white ">
                    @guest
                    <div class="border-b text-gray-600 font-semibold p-1"><a href="{{ route('register') }}">サインアップ</a></div>
                    <div class="border-b text-gray-600 font-semibold p-1"><a href="{{ route('login') }}">ログイン</a></div>
                    @else
                    <div class="border-b text-gray-600 font-semibold p-1"><a href="{{ route('mapping_map') }}">マッピングMAP</a></div>
                    <div class="border-b text-gray-600 font-semibold p-1"><a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="text-gray-600 font-semibold p-1"><a href="{{ route('profile_edit') }}">プロフィール</a></div>
                    @endguest
                </div>
            </div>
        </div> -->
        
        <span id="card">
            @if(isset($_GET['user_id']))
            <div id="non_pinchin" class="non_height spot_card_container absolute bottom-0 mx-auto w-full flex justify-center left-0 right-0 md:max-w-6xl select-none">
                <div id="non_height" class="absolute spot_card_content rounded-xl mx-0 overflow-x-auto flex items-center snap-x snap-mandatory w-full xl:max-w-6xl select-none">
                @if(gettype($spots) == "object")
                    @foreach($spots as $spot)
                        <x-spot-card :spot="$spot" />
                    @endforeach
                @endif
                </div>
            </div>
            @endif
        </span>
        
        <script>
            const windowWidth = $(window).width(); //ウィンドウサイズ取得
            const windowSm = 820; //なんとなくwidth:820pxをアクションのブレイクポイントにしてみました
            let selectedVideo=-1;
            let searching=<?php if (isset($_GET['user_id'])) {echo 1;} else {echo 0;} ?>;
            const cardAction = (map,lat,lon,el) => { //カードにマウスオン、マウスアウトでピンが動画ピンに変化
                if(windowWidth > windowSm){
                    $('#'+el['spot_id']).on('mouseover', function(){
                        map.infoboxHtml(lat, lon, '<div id="info_id'+el["spot_id"]+'" style="width: 300px; background-color: #fff; position:absolute; top:-250px; left:-145px;" style="user-select:none;"><div class="h-3/4 overflow-hidden flex items-center mt-1"><img width="315" height="170" src="https://img.youtube.com/vi/'+el['youtube_id']+'/hqdefault.jpg" alt="" /></div></div>');
                        map.infoboxHtml(lat, lon, '<svg class="absolute animate-bounce w-6 h-6 text-gray-900 -left-3 -top-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>');
                    }) 
                    $('.view_button').on('mouseout', function(){
                        $('#info_id'+el['spot_id']).remove();
                        $('svg').remove();
                    })
                }
                $('#'+el['spot_id']).on('click', function(){
                    if (selectedVideo!=el['spot_id']) {
                        $('svg').remove();
                        map.changeMap(lat,lon);
                        selectedVideo=el['spot_id'];
                        map.infoboxHtml(lat, lon, '<svg class="absolute animate-bounce w-6 h-6 text-gray-900 -left-3 -top-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>');
                    } else {
                        window.location.href = "/view?spot_id="+el['spot_id'];
                    }
                })
            }

            //iOS11以降でピンチインアウトで拡大縮小禁止
            document.body.addEventListener("touchstart", function(e){
                if (e.touches && e.touches.length > 1) {
                    e.preventDefault();
                }
            }, {passive: false});
            document.body.addEventListener("touchmove", function(e){
                if (e.touches && e.touches.length > 1) {
                    e.preventDefault();
                }
            }, {passive: false});

            // 最初に、ビューポートの高さを取得し、0.01を掛けて1%の値を算出して、vh単位の値を取得
            let vh = window.innerHeight * 0.01;
            // カスタム変数--vhの値をドキュメントのルートに設定
            document.documentElement.style.setProperty('--vh', `${vh}px`);

            // resizeイベントの取得
            window.addEventListener('resize', () => {
            // あとは上記と同じスクリプトを実行
            let vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
            });

            const locations = [];
            const mappingFunction = (map,datas) => {
                datas.forEach((el,i) => {
                    const lat = el['lat'];
                    const lon = el['lon'];
                    locations[i] = new Microsoft.Maps.Location(lat, lon);
                    if (el["category_id"]==1) {
                        iconUrl = "{{asset('img/restaurant.png')}}";
                    } else {
                        iconUrl = "{{asset('img/sightseeing.png')}}";
                    }
                    //ワイナリーフェスタ終わったら削除
                    if (el["user_id"]==20) {
                        iconUrl = "{{asset('img/wine.png')}}";
                    }
                    //ここまでワイナリーフェスタ終わったら削除
                    const x = new Microsoft.Maps.Pushpin(locations[i], {
                                        icon: iconUrl,
                                        anchor: new Microsoft.Maps.Point(14,14),
                                        roundClickableArea:true
                                    });
                    map.map.entities.push(x);
                    cardAction(map,lat,lon,el);
                    map.onPin(x,"click", function(){
                        $('svg').remove();
                        map.infoboxHtml(lat, lon, '<svg class="absolute animate-bounce w-6 h-6 text-gray-900 -left-3 -top-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>');
                        selectedVideo=el['spot_id'];
                        if(windowWidth <= windowSm){map.changeMap(lat,lon)};
                        if (searching==0) {
                            $('#card').empty();
                            $('#card').append('<div id="non_pinchin" class="non_height spot_card_container absolute bottom-0 mx-auto w-full flex justify-center left-0 right-0 md:max-w-6xl select-none h-1/4"><div id="non_height" class="absolute spot_card_content rounded-xl mx-0 overflow-x-auto flex items-center snap-x snap-mandatory w-full xl:max-w-6xl select-none h-full"></div></div>')
                            $('#non_height').append('<div class="spot_card_element_wrap snap-center w-full h-full flex items-center box-border min-w-full select-none" ><button type="submit" class="cursor w-full h-full z-index"><a href="/view?spot_id='+el['spot_id']+'"><div id="'+el['spot_id']+'" class="view_button w-full h-full py-2 hover:text-white hover:font-bold bg-aaa hover:bg-blue-400 ring-4 ring-white rounded-xl box-border flex items-center h-full justify-between"><input type="hidden" name="spot_id" value="'+el['spot_id']+'"><div id="ytimg'+el['spot_id']+'" class="left_element overflow-hidden h-2/3 mx-3 flex items-center justify-center w-48 ss:overflow-visible ss:h-full"><img src="https://img.youtube.com/vi/'+el['youtube_id']+'/hqdefault.jpg" /></div><div class="text-xs ss:text-base" style="width: calc(100% - 200px)"><div class="flex justify-start"><p class="mt-2 mb-1">'+el['movie_title']+'</p></div><div class="flex items-center"><img class="w-8 h-8 mx-2 rounded-full" src="https://bemaped.sakuraweb.com/storage/'+el['icon_img']+'" alt=""><span class="user_name">'+el['name']+'</span></div></div></div></a></button></div>');
                        } else {
                            let y = $('#'+el['spot_id']+'').position();
                            let z = $('#non_height').scrollLeft();
                            var pos = y.left + z;
                            $("#non_height").animate({scrollLeft: pos},"slow", "swing");
                        }
                    })
                    map.onPin(x, "mouseout", function () {
                        if($(window).width() > windowSm){
                            $('#info_id'+el['spot_id']).remove();
                        }
                    });
                    map.onPin(x, "mouseover", function () {
                        if($(window).width() > windowSm){
                            map.infoboxHtml(lat, lon, '<div id="info_id'+el["spot_id"]+'" style="width: 300px; background-color: #fff; position:absolute; top:-250px; left:-145px; user-select:none;"><div class="h-3/4 overflow-hidden flex items-center mt-1"><img width="315" height="170" src="https://img.youtube.com/vi/'+el['youtube_id']+'/hqdefault.jpg" alt="" /></div></div>');
                            let y = $('#'+el['spot_id']+'').position();
                            let z = $('#non_height').scrollLeft();
                            var pos = y.left + z;
                            $("#non_height").animate({scrollLeft: pos},"slow", "swing");
                            selectedVideo=el['spot_id'];
                        }
                    });
                })
                if(typeof(datas) == 'object'){
                    $('.non_height').addClass('h-1/4');
                    $('#non_height').addClass('h-full');
                }
            }

            function GetMap() {
                //------------------------------------------------------------------------
                //1. Instance
                //------------------------------------------------------------------------
                const map = new Bmap("#myMap");
                //------------------------------------------------------------------------
                //2. Display Map（表示されるマップの設定）
                //   スタートマップ（緯度、経度、マップの種類、ズームの度合い）
                //   startMap(lat, lon, "MapType", Zoom[1~20]);
                //   マップの種類：↓色々ある
                //   MapType:[load, aerial,canvasDark,canvasLight,birdseye,grayscale,streetside]
                //--------------------------------------------------
                map.startMap(36.10464927598747, 137.94293850768207, "load", 14);
                //マッピング関数
                mappingFunction(map,@json($spots));
                <?php
                if (isset($_GET["user_id"])) {
                    echo
                    "map.map.setView({
                        bounds: Microsoft.Maps.LocationRect.fromLocations(locations), //fromLocations or fromShapes
                        padding: 30
                    });";
                }
                ?>
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    map.pinLayer(lat,lon);
                    <?php
                    if (!isset($_GET["user_id"])) {
                        echo
                        "map.changeMap(lat, lon);";
                    }
                    ?>
                });
                
                //検索時にAjaxでデータ取得
                $("#search_word").on("keydown",function(e){
                    if(e.keyCode==13){
                        document.getElementById("search").click();
                    }
                });
                $("#search").on("click", function() {
                    $('svg').remove();
                    selectedVideo=-1;
                    searching=1;
                    $(function(){
                        $.ajax({
                            type: "get", //HTTP通信の種類
                            url:'/search?search_word='+document.getElementById("search_word").value
                        })
                        //通信が成功したとき
                        .done((res)=>{
                            map.deletePin();
                            mappingFunction(map,res);
                            $('#card').empty();
                            $('#card').append('<div id="non_pinchin" class="non_height spot_card_container absolute bottom-0 mx-auto w-full flex justify-center left-0 right-0 md:max-w-6xl select-none h-1/4"><div id="non_height" class="absolute spot_card_content rounded-xl mx-0 overflow-x-auto flex items-center snap-x snap-mandatory w-full xl:max-w-6xl select-none h-full"></div></div>');
                            for (let i=0; i<res.length; i++) {
                                $('#non_height').append('<div class="spot_card_element_wrap snap-center w-full h-full flex items-center box-border min-w-full select-none" ><button type="submit" class="cursor w-full h-full z-index"><div id="'+res[i]['spot_id']+'" class="view_button w-full h-full py-2 hover:text-white hover:font-bold bg-aaa hover:bg-blue-400 ring-4 ring-white rounded-xl box-border flex items-center h-full justify-between"><input type="hidden" name="spot_id" value="'+res[i]['spot_id']+'"><div id="ytimg'+res[i]['spot_id']+'" class="left_element overflow-hidden h-2/3 mx-3 flex items-center justify-center w-48 ss:overflow-visible ss:h-full"><img src="https://img.youtube.com/vi/'+res[i]['youtube_id']+'/hqdefault.jpg" /></div><div class="text-xs ss:text-base" style="width: calc(100% - 200px)"><div class="flex justify-start"><p class="mt-2 mb-1">'+res[i]['movie_title']+'</p></div><div class="flex items-center"><img class="w-8 h-8 mx-2 rounded-full" src="https://bemaped.sakuraweb.com/storage/'+res[i]['icon_img']+'" alt=""><span class="user_name">'+res[i]['name']+'</span></div></div></div></button></div>');
                                cardAction(map,res[i]['lat'],res[i]['lon'],res[i]);
                            }
                        })
                        //通信が失敗したとき
                        .fail((error)=>{
                            console.log(error)
                        })
                    });
                });

                //キャンセルボタンを押したときの動作
                $("#cancel").on("click", function() {
                    $('svg').remove();
                    searching=0;
                    selectedVideo=-1;
                    $('#card').empty();
                    if (document.getElementById("search_word").value!='') {
                        document.getElementById("search_word").value='';
                        map.deletePin();
                        $(function(){
                            $.ajax({
                                type: "get", //HTTP通信の種類
                                url:'/search?search_word='+document.getElementById("search_word").value
                            })
                            //通信が成功したとき
                            .done((res)=>{
                                map.deletePin();
                                mappingFunction(map,res);
                            })
                            //通信が失敗したとき
                            .fail((error)=>{
                                console.log(error)
                            })
                        });
                    }
                });
            }
        </script>
    </body> 
</html>
