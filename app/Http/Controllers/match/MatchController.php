<?php

namespace App\Http\Controllers\match;

use App\Models\Team;
use App\Models\League;
use App\Models\Matches;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchController extends Controller
{
    public function index()
    {
      if(auth()->user()->role != 'super-admin'){
        $leagues = League::with('creator')->where('created_by',auth()->id())->get();
        $matches = Matches::with('creator')->where('created_by',auth()->id())->get();
        $teams = Team::with('creator')->where('created_by',auth()->id())->get();
      }else{
        $leagues = League::with('creator')->get();
        $matches = Matches::with('creator')->get();
        $teams = Team::with('creator')->get();
      }
        
        return view('content.form-elements.match',compact('matches','teams','leagues'));
    }
  public function save(Request $request)
  {
    $data = $request->all();
    Matches::create([
        'league_id' => $data['league_id'],
        'home_team' => $data['home_team'],
        'away_team' => $data['away_team'],
        'start_time' => $data['start_time'],
        'created_by' => auth()->id(),
        'date_of_match' => $data['date_of_match'],  
        'stream_url' => json_encode($data['stream_url'])

    ]);

    return back();

  }
  public function list()
  {
    if(auth()->user()->role != 'super-admin'){
      $matches = Matches::with('league','creator')->where('created_by',auth()->id())->get();
    }else{
      $matches = Matches::with('league','creator')->get();
    }

    return view('content.tables.match-index',compact('matches'));
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

    $match = Matches::where($accessConditions)->first();

    if (!$match) {
        return abort(402, "You don't have access to this resource");
    }
    

    $match->delete();
    return back();


  }
  public function update(Request $request,$id)
    {
        $data = $request->all();

        if (auth()->user()->role != "super-admin") {
            $accessConditions = [
                ["id", "=", $id],
                ["created_by", "=", auth()->id()],
            ];
        } else {
            $accessConditions = [["id", "=", $id]];
        }

        $match = Matches::where($accessConditions)->first();

        if (!$match) {
            return abort(402, "You don't have access to this resource");
        }


        
        $match->update([
            'league_id' => $data['league_id'],
            'home_team' => $data['home_team'],
            'away_team' => $data['away_team'],
            'start_time' => $data['start_time'],
            'date_of_match' => $data['date_of_match'],  
            'status' => $data['status'],  
            'stream_url' => json_encode($data['stream_url'])
        ]);
    
        // return back();
        return redirect()->route('list-matches');
    }

    public function edit($id)
    {

      if (auth()->user()->role != "super-admin") {
          $accessConditions = [
              ["id", "=", $id],
              ["created_by", "=", auth()->id()],
          ];
      } else {
          $accessConditions = [["id", "=", $id]];
      }

      $match = Matches::with('league')->where($accessConditions)->first();

      if (!$match) {
          return abort(402, "You don't have access to this resource");
      }

      $leagues = League::where('created_by',auth()->id())->get();
      $team = Team::where('created_by',auth()->id())->get();


      // dd($match['stream_url']);
      $streamUrls = json_decode($match['stream_url']);

      return view('content.form-elements.edit_match',compact('match','leagues','streamUrls','team'));

    }
}
