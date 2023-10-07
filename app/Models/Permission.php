<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    public function rule() {
        $rule = $this->hasOne(Rule::class, 'id', 'rule_id');
        return $rule;
    }
}