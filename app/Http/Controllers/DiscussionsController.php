<?php

namespace LaravelForum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use LaravelForum\Discussion;
use LaravelForum\Http\Requests\CreateDiscussionRequest;
use LaravelForum\Reply;

class DiscussionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussions.index',[
           'discussions' => Discussion::paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        auth()->user()->discussions()->create([
            'title' => $request->title,
            'content' => $request->discussion_content,
            'slug' => Str::slug($request->title),
            'channel_id' => $request->channel
        ]);

        session()->flash('success', "'{$request->title}' is created successfully");

        return redirect(route('discussions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return view('discussions.show',[
           'discussion' => $discussion
        ]);
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

    /**
     * The reply marked as best reply.
     *
     * @param  \LaravelForum\Discussion $discussion
     * @param  \LaravelForum\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function bestReply(Discussion $discussion, Reply $reply)
    {
        $discussion->markAsBestReply($reply);

        session()->flash('success', "'{$discussion->title}' was marked as the best reply.");

        return redirect()->back();
    }
}
