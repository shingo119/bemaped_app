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
        </style>
        <style>
            .bg-image{
                background-image: url({{asset('img/hover_view.png')}});
            }
        </style>
    </head>
    <body>
        <div id="myMap" class="w-screen h-screen"></div>
        <div class="w-full h-full overflow-y-hidden flex justify-center">
            <div class="bg-gray-200 absolute top-12 w-full h-full rounded-3xl max-w-5xl">
                <a href="{{route('index')}}"><img class="w-12 h-12 mt-3 ml-8" src="{{asset('img/back_button.png')}}" alt=""></a>
                <div class="w-full h-full  flex justify-center">
                    <div class="view_container bg-yellow-300 rounded-3xl w-11/12 h-3/5 mt-2 max-w-4xl sm:h-3/5">
                        <form id="spot" enctype="multipart/form-data" action="{{route('profile_store')}}" method="POST">
                            @csrf
                            <div class="flex justify-center h-full">
                                <div class="input_item flex flex-col justify-between items-start w-4/6 h-4/5 mt-8" data-wow-delay=".5s">
                                    <!-- Name -->
                                    <div class="w-full font-bold my-3">ユーザー名：
                                    <input type="text" name="name" required="required" class="rounded-lg w-full h-8 p-2  sm:h-12" placeholder="ユーザー名（必須）" value="{{$user->name}}"  />
                                    </div>
                                    <!-- Email -->
                                    <div class="w-full font-bold my-3">Email：
                                    <input type="text" name="email" required="required" class="rounded-lg w-full h-8 p-2  sm:h-12" placeholder="メールアドレス（必須）" value="{{$user->email}}" />
                                    </div>
                                    {{-- user_id --}}
                                    <input type="hidden" name="id" name="id" value="{{$user->id}}" />
                                    <div class="my-3 font-bold">アイコン画像：<br><input type="file" accept="image/*" name="icon_upfile"></div>
                                    <div class="my-3 font-bold">背景画像：<br><input type="file" accept="image/*" name="background_upfile"></div>
                                </div>
                            </div>
                            <!-- Bottom Submit -->
                            <div class="flex justify-center">
                                <!-- Send Button -->
                                <button type="submit" class="mt-8 p-2 rounded-xl text-white bg-red-500 drop-shadow-lg">プロフィールを更新</button>
                            </div><!-- End Bottom Submit -->
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <script>

            const windowWidth = $(window).width();

            // $('#view_button').on('click', function(){
            //     $('#hidden_veiw').removeClass('hidden');
            // })

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
                map.startMap(35.712772, 139.750443, "canvasLight", 13);

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
                
            }

        </script>
    </body>
</html>

    
    