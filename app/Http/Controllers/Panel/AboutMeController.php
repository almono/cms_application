<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\AboutMe;

class AboutMeController extends Controller
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
    public function index()
    {
        $info = AboutMe::first(); //dd($info->main);
        return view('admin.cms_about_me', compact('info'));
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
        //
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
    public function update(Request $request)
    {
        $info = AboutMe::first();
        $params = $request->except('_token','_method');


        foreach($params['main'] as $main) {
            if(isset($main['keys']) && isset($main['values'])) {
                $main_info[] = array_combine($main['keys'],$main['values']);
            }
        }

        foreach($params['education'] as $education) {
            if(isset($education['keys']) && isset($education['values'])) {
                $education_info[] = array_combine($education['keys'],$education['values']);
            }
        }

        foreach($params['experience'] as $experience) {
            if(isset($experience['keys']) && isset($experience['values'])) {
                $experience_info[] = array_combine($experience['keys'],$experience['values']);
            }
        }

        foreach($params['skills'] as $skills) {
            if(isset($skills['keys']) && isset($skills['values'])) {
                $skills_info[] = array_combine($skills['keys'],$skills['values']);
            }
        }

        foreach($params['interests'] as $interests) {
            if(isset($interests['keys']) && isset($interests['values'])) {
                $interests_info[] = array_combine($interests['keys'],$interests['values']);
            }
        }

        $info->main = $main_info;
        $info->education = $education_info;
        $info->experience = $experience_info;
        $info->skills = $skills_info;
        $info->interests = $interests_info;

        try {
            $info->save();
        } catch (\Exception $e) {
            Log::info('Error while saving about me information! ' . $e->getMessage());
            flash()->error("There has been an error while saving new about me information");
            return back();
        }


        return back();

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
}
