<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            margin: 0 !important;
        }
        #user {
            border: solid 2px;
            width: 100%;
            margin: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="user">
    {{Auth::user()->name}}
    <a href="/dislogin">
        <button id="exit_button">Выход</button>
    </a>
</div>
<div>
    <form action="/search_news">
        <input type="text" placeholder="Найти новость" name="search">
        <input value="Найти" type="submit">
    </form>
</div>
<div id="app">
    <vue-news :news='{{$news}}'
              :users="{{$users}}"
              :canupdate="{{$canupdate}}"
              :cancreate="{{$cancreate}}"
              :currentuser="{{\Illuminate\Support\Facades\Auth::user()->id}}">
    </vue-news>
{{--    <vue-notify :users="{{$users}}"--}}
{{--                :currentuser="{{\Illuminate\Support\Facades\Auth::user()->id}}">--}}

{{--    </vue-notify>--}}
    <vue-chat></vue-chat>
</div>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>