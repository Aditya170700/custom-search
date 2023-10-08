<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        $data = [];

        try {
            $response = Http::get('https://www.googleapis.com/customsearch/v1?key=' . config('app.google.search.key') . '&cx=' . config('app.google.search.id') . '&q=' . $request->q);
            $data = $response->json();
        } catch (\Throwable $th) {
            dd($th);
        }

        return view('search', $data);
    }
}
