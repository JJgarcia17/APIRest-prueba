<?php

namespace App\Http\Controllers\API\Corporate;

use Illuminate\Http\Request;
use App\Models\Corporate_contracts;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contracts\RegisterRequest;
use App\Http\Requests\Contracts\UpdateRequest;
use App\Http\Resources\Contracts\ContractResource;

class ContractsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract = Corporate_contracts::Paginate(5);
            
        if($contract->count() < 1)
        {
            return response([
                'status' => 404,
                'message' => 'No data was found'
            ],404);
        }
            return response([
                'status' => 200,
                'message'=> 'Retrieved Successfully',
                'total' => $contract->total(),
                'reg' => $contract->count(),
                'next' => $contract->nextPageUrl(),
                'prev' => $contract->previousPageUrl(),
                'data' => ContractResource::Collection($contract),
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $request->validated();

        $contract = Corporate_contracts::create($request->all());
            return response([
                'status' => 201,
                'message' => 'Registration successfully created',
                'data' => new ContractResource($contract),
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Corporate_contracts $contract)
    {
        return response([
            'status' => 200,
            'message'=> 'Retrieved Successfully',
            'data' => new ContractResource($contract)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,Corporate_contracts $contract)
    {
        $request->validated();

        if($contract->update($request->all()))
        {
            return response([
                'status' => 200,
                'message' => 'Registration successfully updated',
                'data' => new ContractResource($contract),
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporate_contracts $contract)
    {
        if($contract->delete())
        {
            return response([
                'status' => 200,
                'message' => 'record deleted successfully',
            ],200);
        }
    }
}
