<?php

class PlaceController extends ApiController
{
    public function index() {
        $places = Place::all()->map(function ($place) {
            return [
                "id" => (int) $place->id,
                "name" => $place->name,
                "lat" => (float) $place->lat,
                "lon" => (float) $place->lon,
            ];
        })->toArray();

        return responce()->json([
            'data' => $places
        ]);
    }

    public function show(Place $place)
    {
        return responce()->json([
            'data' => [
                "id" => (int) $place->id,
                "name" => $place->name,
                "lat" => (float) $place->lat,
                "lon" => (float) $place->lon,
            ]
        ]);
    }
}
