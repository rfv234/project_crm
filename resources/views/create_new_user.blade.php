<form action="/save_user">
    @if (isset($currentuser))
        <input type="hidden" value="{{$currentuser->id}}" name="id">
        @endif
    <p>
        <label for="name">Введите имя: </label>
        <input type="text" name="name" id="name" value="{{isset($currentuser)?$currentuser->name:''}}">
    </p>
    <p>
        <label for="password">Придумайте пароль: </label>
        <input type="password" name="password" id="password" value="{{isset($currentuser)?$currentuser->password:''}}">
    </p>
    <p>
        <label for="email">Введите почтовый адрес: </label>
        <input type="text" name="email" id="email" value="{{isset($currentuser)?$currentuser->email:''}}">
    </p>
    <input type="submit" value="Сохранить">
</form>
