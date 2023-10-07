<html>
<head>

</head>
<body>
<div id="app">
    @php
        use Illuminate\Support\Facades\Auth;if (!isset($new))
        {
            $new = new \App\Models\News();
            $new->name = 'новость';
            $new->text = 'текст новости';
        }
        $permissions = Auth::user()->permissions->pluck('rule_id')->toArray();
        $canupdate = in_array(2, $permissions);
        $candelete = in_array(3, $permissions);
    @endphp
    <vue-create-news :novelty="{{$new}}" :users="{{$users}}" :canupdate="{{$canupdate}}" :candelete="{{$candelete}}"></vue-create-news>
</div>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>

