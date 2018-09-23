<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Ability extends Model
{
    protected $table = 'abilities';
    protected $fillable = ['name'];


    public static function new_permission(Request $request) {

        $request->validate([
            'permission_name' => 'required|unique:permissions|min:4|max:100'
        ]);

        $params = $request->all();
        $permission = new Permission();

        $permission->permission_name = $params['permission_name'];

        try {
            $permission->save();
        }
        catch (Exception $e) {
            abort(404);
        }

        return true;

    }
}
