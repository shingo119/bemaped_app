<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>bemaped</title>

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
            }
            
            .bg-image{
                background-image: url({{asset('img/hover_view.png')}});
                background-size: contain;
            }

            .z-index{
                z-index: 1003;
            }
        </style>
    </head>
    <body>
        <div id="myMap" class="w-screen h-screen"></div>
        <form method="POST" action="{{ route('search')}}">
            @csrf
            <div class="search-bar-wrap absolute top-20 inset-x-0 mx-auto flex justify-center items-center drop-shadow-lg z-index">
                <div class="mr-1 bg-white rounded-full">
                    <img id="menu" class="block w-8 p-2 cursor-pointer" src="{{ asset('img/menu3.png')}}" alt="">
                </div>
                <div class="search-bar w-2/3 h-10 bg-aaa rounded-2xl flex justify-end  items-center md:max-w-md">
                    {{-- <img class="w-4 m-2 drop-shadow-lg" src="{{ asset('img/pull_down.png') }}" alt=""> --}}
                    <input class="w-4/5 mr-1 h-8" type="text" id="search" name="search_word">
                    <input type="image" name="submit" class="cursor-pointer w-4 m-2 drop-shadow-lg" src="{{ asset('img/search.png') }}" alt="送信する" >
                    {{-- <button type="submit" class="btn btn-primary">送信</button> --}}
                </div>
                {{-- <img class="w-6 m-2 ring ring-white mr-1 bg-white rounded-full" src="{{ asset('img/bell2.png') }}"> --}}
            </div>
        </form>
        <form method="POST" action="{{ route('category')}}">
            @csrf
            {{-- <div class="absolute w-full bg-white inset-x-0 top-28 mx-auto mt-4 flex justify-center">
                <div class="w-11/12 bg-green-300 flex justify-center">
                    <div class="flex w-full bg-blue-400 justify-center"> --}}
            <div class="absolute w-full inset-x-0 -top-2 mx-auto mt-4 flex justify-center">
                <div class="w-11/12 flex justify-center">
                    <div class="flex w-full justify-center">
                        <button id="shokuji" type="submit" name="category_id" value=1 class="appearance-none m-2 h-10 drop-shadow-xl ring ring-orange-400 leading-3 rounded-3xl w-20 text-center text-ms font-bold text-gray-700 bg-white flex justify-center items-center">食事</button>
                        <button id="kankou" type="submit" name="category_id" value=2 class="appearance-none m-2 h-10 drop-shadow-xl ring ring-red-400 leading-3 rounded-3xl w-20 text-center text-ms font-bold text-gray-700 bg-white flex justify-center items-center">観光</button>
                        {{-- <button id="kouen" type="submit" name="category_id" value=3 class="appearance-none m-1 h-10 drop-shadow-lg leading-3 rounded-3xl w-20 text-center text-xs bg-white text-green-300 flex justify-center items-center">公園</button> --}}
                        {{-- <button id="outdoor" type="submit" name="category_id" value=4 class="p-1 box-border appearance-none m-1 h-10 drop-shadow-lg leading-3 rounded-3xl w-20 text-center text-xs bg-white text-blue-400 flex justify-center items-center">アウトドア</button> --}}
                        {{-- <button id="fashion" type="submit" name="category_id" value=5 class="p-1 box-border appearance-none m-1 h-10 drop-shadow-lg leading-3 rounded-3xl w-20 text-center text-xs bg-white text-purple-400 flex justify-center items-center">ファッション</button> --}}
                        {{-- <button id="tomaru" type="submit" name="category_id" value=6 class="appearance-none m-1 h-10 drop-shadow-lg leading-3 rounded-3xl w-20 text-center text-xs bg-white text-pink-300 flex justify-center items-center">泊まる</button> --}}
                    </div>
                </div>
            </div>
        </form>
        <div class="absolute top-[122px] left-[-30px] w-full grid">
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
        </div>

        <div class="non_height spot_card_container absolute inset-x-0 top-2/3 mx-auto mt-4">
            <div id="non_height" class="spot_card_content w-4/5 m-auto  overflow-x-auto flex flex-col items-center">
        {{-- <div class="non_height spot_card_container absolute inset-x-0 top-2/3 mx-auto mt-4">
            <div id="non_height" class="spot_card_content w-2/3 m-auto overflow-x-scroll snap-y flex flex-col items-center"> --}}
        @if(gettype($spots) == "object")
            @foreach($spots as $spot)
                <x-spot-card :spot="$spot" />
            @endforeach
        @else
            <div></div>
        @endif
            </div>
        </div>
        
        <script>
            function make_iframe_on_map_by_video_id(data){
            return `<iframe class="w-80 h-44 -top-2 rounded-md relative" src="https://www.youtube-nocookie.com/embed/${data}?autoplay=1&mute=1&version=3&loop=1&playlist=${data}&fs=0&modestbranding=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            }

            const windowWidth = $(window).width(); //ウィンドウサイズ取得
            const windowSm = 820; //なんとなくwidth:820pxをアクションのブレイクポイントにしてみました

            // $('#view_button').on('click', function(){
            //     $('#hidden_veiw').removeClass('hidden');
            // })

            const cardHoverAction = (map,lat,lon,el) => { //カードにマウスオン、マウスアウトでピンが動画ピンに変化
                let id = null;
                $('.view_button').on('mouseover', function(){
                    id = $(this).attr('id');
                    $('#info_id'+id).removeAttr('hidden');
                    $('[id^=pin_id]').addClass('hidden');
                    map.infoboxHtml(lat, lon, `<div id="info_id${el['spot_id']}" hidden class="flex rounded-3xl overflow-hidden bg-image w-[320px] h-64 bg-center bg-no-repeat bg-cover relative -top-60 -left-40 justify-center items-center"><img class="w-60 h-36 mb-8" src='https://img.youtube.com/vi/${el['youtube_id']}/maxresdefault.jpg' alt="" /></div>`);
                    // console.log(id);
                }) 
                $('.view_button').on('mouseout', function(){
                    $('#info_id'+id).attr('hidden', true);
                    $('[id^=pin_id]').removeClass('hidden');
                })
            }

            // cardHoverAction();

            function GetMap() {
                //------------------------------------------------------------------------
                //1. Instance
                //------------------------------------------------------------------------
                const map = new Bmap("#myMap");
                // map.disableZooming = false;
                //------------------------------------------------------------------------
                //2. Display Map（表示されるマップの設定）
                //   スタートマップ（緯度、経度、マップの種類、ズームの度合い）
                //   startMap(lat, lon, "MapType", Zoom[1~20]);
                //   マップの種類：↓色々ある
                //   MapType:[load, aerial,canvasDark,canvasLight,birdseye,grayscale,streetside]
                //--------------------------------------------------
                map.startMap(35.712772, 139.750443, "load", 13);

                // キーワード検索で座標を取ってきて、その座標を表示
                // map.getGeocode("Seattle", function (data) {
                //     console.log(data);          //Get Geocode ObjectData
                //     const lat = data.latitude;  //Get latitude
                //     const lon = data.longitude; //Get longitude
                //     document.querySelector("#geocode").innerHTML = lat + '<br>' + lon;
                // });

                //----------------------------------------------------
                //3. Add Pushpin-Icon 好きな画像アイコンをマッピングできる
                // （緯度、経度、アイコン画像、アイコン大きさ、アイコンと位置情報のリンクするところのX位置、アイコンと位置情報のリンクするところY位置）
                // pinIcon(lat, lon, icon, scale, anchor_x, anchor_y);
                //----------------------------------------------------
                //let pin = map.pinIcon(47.6130, -122.1945, "../img/poi_custom.png", 1.0, 0, 0);
                
                //配列をmapで回してマッピング
                // let maxLat = -90;
                // let maxLon = -180;
                // let minLat = 90;
                // let minLon = 180;
                // let latZoom = 0;
                // let lonZoom = 0;
                const locations = [];
                //マッピング関数
                const mappingFunction = (datas) => {
                    datas.forEach((el,i) => {
                        const lat = el['lat'];
                        const lon = el['lon'];
                        locations[i] = new Microsoft.Maps.Location(lat, lon);
                        console.log(locations)
                        // maxLat = maxLat > lat ? maxLat:lat;
                        // maxLon = maxLon > lon ? maxLon:lon;
                        // minLat = minLat < lat ? minLat:lat;
                        // minLon = minLon < lon ? minLon:lon;
                        const x = map.pinText(lat, lon, " ", " ", ' ');
                        const icon = el['icon_img'];
                        // console.log(icon)
                        map.infoboxHtml(lat, lon,`<div id="pin_id${el['spot_id']}" class="relative -left-12 -top-0"><img class="w-24" src="{{asset("img/pin.png")}}"><img class="absolute left-2 top-2 w-20 rounded-full" src="{{ asset('storage/${icon}') }}"></div>`);
                        // map.infoboxHtml(lat, lon, `<div id="info_id${el['spot_id']}" hidden class="flex rounded-t-3xl overflow-hidden bg-image w-96 h-60 bg-center bg-no-repeat bg-cover relative -top-64 -left-48 justify-center items-center">${make_iframe_on_map_by_video_id(el["youtube_id"])}</div>`);
                        cardHoverAction(map,lat,lon,el);
                        // ホバーした時のみ説明を表示する
                        // if(windowWidth <= windowSm){
                        //     map.onPin(x,"click", function(){
                        //         $('#info_id'+el['spot_id']).removeAttr('hidden');
                        //         $('[id^=pin_id]').addClass('hidden');
                        //     })
                        //     map.onMap("click", function () {
                        //         $('[id^=info_id]').attr('hidden', true);
                        //         $('[id^=pin_id]').removeClass('hidden');
                        //     });
                        // }else{
                        //     map.onPin(x, "mouseout", function () {
                        //         $('#info_id'+el['spot_id']).attr('hidden', true);
                        //         $('[id^=pin_id]').removeClass('hidden');
                        //     });
                        //     map.onPin(x, "mouseover", function () {
                        //         $('#info_id'+el['spot_id']).removeAttr('hidden');
                        //         $('[id^=pin_id]').addClass('hidden');
                        //     });
                        // }
                    })
                    if(typeof(datas) == 'object'){
                        $('.non_height').addClass('h-1/4');
                        $('#non_height').addClass('h-full');
                    }
                    map.map.setView({
                        bounds: Microsoft.Maps.LocationRect.fromLocations(locations), //fromLocations or fromShapes
                        padding: 100
                    });
                    // console.log(locations)
                    // console.log(datas)
                    // const latLength = (maxLat - minLat)*91;
                    // const lonLength = (maxLon - minLon)*110;
                    // const latLengthList = [36615, 14646, 7323, 3661, 2929, 1464, 732, 366, 146, 73, 29, 14, 7.3, 3.6, 1.4, 0.7]
                    // const lonLengthList = [55961, 22384, 11192, 5596, 4476, 2238, 1119, 559, 223, 111, 44, 22, 11, 5, 2.2, 1.1]
                    // latLengthList.forEach(el => latLength < el ? latZoom++:null);
                    // lonLengthList.forEach(el => lonLength < el ? lonZoom++:null);
                    // const zoom = Math.min(...[latZoom,lonZoom]);
                    // const maxLength = Math.max(...[latLength,lonLength]);
                    // // console.log("maxLength:"+maxLength);
                    // // console.log("zoom:"+zoom);
                    // // console.log("currentGiocord:"+(Number(maxLat) + Number(minLat))/2+','+(Number(maxLon) + Number(minLon))/2);
                    // map.changeMap((Number(maxLat) + Number(minLat))/2, (Number(maxLon) + Number(minLon))/2, "load", zoom); //ここも毎回changeMapを入れるのは無駄になりそうなので、良い位置が表示されるように検討する                    
                }
                mappingFunction(@json($spots));
            }

        </script>
    </body>
</html>
