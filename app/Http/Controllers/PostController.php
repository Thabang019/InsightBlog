<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   /**
 * Store a newly created resource in storage.
 */
public function store(Request $request) : RedirectResponse
{
    $validated = $request->validate([
        'image' => 'nullable|image|max:2048',
        'title' => 'required|string|max:30',
        'message' => 'required|string|max:1500',
    ]);

    if ($request->user() && $request->user()->isAdmin()) {
        $user = $request->user();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $imagePath = 'storage/';
            $file->move($imagePath, $fileName);
            $validated['image'] = $imagePath.$fileName;
        }

        $post = $user->posts()->create($validated);
    
        return redirect()->route('posts.show', ['post' => $post])->with('success', 'Blog Post Successfully Posted.');
    }

    return redirect()->route('dashboard')->with('error', 'You are not authorized to perform this action.');
}


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = $post->comments;
        return view('posts.show', compact('post', 'comments'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, Request $request) : View
    {

    if ($request->user() && $request->user()->isAdmin()) {
        Gate::authorize('update', $post);
        
        return view('posts.edit', [
            'post' => $post,
        ]);
        } else {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to edit this post.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post) : RedirectResponse
    {
        
        $validated = $request->validate([
            'image' => 'nullable|image|max:2048',
            'title' => 'required|string|max:30',
            'message' => 'required|string|max:1500',
        ]);
  
        if ($request->user() && $request->user()->isAdmin()) {
            Gate::authorize('update', $post);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $imagePath = 'storage/';
                $file->move($imagePath, $fileName);
                $validated['image'] = $imagePath.$fileName;
            }
            
            $post->update($validated);

            return redirect()->route('posts.show', ['post' => $post])->with('success', 'Blog Post Successfully Updated');
 
        }
        return redirect()->route('dashboard')->with('error', 'You are not authorized to edit this post.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Request $request) : RedirectResponse
    {
        if ($request->user() && $request->user()->isAdmin()) {
            Gate::authorize('delete', $post);
            $post->delete();
            return redirect(route('dashboard'));

            } else {
                return redirect()->route('dashboard')->with('error', 'You are not authorized to delete this post.');
            }
       
    }
}
