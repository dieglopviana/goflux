<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreCustomerRequest;
use App\Http\Resources\Api\CustomerResource;
use App\Models\Api\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return CustomerResource::collection(Customer::all());
    }


    public function store(StoreCustomerRequest $request)
    {
        try {
            $customer = Customer::create($request->all());
            return response()->json([$customer], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to save customer'], 500);
        }
    }


    public function show($id)
    {
        try {
            return new CustomerResource(Customer::findOrFail($id));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $customer = Customer::find($id);

            if ($customer){
                $customer->update($request->all());
                return response()->json([$customer], 201);
            }

            throw new \Exception('Customer not found');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to updated customer'], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $customer = Customer::find($id);

            if ($customer){
                $customer->delete($id);
                return response()->json('', 204);
            }

            return response()->json(['message' => 'Customer not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to deleted customer'], 500);
        }
    }

}
