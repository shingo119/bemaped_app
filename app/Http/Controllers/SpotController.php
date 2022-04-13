<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spot;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spots = Spot::select('spots.*', 'spots.id AS spot_id', 'users.*')
        ->leftjoin('users','users.id', '=', 'spots.user_id')
        ->where('user_id', '=', 13)
        ->orwhere('user_id', '=', 12)
        ->orwhere('user_id', '=', 21)
        ->orwhere('user_id', '=', 20)
        ->orwhere('user_id', '=', 15)
        ->get();
        // dd($spots);
        return view('top', ['spots' => $spots]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mapping_map()
    {
        return view('mapping_map');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mapping()
    {
        $categories = DB::table('categories')->get();
        return view('mapping', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile_edit()
    {
        $user = User::where('id', '=', \Auth::id())->first();
        return view('profile_edit', ['user' => $user]);
    }

    //fileUpload("送信名","アップロード先フォルダ");
    // function fileUpload($fname,$path){
    // if (isset($request->file('fname') ) && $request->file('fname')["error"] ==0 ) {
    //     //ファイル名取得
    //     $file_name = $request->file('fname')["name"];
    //     //一時保存場所取得
    //     $tmp_path  = $request->file('fname')["tmp_name"];
    //     //拡張子取得
    //     $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    //     //ユニークファイル名作成
    //     $file_name = date("YmdHis").md5(session_id()) . "." . $extension;
    //     // FileUpload [--Start--]
    //     $file_dir_path = $path.$file_name;
    //     if ( is_uploaded_file( $tmp_path ) ) {
    //         if ( move_uploaded_file( $tmp_path, $file_dir_path ) ) {
    //             chmod( $file_dir_path, 0644 );
    //             return $file_name; //成功時：ファイル名を返す
    //         } else {
    //             return 1; //失敗時：ファイル移動に失敗
    //         }
    //     }
    //     }else{
    //         return 2; //失敗時：ファイル取得エラー
    //     }
    // }


//************************************************ */
//************************************************ */
    //明日ここからUser::updateで更新、それとuser_idごとに情報更新しないといけない！
    public function profile_store(Request $request)
    {
        $icon = $request->file('icon_upfile')->store('','public');
        $background = $request->file('background_upfile')->store('', 'public');
        $profile = $request->all();
        $affected = DB::table('users')
            ->where('id', \Auth::id())
            ->update(['name' => $profile['name'], 'email' => $profile['email'], 'icon_img' => $icon, 'background_img' => $background]);
        $spots = ' ';
        return view('top', ['spots' => $spots]);
    }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //YouTubeのURLからVIDEO_IDを取得する関数
    function video_id($movie_url) {
    $res = explode('/', $movie_url);
    $res = $res[count($res)-1];
    $res = explode('v=', $res);
    $res = $res[count($res)-1];
    $res = explode('&', $res);
    $res = $res[0];
    return $res;
    }

    public function store(Request $request)
    {
        $spot = $request->all();
        $spot['movie_url'] = $this->video_id($spot['movie_url']);
        Spot::insert(['movie_title' => $spot['movie_title'], 'comment' => $spot['comment'], 'youtube_id' => $spot['movie_url'], 'tag' => $spot['tag'], 'lat' => $spot['lat'], 'lon' => $spot['lon'], 'user_id' => \Auth::id(), 'category_id' => $spot['category_id']]);
        $spots = ' ';
        return view('top', ['spots' => $spots]);
    }

    public function search(Request $request)
    {
        if($request['search_word'] != null) {
            // dd($request->keyword);// 一旦開通確認をするため ddd()を表示させる
            $keyword = $request->all();
            // dd($keyword['search_word']);
            $search_word = str_replace('　', ' ', $keyword['search_word']);
            $keyword_list = explode(' ', $search_word);
            // dd($keyword_list);
            if(count($keyword_list) > 1){
                $spots = Spot::select('spots.*', 'spots.id AS spot_id', 'users.*')->
                where('movie_title', 'LIKE', '%'.$keyword_list[0].'%')->
                where('movie_title', 'LIKE', '%'.$keyword_list[1].'%')->
                leftjoin('users','users.id', '=', 'spots.user_id')
                ->get();
            }else{
                $spots = Spot::select('spots.*', 'spots.id AS spot_id', 'users.*')->
                where('movie_title', 'LIKE', '%'.$keyword['search_word'].'%')->
                leftjoin('users','users.id', '=', 'spots.user_id')
                ->get();
            }
            // dd($spots);
            return view('search', ['spots' => $spots]);
        }else{
            $spots = ' ';
            return view('search', ['spots' => $spots]);
        }

    }

    public function category(Request $request)
    {
        if($request['category_id'] != null){
            $keyword = $request->all();
            $spots = Spot::select('spots.*', 'spots.id AS spot_id', 'users.*')->
            where('category_id', '=', $keyword['category_id'])
            ->leftjoin('users','users.id', '=', 'spots.user_id')
            ->get();
            return view('top', ['spots' => $spots]);
        }else{
            $spots = ' ';
            return view('top', ['spots' => $spots]);
        }
    }

    public function view(Request $request)
    {
        if($request['spot_id'] != null){
            $keyword = $request->all();
            $spot = Spot::where('id', '=', $keyword['spot_id'])
            ->with(['user'])
            ->first();
            // dd($spot);
            // dd($spot->youtube_id);
            // dd($spot->user->name);
            return view('view', ['spot' => $spot]);
        }else{
            $spots = ' ';
            return view('view', ['spots' => $spots]);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
