<ul>
    @foreach($chats as $chat)
        <li>
            <a href="/chat?id={{$chat->id}}">
                {{$chat->created_at}}
            </a>
        </li>
    @endforeach
</ul>



