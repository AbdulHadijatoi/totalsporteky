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
      $leagues = League::where('created_by',auth()->id())->get();
        $teams = Team::where('created_by',auth()->id())->get();
        return view('content.form-elements.team',compact('teams','leagues'));
    }
  public function save(Request $request)
  {
    $data = $request->all();
    if ($request->hasFile('image')) {
      $newImage = $request->file('image');
      $imageName = time() . '_' . $newImage->getClientOriginalName();
  
      $newImage->storeAs('public/team', $imageName);
    }
  
    $team = Team::create([
        'name' => $data['name'],
        'country_name' => $data['country_name'],
        'league_id' => $data['league_id'],
        'created_by' => auth()->id(),
        'image'=> $imageName,

    ]);
    return redirect()->route('list-team');


  }
  public function list()
  {
    $teams = Team::with('league')->where('created_by',auth()->id())->get();

    return view('content.tables.team-index',compact('teams'));
  }

  public function delete($id)
  {
    if (auth()->user()->role != "super-admin") {
        $accessConditions = [
            ["id", "=", $id],
            ["created_by", "=", auth()->id()],
        ];
    } else {
        $accessConditions = [["id", "=", $id]];
    }

    $team = Team::where($accessConditions)->first();
    if (!$team) {
        return abort(402, "You don't have access to this resource");
    }
    
    $team->delete();
    
    // return back();
    return redirect()->route('list-team');


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
  
      if (auth()->user()->role != "super-admin") {
          $accessConditions = [
              ["id", "=", $id],
              ["created_by", "=", auth()->id()],
          ];
      } else {
          $accessConditions = [["id", "=", $id]];
      }

      $team = Team::where($accessConditions)->first();
      if (!$team) {
          return abort(402, "You don't have access to this resource");
      }
        // dd($league);

        $team->update([
          'name' => $data['name'],
          'country_name' => $data['country_name'],
          'league_id' => $data['league_id'],
          'status' => $data['status'],
          'image' => isset($imageName) ? $imageName : $team->image,
        ]);
    
        return redirect()->route('list-team');

    }
  public function edit($id)
  {
    $leagues = League::where('created_by',auth()->id())->get();

    if (auth()->user()->role != "super-admin") {
        $accessConditions = [
            ["id", "=", $id],
            ["created_by", "=", auth()->id()],
        ];
    } else {
        $accessConditions = [["id", "=", $id]];
    }

    $team = Team::with('league')->where($accessConditions)->first();
    if (!$team) {
        return abort(402, "You don't have access to this resource");
    }

    return view('content.form-elements.edit_team',compact('team','leagues'));

  }
}
