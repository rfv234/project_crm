<?php
if (!function_exists('getUserNameById')) {
    /**
     *получает имя пользователя по id
     * @param $id
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|\Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    function getUserNameById($id)
    {
        $user = \App\Models\User::query()->findOrFail($id);
        $name = $user->name;
        return $name;
    }
}