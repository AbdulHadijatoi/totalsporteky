<?php

namespace App\Http\Controllers\team;

use App\Models\Team;
use App\Models\League;
use App\Models\Matches;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        $allleagues = League::all();
      return view('content.form-elements.team',compact('allleagues'));
    }
  public function save(Request $request)
  {
    $data = $request->all();
    if ($request->hasFile('image')) {
      $newImage = $request->file('image');
      $imageName = time() . '_' . $newImage->getClientOriginalName();
  
      $newImage->storeAs('public/team', $imageName);
  }
  
    $league = Team::create([
        'name' => $data['name'],
        'country_name' => $data['country_name'],
        'league_id' => $data['league_id'],
        'image'=> $imageName,

    ]);
    return redirect()->route('list-team');


  }
  public function list()
  {
    $allleagues = Team::with('league')->get();

    return view('content.tables.team-index',compact('allleagues'));
  }
  public function delete($id)
  {
    $findleagues = Team::find($id);
    $findleagues->delete();
    return back();


  }
  public function update(Request $request,$id)
    {
        $data = $request->all();
        $validatedData = $request->validate([
          'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
      ]);
  
      if ($request->hasFile('image')) {
          $newImage = $request->file('image');
          $imageName = time() . '_' . $newImage->getClientOriginalName();
  
          // Store the new image in the public/storage directory
          $newImage->storeAs('public/team', $imageName);
  
  
      }
      // dd('here');
  
        $league = Team::find($id);
        // dd($league);

        $league->update([
          'name' => $data['name'],
          'country_name' => $data['country_name'],
          'league_id' => $data['league_id'],
          'image' => isset($imageName) ? $imageName : $league->image,
        ]);
    
        return redirect()->route('list-team');

    }
  public function edit($id)
  {
    $allleagues = League::all();

    $findleagues = Team::with('league')->find($id);

    return view('content.form-elements.edit_team',compact('findleagues','allleagues'));

  }
}
