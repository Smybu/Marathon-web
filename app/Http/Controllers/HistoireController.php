<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class HistoireController extends Controller
{
    public function index(Request $request){
        $reset = $request->query('reset', null);
        if (isset($reset)) {
            Cookie::expire('g');
            return redirect()->route('histoire.index');
        }

        $g = $request->input('g', null);
        $category = $request->query('g', 'all');
        $cookieG = $request->cookie('g', null);


        if ($category !== 'all') {
            Cookie::queue('g', $category, 10);
        }

        if (!isset($g)) {
            if (!isset($cookieG)) {
                $histoires = Histoire::all();
                $g = 'All';
                Cookie::expire('g');
            } else {
                $histoires = Histoire::whereHas('genre', function($q) use ($cookieG){
                    $q->where('label', $cookieG);
                })->get();
                $g = $cookieG;
                Cookie::queue('g', $g, 10);
            }
        } else {
            if ($g == 'All') {
                $histoires = Histoire::all();
                Cookie::expire('g');
            } else {
                $histoires =Histoire::whereHas('genre', function($q) use ($g){
                    $q->where('label', $g);
                })->get();;
                Cookie::queue('g', $g, 10);
            }
        }
        $genres = Genre::distinct('label')->pluck('label');

        return view('histoire.index', [
            'histoires' => $histoires,
            'g' => $g,
            'genres' => $genres,
            'category' => $category,
        ]);

    }

    public function show(int $id) : View
    {
        $histoire = Histoire::find($id);
        return view('histoire.show', ["histoire" => $histoire]);
    }
}
