<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreProviderRequest;
use App\Http\Resources\Api\ProviderResource;
use App\Models\Api\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        return ProviderResource::collection(Provider::all());
    }


    public function store(StoreProviderRequest $request)
    {
        try {
            $provider = Provider::create($request->all());
            return response()->json([$provider], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to save provider'], 500);
        }
    }


    public function show($id)
    {
        try {
            return new ProviderResource(Provider::findOrFail($id));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Provider not found'], 404);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $provider = Provider::find($id);

            if ($provider){
                $provider->update($request->all());
                return response()->json([$provider], 201);
            }

            throw new \Exception('Provider not found');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to updated provider'], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $provider = Provider::find($id);

            if ($provider){
                $provider->delete($id);
                return response()->json('', 204);
            }

            return response()->json(['message' => 'Provider not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to deleted provider'], 500);
        }
    }
}
