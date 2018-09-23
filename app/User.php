<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Bouncer;

class User extends Authenticatable
{
    use Notifiable;
    use HasRolesAndAbilities;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function new_user(Request $request) {

        $request->validate([
            'username' => 'required|unique:users|min:4|max:100',
            'email' => 'required|unique:users|email|min:6|max:100',
            'password' => 'required|confirmed|min:8'
        ]);

        $params = $request->all();
        $user = new User();

        $user->username = $params['username'];
        $user->email = $params['email'];
        $user->password = Hash::make($params['password']);

        try {
            $user->save();
        }
        catch (Exception $e) {
            abort(404);
        }

        return true;

    }

    public function user_abilities() {
        return $this->belongsToMany('App\Ability', 'permissions', 'entity_id', 'ability_id');
    }

}
