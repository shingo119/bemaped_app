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
    public function index(Request $request)
    {
        $spots = Spot::select('spots.*', 'spots.id AS spot_id', 'users.*')
        ->leftjoin('users','users.id', '=', 'spots.user_id');
        if ($request['user_id'] != null) {
            $spots = $spots->where('user_id', '=', $request['user_id']);
        }
        $spots = $spots->get();
        return view('top', ['spots' => $spots]);
    }

    public function test()
    {
        return view('test');
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
        $spots = Spot::select('spots.*', 'spots.id AS spot_id', 'users.*');
        if($request['search_word'] != null) {
            $search_word = str_replace('　', ' ', $request['search_word']);
            $search_word = explode(' ', $search_word);
            for ($i=0; $i<count($search_word); $i++){
                $spots = $spots->where('movie_title', 'LIKE', '%'.$search_word[$i].'%');
            }
        }
        $spots = $spots->leftjoin('users','users.id', '=', 'spots.user_id')->get();
        return $spots;
    }

    public function category(Request $request)
    {
        if($request['category_id'] != null){
            $keyword = $request->all();
            $spots = Spot::select('spots.*', 'spots.id AS spot_id', 'users.*')->
            where('category_id', '=', $keyword['category_id'])
            ->leftjoin('users','users.id', '=', 'spots.user_id')
            ->get();
            return view('search', ['spots' => $spots]);
        }else{
            $spots = ' ';
            return view('search', ['spots' => $spots]);
        }
    }

    public function view(Request $request)
    {
        if($request['spot_id'] != null){
            $keyword = $request->all();
            $spot = Spot::where('id', '=', $keyword['spot_id'])
            ->with(['user'])
            ->first();
            $spot['comment'] = $this->link_title($spot['comment']);
            // dd($spot);
            // dd($spot->youtube_id);
            // dd($spot->user->name);
            return view('view', ['spot' => $spot]);
        }else{
            $spots = ' ';
            return view('view', ['spots' => $spots]);
        }
    }

    function link_url($text){  //対象のテキスト
        $text = htmlspecialchars($text,ENT_NOQUOTES);
        $result = preg_replace('/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/', '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>', $text );
        // dd($result);
        return $result;
    }

    function link_title($text){ 
        $text = htmlspecialchars($text,ENT_NOQUOTES);
        $result = preg_replace('/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/', '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>', $text);
        $patterns = array();
        $patterns[0] = '/五一わいんバナー/';
        $patterns[1] = '/井筒ワインバナー/';
        $patterns[2] = '/信濃ワインバナー/';
        $patterns[3] = '/丘の上幸西ワイナリーバナー/';
        $patterns[4] = '/アルプスバナー/';
        $patterns[5] = '/サントリーバナー/';
        $patterns[6] = '/ベリービーズワイナリーバナー/';
        $patterns[7] = '/VOTANO WINEバナー/';
        $patterns[8] = '/サンサンワイナリーバナー/';
        $patterns[9] = '/桔梗ヶ原ワイナリーバナー/';
        $patterns[10] = '/ドメーヌコーセイバナー/';
        $replacements = array();
        $replacements[0] = '<a href="https://www.furusato-tax.jp/product/detail/20215/4918237" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $replacements[1] = '<a href="https://www.furusato-tax.jp/product/detail/20215/440912" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $replacements[2] = '<a href="https://www.furusato-tax.jp/product/detail/20215/440824" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $replacements[3] = '<a href="https://www.furusato-tax.jp/product/detail/20215/5338553" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $replacements[4] = '<a href="https://www.furusato-tax.jp/product/detail/20215/440891" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $replacements[5] = '<a href="https://www.furusato-tax.jp/product/detail/20215/5410620" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $replacements[6] = '<a href="https://www.furusato-tax.jp/product/detail/20215/4864972" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $replacements[7] = '<a href="https://www.furusato-tax.jp/product/detail/20215/5404200" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $replacements[8] = '<a href="https://www.furusato-tax.jp/product/detail/20215/4987992" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $replacements[9] = '<a href="https://www.furusato-tax.jp/product/detail/20215/5028776" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $replacements[10] = '<a href="https://www.furusato-tax.jp/product/detail/20215/5404201" target="_blank"><div class="flex justify-center w-full border-b bn-color"><img src="https://www.furusato-tax.jp/img/agreement/728_90.png" alt="ふるさとチョイス" width="728" height="90" decoding="async" /></div></a>';
        $result = preg_replace($patterns, $replacements, $result);
        $result = preg_replace('(↑この動画で紹介されている塩尻ワインふるさと寄附返礼品を希望する人はこちらをクリック！)','<span class="wain py-2">$0</span>', $result);
        return $result;
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
