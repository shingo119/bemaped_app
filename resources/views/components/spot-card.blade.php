
    <form class="spot_card_element_wrap my-2 w-11/12 h-full flex items-center box-border" name="form1" method="POST" action="{{route('view')}}">
        @csrf
        <button type="submit" class="cursor w-full h-full">
            <div id="view_button" class="my-2 w-full h-full hover:text-white hover:font-bold bg-aaa hover:bg-blue-400 ring-4 ring-white rounded-lg box-border ss:flex ss:items-center ss:h-40 ss:justify-between">
                <input id="{{$spot->id}}" type="hidden" name="spot_id" value="{{$spot->id}}">
                <div class="left_element mx-3 flex items-center justify-center ss:w-48">
                    <img class="w-36 ss:w-48 mt-2 object-container" src='https://img.youtube.com/vi/{{ $spot->youtube_id }}/maxresdefault.jpg' alt="" />
                </div>
                <div class="text-xs ss:text-base ss:w-4/6">
                    <div class="flex justify-start"><p class="mt-2 mb-1 truncate">{{$spot->movie_title}}</p></div>
                    <div class="flex items-center">
                        <img class="w-4 h-4 mx-2" src="{{ asset('img/susuru.png') }}" alt=""><span class="user_name">{{$spot->name}}</span>
                    </div>
                    {{-- <p class="mb-1">2.3万回 視聴</p> --}}
                </div>
            </div>
        </button>
    </form>

    
