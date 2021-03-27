<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        
        $query = Brewery::has('beers', '>', 0)->withCount('beers');

        if ($search) {
            $query->where('name', 'like', '%'. $search .'%');
        }

        $breweries = $query->paginate(8);

        return Inertia::render('Dashboard', ['breweries' => $breweries]);
    }
}
