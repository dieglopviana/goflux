<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreBidRequest;
use App\Http\Resources\Api\BidResource;
use App\Models\Api\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{

    public function index()
    {
        return BidResource::collection(Bid::all());
    }


    public function store(StoreBidRequest $request)
    {
        try {
            $bid = Bid::create($request->all());
            return response()->json([(new BidResource(Bid::find($bid->id)))], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to save bid'], 500);
        }
    }


    public function show($id)
    {
        try {
            return new BidResource(Bid::findOrFail($id));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Bid not found'], 404);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $bid = Bid::find($id);

            if ($bid){
                $bid->update($request->all());
                return response()->json([(new BidResource(Bid::find($bid->id)))], 201);
            }

            throw new \Exception('Bid not found');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to updated bid'], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $bid = Bid::find($id);

            if ($bid){
                $bid->delete($id);
                return response()->json('', 204);
            }

            return response()->json(['message' => 'Bid not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to deleted bid'], 500);
        }
    }
}
