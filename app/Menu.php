<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Nestable\NestableTrait;

class Menu extends Model
{
    use NestableTrait;

    protected $table = 'menu';
    protected $parent = 'parent_id';


    public function parent() {
        return $this->belongsTo('App\Menu','parent_id');
    }

}
