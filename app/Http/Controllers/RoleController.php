<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Ability;
use Bouncer;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Bouncer::can('view-roles')) {
            $roles = Role::paginate(20);
            return view('admin.cms_roles', compact(['roles']));
        }
        else {
            flash()->error("You don't have permission to view roles!");
            return back();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Bouncer::can('create-roles')) {
            if(isset($request['role_name']) && $request['role_name'] != '')
            {
                $role = Bouncer::role()->firstOrCreate([
                    'name' => str_slug($request['role_name']),
                    'title' => $request['role_name']
                ]);
            }
        }
        else {
            flash()->error("You don't have permission to create new role!");
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Bouncer::can('edit-roles')) {
            $role = Role::findOrFail($id);

            $role_abilities = \DB::table('permissions')->select('ability_id')->where('entity_id',$id)->where('entity_type','roles');
            $abilites = Ability::whereNotIn('id',$role_abilities)->where('active','1')->get();

            return view('admin.cms_roles_edit', ['role' => $role,'abilities' => $abilites]);
        }
        else {
            flash()->error("You don't have permission to edit roles!");
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeActive(Request $request)
    {
        if (Bouncer::can('manage-roles')) {
            $id = $request->get('id');
            $role = Role::findOrFail($id);

            if ($role->active == '1')
            {
                $role->active = '0';
            }
            else {
                $role->active = '1';
            }

            try {
                $role->save();
            }
            catch(Exception $e) {
                return 'Error while updating';
            }

            return "State has been changed";
        }
        else {
            return false;
        }

    }

    public function assignAbility(Request $request)
    {
        if (Bouncer::can('manage-role-abilities')) {
            $params = $request->all();

            try {
                Bouncer::allow($params['role_name'])->to($params['new_ability_select']);
                flash()->success('You have assigned a new ability to this role!');
            }
            catch (Exception $e) {
                flash()->error('There has been an error while trying to assign a new ability');
            }
        }
        else {
            flash()->error("You don't have permission to assign abilities!");
        }

        return back();

    }

    public function removeAbility($role_name, $ability_id)
    {
        if (Bouncer::can('manage-role-abilities')) {
            try {
                Bouncer::disallow($role_name)->to($ability_id);
                flash()->success('You have removed ability from this role!');
            }
            catch (Exception $e) {
                flash()->error('There has been an error while trying to remove an ability');
            }
        }
        else {
            flash()->error("You don't have permission to remove abilities!");
        }

        return back();
    }
}
