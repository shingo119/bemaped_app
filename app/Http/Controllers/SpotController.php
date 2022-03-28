<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spot;
use App\Models\Category;
use App\Models\User;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spots = ' ';
        return view('top', ['spots' => $spots]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
                $spots = Spot::where('movie_title', 'LIKE', '%'.$keyword_list[0].'%')
                ->where('movie_title', 'LIKE', '%'.$keyword_list[1].'%')
                ->leftjoin('users','users.id', '=', 'spots.user_id')
                ->get();
            }else{
                $spots = Spot::where('movie_title', 'LIKE', '%'.$keyword['search_word'].'%')
                ->leftjoin('users','users.id', '=', 'spots.user_id')
                ->get();
            }
            // dd($spots);
            return view('top', ['spots' => $spots]);
        }else{
            $spots = ' ';
            return view('top', ['spots' => $spots]);
        }

    }

    public function category(Request $request)
    {
        if($request['category_id'] != null){
            $keyword = $request->all();
            $spots = Spot::where('category_id', '=', $keyword['category_id'])->get();
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
            $spots = Spot::where('id', '=', $keyword['spot_id'])->get();
            // dd($spot);
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
