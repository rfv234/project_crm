<div>
    <h3>{{$article->name}}</h3>
    @if($article->photo)
    <img src="{{$article->photo}}">
    @endif
    <span>{{$article->text}}</span>
    <a href="/news">
        <button>Вернуться на главную</button>
    </a>
</div>
