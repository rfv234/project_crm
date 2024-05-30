{{--{{dd(json_decode($chat->chat['chat']))}}--}}
<div class="block">
    @foreach(json_decode($chat->chat['chat']) as $item)
        @if($item->id == 'bot')
            <div class="bot_block">
                <p class="bot">
                    {{$item->message}}
                </p>
            </div>
        @endif
        @if($item->id == 'people')
            <div class="people_block">
                <p class="people">
                    {{$item->message}}
                </p>
            </div>
        @endif
    @endforeach
</div>
<style>
    .bot {
        text-align: left;
    }
    .people {
        text-align: right;
    }
    .block {
        width: 100%;
    }
    .bot_block {
        background-color: #ad5bff;
        border-radius: 5px;
        width: max-content;
        padding: 4px;
        margin: 20px;
    }
    .people_block {
        background-color: #0ea5ff;
        border-radius: 5px;
        width: max-content;
        position: absolute;
        right: 0;
        padding: 4px;
        margin: 20px;
    }
</style>