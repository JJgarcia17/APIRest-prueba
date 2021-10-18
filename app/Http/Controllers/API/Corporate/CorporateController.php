<?php

namespace App\Http\Controllers\API\Corporate;

use App\Models\Corporate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Corporate\UpdateResquest;
use App\Http\Requests\Corporate\RegisterResquest;
use App\Http\Resources\Corporate\CorporateResource;
use App\Http\Resources\Corporate\CorporateDetailResource;

class CorporateController extends Controller
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
        $corporate = Corporate::Paginate(5);
            
        if($corporate->count() < 1)
        {
            return response([
                'status' => 404,
                'message' => 'No data was found'
            ],404);
        }
            return response([
                'status' => 200,
                'message'=> 'Retrieved Successfully',
                'total' => $corporate->total(),
                'reg' => $corporate->count(),
                'next' => $corporate->nextPageUrl(),
                'prev' => $corporate->previousPageUrl(),
                'data' => CorporateResource::Collection($corporate),
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterResquest $request)
    {
        $request->validated();

        $corporate = Corporate::create($request->all());
            return response([
                'status' => 200,
                'message' => 'Registration successfully updated',
                'data' => new CorporateResource($corporate),
            ],200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Corporate $corporate)
    {
        return response([
            'status' => 200,
            'message'=> 'Retrieved Successfully',
            'data' => new CorporateResource($corporate)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResquest $request,Corporate $corporate)
    {
        $request->validated();

        if($corporate->update($request->all()))
        {
            return response([
                'status' => 200,
                'message' => 'Registration successfully updated',
                'data' => new CorporateResource($corporate),
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporate $corporate)
    {
        if($corporate->delete())
        {
            return response([
                'status' => 200,
                'message' => 'record deleted successfully',
            ],200);
        }
    }

    public function corporateDetail(Corporate $corporate)
    {
        return response([
            'status' => 200,
            'message'=> 'Retrieved Successfully',
            'data' => new CorporateDetailResource($corporate)
        ],200);
    }
}
