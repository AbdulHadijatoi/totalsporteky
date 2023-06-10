<?php

namespace App\Http\Controllers\home;

use App\Models\Blog;
use App\Models\Team;
use App\Models\League;
use App\Models\Matches;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  protected $allleagues;

  public function __construct()
  {
      $this->allleagues = League::with([
          'match' => function ($query) {
              $query
                  ->join('teams AS home', 'matches.home_team', '=', 'home.id')
                  ->join('teams AS away', 'matches.away_team', '=', 'away.id')
                  ->select('matches.*', 'home.name AS home_team_name', 'away.name AS away_team_name');
          },
      ])->where('status',1)->get();
  }
  public function index()
  {
    $allleagues = $this->allleagues;
    $setvar = '3sg5et';

      // dd($allleagues);

    return view('home', compact('allleagues', 'setvar'));
  }
  public function list($id = null)
  {
    $allleagues = $this->allleagues;
    $setvar = '3sg5et';
    if ($id == null) {

      // dd($allleagues);

      return view('home', compact('allleagues', 'setvar'));
    } else {
      $allleague = League::with([
        'match' => function ($query) {
          $query
            ->join('teams AS home', 'matches.home_team', '=', 'home.id')
            ->join('teams AS away', 'matches.away_team', '=', 'away.id')
            ->select('matches.*', 'home.name AS home_team_name', 'away.name AS away_team_name');
        },
      ])->find($id);
      // dd($allleague);

      return view('home', compact('allleagues', 'allleague'));
    }
  }
  public function detailblog($id)
  {
    // dd($id);
    $allleagues = $this->allleagues;
    $blog = Blog::find($id);
    return view('blog_detail', compact('allleagues', 'blog'));

    
  }
  public function bloglist()
  {
    $allleagues = $this->allleagues;
    $setvar = '3sg5et';
    $getblogs = Blog::where('status',1)->get();
    // dd($getblogs);
    return view('blog', compact('getblogs','allleagues','setvar'));


  }
  public function detail($match_id)
  {
   $allleagues = $this->allleagues;

   //  $detail_match = Matches::with('league')->find($match_id);
   $detail_match = Matches::with('league')->join('teams AS away', 'matches.away_team', '=', 'away.id')
   ->join('teams AS home', 'matches.home_team', '=', 'home.id')
   ->select('matches.*', 'away.name AS away_name', 'away.image AS away_image', 'home.name AS home_name', 'home.image AS home_image')
   ->find($match_id);
    // dd($match_id);
    return view('detail', compact('allleagues', 'detail_match'));


  }
}
