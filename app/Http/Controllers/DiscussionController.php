<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\Discussion;
use App\Http\Requests\Discussion\CreateDiscussionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->only(['create','store']);
    }

    public function index()
    {
        //

                $discussions = Discussion::latest()->FilterByCategory()->paginate(10);


        return view('frontend.index',compact('discussions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('frontend/discussion/create')
            ->with('categories',Category::all())
            ->with('tags',Tag::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        //
        $data = [
            'title'=>$request->title,
            'slug'=>Str::slug($request->title,'-'),
            'contents'=>$request->contents,
            'category_id'=>$request->category_id,
//            'user_id'=>auth()->user()->id,
        ];
        $discussion= auth()->user()->discussions()->create($data);
        $discussion->tags()->attach($request->tags);

        session()->flash('success','Discussin Created Successfully');
        return redirect(route('discussion.index'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        //
        return view('frontend.discussion.show')
            ->with('discussion',$discussion);
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
}
