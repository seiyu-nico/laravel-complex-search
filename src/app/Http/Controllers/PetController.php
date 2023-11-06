<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pet\IndexRequest;
use App\Models\Pet;

class PetController extends Controller
{
    public function index(IndexRequest $request)
    {
        $params = $request->validated();
        $query = Pet::search($params);
        $pets = $query->get();
        dump($params);
        dump($pets->toArray());
        dump($query->toRawSql());

        return view('pet.index', [
            'pets' => $pets,
        ]);
    }
}
