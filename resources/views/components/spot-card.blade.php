
    <form class="spot_card_element_wrap my-2 w-11/12 h-30 flex items-center box-border" name="form1" method="POST" action="{{route('view')}}">
        @csrf
        <button id=view_button type="submit" class="cursor hover:text-blue-300 w-full">
            <div class="spot_card_element_wrap my-2 w-full h-30 bg-gray-200 ring-4 ring-white rounded-lg flex items-center box-border">
                <div class="left_element bg-green-300 mx-3 flex items-center justify-center text-xs">
                    <img class="w-64 object-container" src='https://img.youtube.com/vi/{{ $spot->youtube_id }}/maxresdefault.jpg' alt="" />
                </div>
                <div class="right_element text-xs truncate">
                    <p class="title_text mt-2 mb-1 overflow-auto pb-1 pr-1">{{$spot->movie_title}}</p>
                    <div class="flex items-center">
                        <img class="w-4 h-4 mr-1" src="{{ asset('img/susuru.png') }}" alt=""><span class="user_name">{{$spot->name}}</span>
                    </div>
                    <p class="mb-1">2.3万回 視聴</p>
                </div>
            </div>
        </button>
        <input type="hidden" name="spot_id" value="{{$spot->id}}">
    </form>

    
