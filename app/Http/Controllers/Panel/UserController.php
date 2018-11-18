<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Role;

use Bouncer;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Bouncer::can('view-users') || Auth::user()->super_admin == '1') {
            $users = User::paginate(20);

            if ($request->ajax()) {
                return view('admin.partials.cms_user_listing', ['users' => $users])->render();
            }

            return view('admin.cms_users', compact(['users']));
        }
        else {
            flash()->error("You don't have permission to view users!");
            return redirect()->route('admin');
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
        if (Bouncer::can('create-users') || Auth::user()->super_admin == '1') {
            User::new_user($request);
        }
        else {
            flash()->error("You don't have permission to create new user!");
            return redirect()->route('admin');
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
        if (Bouncer::can('edit-users') || Auth::user()->super_admin == '1') {
            $user = User::findOrFail($id);
            $user_abilities = $user->getAbilities();

            $user_roles = \DB::table('assigned_roles')->select('role_id')->where('entity_id', $user->id)->where('entity_type', 'App\User');
            $roles = Role::whereNotIn('id', $user_roles)->where('active', '1')->orderBy('order','ASC')->get();

            return view('admin.cms_users_edit', ['user' => $user, 'roles' => $roles, 'user_abilities' => $user_abilities]);
        }
        else {
            flash()->error("You don't have permission to edit users!");
            return redirect()->route('admin');
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

    public function admin_logout() {
        Auth::logout();
        flash()->info('You have been logged out!');
        return redirect()->route('admin');
    }

    public function changeActive(Request $request)
    {
        if (Bouncer::can('manager-users') || Auth::user()->super_admin == '1') {
            $id = $request->get('id');
            $user = User::findOrFail($id);

            if ($user->active == '1')
            {
                $user->active = '0';
            }
            else {
                $user->active = '1';
            }

            try {
                $user->save();
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

    public function changeAdmin(Request $request)
    {
        if(Auth::user()->super_admin == '1') {
            $id = $request->get('id');
            $user = User::findOrFail($id);

            if ($user->super_admin == '1')
            {
                $user->super_admin = '0';
            }
            else {
                $user->super_admin = '1';
            }

            try {
                $user->save();
            }
            catch(Exception $e) {
                return false;
            }

            return "State has been changed";
        }
        else {
            return false;
        }

    }

    public function assignRole(Request $request)
    {
        if (Bouncer::can('manage-user-roles') || Auth::user()->super_admin == '1') {
            $params = $request->all();
            $user = User::findOrFail($params['user_id']);

            try {
                Bouncer::assign($params['new_role_select'])->to($user);
            }
            catch (Exception $e) {
                flash()->error('There has been an error while trying to assign a new role');
            }

            flash()->success('You have assigned a new role to this user!');

        }
        else {
            flash()->error("You don't have permission to manage user roles!");
            return redirect()->route('admin');
        }

        return back();

    }

    public function removeRole($user, $role_name)
    {
        if (Bouncer::can('manage-user-roles') || Auth::user()->super_admin == '1') {
            try {
                Bouncer::retract($role_name)->from($user);
            }
            catch (Exception $e) {
                flash()->error('There has been an error while trying to remove a role');
            }

            flash()->success('You have removed role from this user!');

        }
        else {
            flash()->error("You don't have permission to manage user roles!");
            return redirect()->route('admin');
        }

        return back();

    }

    public function getMyAccount()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.cms_my_account',compact('user'));
    }

}
