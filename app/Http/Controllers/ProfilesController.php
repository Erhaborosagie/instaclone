<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        //
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
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the user's profile.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);
        $data = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'image',
        ]);
        if ($request['image']){
            $imagePath = $request['image']->store('profile', 'public');

            $img = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);

            $img->save();
            $immArr = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $immArr ?? []
        ));
        return redirect("/profile/{$user->id}" );
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
