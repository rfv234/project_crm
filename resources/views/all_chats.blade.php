Все чаты
<br>
@foreach($all_chats as $chat)
    <hr>
   @foreach($chat->chat as $message)
       {{$message['id']}} : {{$message['message']}}
       <br>
   @endforeach
@endforeach

добавить имя пользваталя над каждым чатом