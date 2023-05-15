<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'query' => 'required',
            'type' => 'required',
            ]);
        $searchTerm = $request->input('query');

        // Используйте вашу модель и вашу логику для поиска здесь
        $results = User::where('name', 'like', '%'.$searchTerm.'%')
            ->get();

        return response()->json($results);
    }
}
