<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOfferRequest;
use App\Http\Resources\Api\OfferResource;
use App\Models\Api\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function index()
    {
        return OfferResource::collection(Offer::all());
    }


    public function store(StoreOfferRequest $request)
    {
        try {
            $offer = Offer::create($request->all());
            return response()->json([(new OfferResource(Offer::find($offer->id)))], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to save offer'], 500);
        }
    }


    public function show($id)
    {
        try {
            return new OfferResource(Offer::findOrFail($id));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Offer not found'], 404);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $offer = Offer::find($id);

            if ($offer){
                $offer->update($request->all());
                return response()->json([(new OfferResource(Offer::find($offer->id)))], 201);
            }

            throw new \Exception('Offer not found');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to updated offer'], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $offer = Offer::find($id);

            if ($offer){
                $offer->delete($id);
                return response()->json('', 204);
            }

            return response()->json(['message' => 'Offer not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to deleted offer'], 500);
        }
    }
}
