<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Role extends Model
{

    protected $table = 'roles';
    protected $fillable = ['name'];

    public static function new_role(Request $request) {

        $request->validate([
            'role_name' => 'required|unique:roles|min:4|max:100'
        ]);

        $params = $request->all();
        $role = new Role();

        $role->name = $params['role_name'];

        try {
            $role->save();
        }
        catch (Exception $e) {
            abort(404);
        }

        return true;

    }

    public function role_abilities() {
        return $this->belongsToMany('App\Ability', 'permissions', 'entity_id', 'ability_id');
    }

}
