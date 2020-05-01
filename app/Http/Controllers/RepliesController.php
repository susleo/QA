<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Notifications\markAsBestReply;
use App\User;
use App\Http\Requests\Reply\CreateReplyRequest;
use App\Notifications\Hello;
use App\Notifications\NewReplyAdded;
use App\Reply;
use Illuminate\Http\Request;


class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    public function store(CreateReplyRequest $request,Discussion $discussion)
    {
        //
//        dd( $discussion->user);
        auth()->user()->replies()->create([
            'discussion_id'=>$discussion->id,
            'contents'=>$request->contents,
        ]);


        ($discussion->user->notify(new NewReplyAdded($discussion)));

        session()->flash('success','Reply Added');
        return redirect()->back();

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

    public function reply(Discussion $discussion , Reply $reply){

        $discussion->reply_id = $reply->id ;
        $discussion->update();

        $reply->user->notify(new markAsBestReply($discussion));
       // $discussion->markedAsBest($reply);

        session()->flash('success','Reply Marked As best');
        return redirect()->back();
    }

}
