<?php

namespace App\Http\Controllers\form_elements;

use App\Models\League;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasicInput extends Controller
{
  public function index()
  {
    return view('content.form-elements.forms-basic-inputs');
  }
  public function save(Request $request)
  {
    $data = $request->all();
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '_' . $image->getClientOriginalName();

      // Store the image in the public/storage directory
      $image->storeAs('public', $imageName);


  }
    $league = League::create([
        'name' => $data['name'],
        'location' => $data['location'],
        'date_of_match' => $data['date_of_match'],
        'start_time' => $data['start_time'],
        'image'=> $imageName,
    ]);
    return redirect()->route('list-leagues');
  }
    public function update(Request $request)
    {
        $data = $request->all();
        $league = League::find($request->id);
        $validatedData = $request->validate([
          'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
      ]);
  
      if ($request->hasFile('image')) {
          $newImage = $request->file('image');
          $imageName = time() . '_' . $newImage->getClientOriginalName();
  
          // Store the new image in the public/storage directory
          $newImage->storeAs('public', $imageName);
  
  
      }
      // dd($imageName);

        $league->update([
            'name' => $data['name'],
            'location' => $data['location'],
            'date_of_match' => $data['date_of_match'],
            'start_time' => $data['start_time'],
            'image' => isset($imageName) ? $imageName : $league->image,
        ]);
    
        return redirect()->route('list-leagues');

    }
    

  
  public function edit($id)
  {
    $findleagues = League::find($id);

    return view('content.form-elements.edit-forms-basic-inputs',compact('findleagues'));

  }
  public function delete($id)
  {
    $findleagues = League::find($id);
    $findleagues->delete();
    return back();


  }
}
