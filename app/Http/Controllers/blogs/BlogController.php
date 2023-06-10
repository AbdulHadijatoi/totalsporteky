<?php

namespace App\Http\Controllers\blogs;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
  public function index()
  {
    return view('content.form-elements.blog');
  }
  public function save(Request $request)
  {
    // dd($request->all());
    $data = $request->all();
    if ($request->hasFile('image')) {
      $newImage = $request->file('image');
      $imageName = time() . '_' . $newImage->getClientOriginalName();

      $newImage->storeAs('public/blogs', $imageName);
    }

    $league = Blog::create([
      'title' => $data['title'],
      'description' => $data['description'],
      'image' => $imageName,
    ]);
    return redirect()->route('list-blog');
  }
  public function list()
  {
    $allleagues = Blog::all();
    // dd($allleagues);

    return view('content.tables.blog-index', compact('allleagues'));
  }
 
  public function delete($id)
  {
    $findleagues = Blog::find($id);
    $findleagues->delete();
    return back();
  }
  public function update(Request $request, $id)
  {

    $data = $request->all();
    $validatedData = $request->validate([
      'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
      $newImage = $request->file('image');
      $imageName = time() . '_' . $newImage->getClientOriginalName();

      // Store the new image in the public/storage directory
      $newImage->storeAs('public/blogs', $imageName);
    }
    // dd('here');

    $league = Blog::find($id);
    // dd($league);

    $league->update([
      'title' => $data['title'],
      'description' => $data['description'],
      'status' => $data['status'],
      'image' => isset($imageName) ? $imageName : $league->image,
    ]);

    return redirect()->route('list-blog');
  }
  public function edit($id)
  {

    $findleagues = BLog::find($id);

    return view('content.form-elements.edit_blog', compact('findleagues'));
  }
}
