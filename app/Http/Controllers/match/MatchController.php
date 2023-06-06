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
        $allleagues = League::all();
        $teams = Team::all();
      return view('content.form-elements.match',compact('allleagues','teams'));
    }
  public function save(Request $request)
  {
    $data = $request->all();
    $league = Matches::create([
        'league_id' => $data['league_id'],
        'home_team' => $data['home_team'],
        'away_team' => $data['away_team'],
        'start_time' => $data['start_time'],
        'date_of_match' => $data['date_of_match'],  
        'stream_url' => json_encode($data['stream_url'])

    ]);
    return back();

  }
  public function list()
  {
    $allleagues = Matches::with('league')->get();
//  dd($allleagues);


    return view('content.tables.match-index',compact('allleagues'));
  }
  public function delete($id)
  {
    $findleagues = Matches::find($id);
    $findleagues->delete();
    return back();


  }
  public function update(Request $request,$id)
    {
        $data = $request->all();
        $league = Matches::find($id);
        $league->update([
            'league_id' => $data['league_id'],
            'home_team' => $data['home_team'],
            'away_team' => $data['away_team'],
            'start_time' => $data['start_time'],
            'date_of_match' => $data['date_of_match'],  
            'stream_url' => json_encode($data['stream_url'])
        ]);
    
        return back();
    }
  public function edit($id)
  {
    $allleagues = League::all();
    $team = Team::all();


    $findleagues = Matches::with('league')->find($id);
    // dd($findleagues['stream_url']);
    $streamUrls = json_decode($findleagues['stream_url']);

    return view('content.form-elements.edit_match',compact('findleagues','allleagues','streamUrls','team'));

  }
}
