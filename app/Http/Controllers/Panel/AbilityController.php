<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ability;
use Bouncer;
use Auth;
use Illuminate\Support\Facades\Session;

class AbilityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Bouncer::can('view-abilities') || Auth::user()->super_admin == '1') {
            $abilities = Ability::orderBy('title','ASC')->paginate(15);

            if ($request->ajax()) {
                return view('admin.partials.cms_ability_listing', ['abilities' => $abilities])->render();
            }

            return view('admin.cms_abilities', compact(['abilities']));
        }
        else {
            flash()->error("You don't have permission to view abilities!");
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
        if (Bouncer::can('create-abilities') || Auth::user()->super_admin == '1') {
            if(isset($request['ability_name']) && $request['ability_name'] != '')
            {
                $ability = Bouncer::ability()->firstOrCreate([
                    'name' => str_slug($request['ability_name']),
                    'title' => $request['ability_name']
                ]);
            }
            flash()->success('Ability has been created');
        }
        else {
            flash()->error("You don't have permission to create new ability!");
            return back();
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
        if (Bouncer::can('delete-abilities') || Auth::user()->super_admin == '1') {
            try {
                $ability = Ability::findOrFail($id);
                $ability->delete();
                flash()->success('Ability has been removed');
            } catch (Exception $e) {
                flash()->error("Ability couldn't be removed");
            }
        }
        else {
                flash()->error("You don't have permission to delete abilities!");
                return back();
        }
    }

    public function changeActive(Request $request)
    {
        if (Bouncer::can('manage-abilities') || Auth::user()->super_admin == '1') {
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
            return "You don't have permission to do that!";
        }

    }

    public function loadMoreAjax($page)
    {
        if (Bouncer::can('view-abilities') || Auth::user()->super_admin == '1') {
            $abilities = Ability::orderBy('title','ASC')->paginate(15,['*'],'page',$page);
            return view('admin.cms_abilities', compact(['abilities']));
        }
        else {
            return "There are no abilities to load!";
        }

    }

}
