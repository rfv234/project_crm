<html>
<head>

</head>
<body>
<div id="app">
    @php
        if (!isset($new))
        {
            $new = new \App\Models\News();
            $new->name = 'новость';
            $new->text = 'текст новости';
        }
    @endphp
    <vue-create-news :novelty="{{$new}}"></vue-create-news>
</div>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>

