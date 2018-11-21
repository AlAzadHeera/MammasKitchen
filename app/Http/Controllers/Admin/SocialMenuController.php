<?php

namespace App\Http\Controllers\Admin;

use App\SocialMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialMenu::all();
        return view('admin.Social.index',compact('socials'));
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
        $social = SocialMenu::find($id);
        return view('admin.Social.edit',compact('social'));
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
        $this->validate($request,[
            'facebook' => 'required',
            'twitter' => 'required',
            'gp' => 'required',
            'linkedin' => 'required',
        ]);

        $social = SocialMenu::find($id);
        $social->facebook = $request->facebook;
        $social->twitter = $request->twitter;
        $social->gp = $request->gp;
        $social->linkedin = $request->linkedin;
        $social->save();
        return redirect()->route('social.index')->with('successMsg','Social Link Updated!!!');
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
