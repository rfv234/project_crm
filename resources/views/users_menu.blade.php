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
            <td>{{$user->cancreate?'Да':'Нет'}}</td>
            <td>{{$user->canupdate?'Да':'Нет'}}</td>
            <td>{{$user->candelete?'Да':'Нет'}}</td>
        </tr>
    @endforeach
</table>
