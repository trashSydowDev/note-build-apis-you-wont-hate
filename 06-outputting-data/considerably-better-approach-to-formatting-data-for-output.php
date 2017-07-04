<?php

class PlaceController extends ApiController
{
    public function index()
    {
        return response()->json([
            'data' => Place::all()->map($this->transformPlaceToJson($place))->toArray();
        ]);
    }

    public function show(Place $place)
    {
        return response()->json([
            'data' => $this->transformPlaceToJson($place);
        ]);
    }

    private function transformPlaceToJson(Place $place)
    {
        return [
            "id" => (int) $place->id,
            "name" => $place->name,
            "lat" => (float) $place->lat,
            "lon" => (float) $place->lon,
        ]
    }
}
