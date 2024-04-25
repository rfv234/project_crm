<li>
    @foreach($chats as $chat)
        <ul>
            {{$chat->id}}
            <li>
                @foreach(json_decode($chat->file) as $file)
                    <ul style="margin-top: 50px;">
                        <div style="width: 100%; display: flex; justify-content: space-between">
                            {{$file}}
                            <a href="{{$file}}" style="display: block">
                                <button style="width: 100px">Скачать файл</button>
                            </a>
                        </div>
                    </ul>
                @endforeach
            </li>
        </ul>
    @endforeach
</li>