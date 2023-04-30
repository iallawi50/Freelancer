<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find($id);
        return view('rate', compact(['id', 'user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {

        $data =  request()->validate([
            'rating' => ['required']
        ]);

        Rating::create([
            'stars' => $data['rating'],
            'worker_id' => $id,
            'user_id' => auth()->user()->id
        ]);;
        return redirect('/user/profile/'.  $id  );
    }






}
