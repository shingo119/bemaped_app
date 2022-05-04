
    <div class="spot_card_element_wrap snap-center w-full h-full p-2 flex items-center box-border min-w-full rounded-xl" >
        @csrf
        <button type="submit" class="cursor w-full h-full z-index">
            <div id="{{$spot->spot_id}}" class="view_button w-full h-full py-2 hover:text-white hover:font-bold bg-aaa hover:bg-blue-400 ring-4 ring-white rounded-xl box-border ss:flex ss:items-center ss:h-40 ss:justify-between ss:pl-16">
                <input type="hidden" name="spot_id" value="{{$spot->spot_id}}">
                <div id="ytimg{{$spot->spot_id}}" class="left_element overflow-hidden h-2/3 mx-3 flex items-center justify-center ss:w-48 ss:overflow-visible ss:h-full">
                </div>
                <div class="text-xs ss:text-base ss:w-4/6">
                    <div class="flex justify-start"><p class="mt-2 mb-1 truncate">{{$spot->movie_title}}</p></div>
                    <div class="flex items-center">
                        <img class="w-8 h-8 mx-2 rounded-full" src="{{ asset('storage/'.$spot->icon_img) }}" alt=""><span class="user_name">{{$spot->name}}</span>
                    </div>
                </div>
            </div>
        </button>
    </div>

    
