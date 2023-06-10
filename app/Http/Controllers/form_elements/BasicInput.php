<?php

namespace App\Http\Controllers\form_elements;

use App\Models\League;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasicInput extends Controller
{
  public function index(){
    if(auth()->user()->role != 'super-admin'){
      $allleagues = League::with('creator')->where("created_by",auth()->id())->get();
    }else{
      $allleagues = League::with('creator')->get();
    }

    return view('content.tables.tables-basic',compact('allleagues'));
  }
    
  public function create(){
      return view("content.form-elements.forms-basic-inputs");
  }

    public function store(Request $request){
        $data = $request->all();
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $imageName = time() . "_" . $image->getClientOriginalName();

            // Store the image in the public/storage directory
            $image->storeAs("public", $imageName);
        }
        $league = League::create([
            "name" => $data["name"],
            "location" => $data["location"],
            "date_of_match" => $data["date_of_match"],
            "start_time" => $data["start_time"],
            "image" => $imageName,
            "created_by" => auth()->id(),
        ]);
        return redirect()->route("list-leagues");
    }

    public function edit($id){
      if (auth()->user()->role != "super-admin") {
          $accessConditions = [
              ["id", "=", $id],
              ["created_by", "=", auth()->id()],
          ];
      } else {
          $accessConditions = [["id", "=", $id]];
      }

      $findleagues = League::where($accessConditions)->first();

      if (!$findleagues) {
          return abort(402, "You don't have access to this resource");
      }
      return view(
          "content.form-elements.edit-forms-basic-inputs",
          compact("findleagues")
      );
    }

    public function update(Request $request){
        $data = $request->all();
        // $league = League::find($request->id);
        if (auth()->user()->role != "super-admin") {
            $accessConditions = [
                ["id", "=", $request->id],
                ["created_by", "=", auth()->id()],
            ];
        } else {
            $accessConditions = [["id", "=", $request->id]];
        }
        $league = League::where($accessConditions)->first();
        if (!$league) {
            return abort(402, "You don't have access to this resource");
        }
        $validatedData = $request->validate([
            "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($request->hasFile("image")) {
            $newImage = $request->file("image");
            $imageName = time() . "_" . $newImage->getClientOriginalName();

            // Store the new image in the public/storage directory
            $newImage->storeAs("public", $imageName);
        }
        // dd($imageName);

        $league->update([
            "name" => $data["name"],
            "location" => $data["location"],
            "date_of_match" => $data["date_of_match"],
            "start_time" => $data["start_time"],
            "image" => isset($imageName) ? $imageName : $league->image,
            "status" => $data['status'],
            "created_by" => auth()->id(),
        ]);

        return redirect()->route("list-leagues");
    }

    
    
    public function delete($id){
        if (auth()->user()->role != "super-admin") {
            $accessConditions = [
                ["id", "=", $id],
                ["created_by", "=", auth()->id()],
            ];
        } else {
            $accessConditions = [["id", "=", $id]];
        }

        $findleagues = League::where($accessConditions)->first();
        if (!$findleagues) {
            return abort(402, "You don't have access to this resource");
        }
        
        $findleagues->delete();
        return back();
    }
}
