<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BeerController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->route('id');

        $brewery = Brewery::where('id', $id)->firstOrFail();

        $beers = $brewery->beers()->paginate(4);

        return Inertia::render('Beers', ['brewery' => $brewery, 'beers' => $beers]);
    }
}
