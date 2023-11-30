<html>
<head>
    <style>
        table, tr, td {
            border: solid 2px;
        }

        td {
            padding: 5px;
        }

        #back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<h2>Список всех пользователей</h2>
<table>
    <tr>
        <td>Имя пользователя</td>
        <td>Право на создание новостей</td>
        <td>Право на редактирование новостей</td>
        <td>Право на удаление новостей</td>
    </tr>
    @foreach ($users_list as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>
                <a href="/change_permission/{{$user->id}}/1">{{$user->cancreate?'Да':'Нет'}}</a>
            </td>
            <td>
                <a href="/change_permission/{{$user->id}}/2">{{$user->canupdate?'Да':'Нет'}}</a>
            </td>
            <td>
                <a href="/change_permission/{{$user->id}}/3">{{$user->candelete?'Да':'Нет'}}</a>
            </td>
            @if(\Illuminate\Support\Facades\Auth::user()->id==1)
                <td>
                    <a href="/delete_user/{{$user->id}}">
                        <button>Удалить пользователя</button>
                    </a>
                </td>
            @endif
        </tr>
    @endforeach
</table>
<a href="/news">
    <button id="back">Вернуться назад</button>
</a>
</body>
</html>

