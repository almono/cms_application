<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ability;
use Bouncer;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Bouncer::can('view-roles')) {
            $abilities = Ability::paginate(20);
            return view('admin.cms_abilities', compact(['abilities']));
        }
        else {
            flash()->error("You don't have permission to view abilities!");
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
        if (Bouncer::can('create-abilities')) {
            if(isset($request['ability_name']) && $request['ability_name'] != '')
            {
                $ability = Bouncer::ability()->firstOrCreate([
                    'name' => str_slug($request['ability_name']),
                    'title' => $request['ability_name']
                ]);
            }
        }
        else {
            flash()->error("You don't have permission to create new ability!");
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
        //
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
            $role = Ability::findOrFail($id);

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
}
