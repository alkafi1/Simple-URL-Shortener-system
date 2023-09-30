<?php

namespace App\Http\Controllers;

use App\Models\Shortner;
use Illuminate\Http\Request;
use Str;
use Illuminate\Support\Facades\Auth;
use AshAllenDesign\ShortURL\Facades\ShortURL;

class ShortnerController extends Controller
{
    //
    function big_link(Request $request)
    {
        $request->validate([
            'original_link' =>  'required|url',
        ],[
            'original_link' => 'Please Insert A Link !',
        ]);
        $data = $request->all();
        if (!empty(Auth::user()->id)) {
            $data['user_id'] = Auth::user()->id;
            $data['original_link'] = $request->original_link;
            $data['short_link'] = base_convert($data['original_link'],10,36);
            Shortner::create($data);
            
            $link = array(
                'original_link' => $data['original_link'],
                'short_link' => url($data['short_link']),
            );
            return back()->with('link',$link);
        } else {
            $data['original_link'] = $request->original_link;
            $data['short_link'] = "https://sipleshortner.com/" . Str::random(5);
            $link = array(
                'original_link' => $data['original_link'],
                'short_link' => $data['short_link'],
            );
            return back()->with('link',$link);
        }
    }
}
