<?php

class PlaceController extends ApiController
{
    public function index()
    {
        return response()->json([
            'data' => Place::all()->toArray()
        ]);
    }

    public function show(Place $place)
    {
        return response()->json([
            'data' => $place->toArray();
        ]);
    }
}
