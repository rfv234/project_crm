<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            margin: 0 !important;
            background: url('/images/blur.jpg') no-repeat;
            background-size: cover;
            backdrop-filter: blur(7px);
        }

        #user {
            border: solid 2px;
            width: 100px;
            margin: 20px;
            text-align: center;
            position: absolute;
            right: 0;
            top: 180px;
        }

        #search {
            position: absolute;
            top: 180px;
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
<div id="search">
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