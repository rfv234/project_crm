Все чаты
<br>
@foreach($all_chats as $chat)
    @php
    $user_name =  getUserNameById($chat->user_id);
    @endphp
    <hr>
    @foreach($chat->chat as $message)
        {{$message['id']!='bot'?$user_name:$message['id']}} : {{$message['message']}}
        <br>
    @endforeach
@endforeach

стили