<?php

namespace App\Http\Controllers\API\Corporate;

use Illuminate\Http\Request;
use App\Models\Corporate_companies;
use App\Http\Controllers\Controller;
use App\Http\Requests\Companies\RegisterRequest;
use App\Http\Requests\Companies\UpdateRequest;
use App\Http\Resources\Companies\CompanieResource;

class CompaniesController extends Controller
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
        $companie = Corporate_companies::Paginate(5);
            
        if($companie->count() < 1)
        {
            return response([
                'status' => 404,
                'message' => 'No data was found'
            ],404);
        }
            return response([
                'status' => 200,
                'message'=> 'Retrieved Successfully',
                'total' => $companie->total(),
                'reg' => $companie->count(),
                'next' => $companie->nextPageUrl(),
                'prev' => $companie->previousPageUrl(),
                'data' => CompanieResource::Collection($companie),
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

        $companie = Corporate_companies::create($request->all());
            return response([
                'status' => 201,
                'message' => 'Registration successfully created',
                'data' => new CompanieResource($companie),
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Corporate_companies $companie)
    {
        return response([
            'status' => 200,
            'message'=> 'Retrieved Successfully',
            'data' => new CompanieResource($companie)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,Corporate_companies $companie )
    {
        $request->validated();

        if($companie->update($request->all()))
        {
            return response([
                'status' => 200,
                'message' => 'Registration successfully updated',
                'data' => new CompanieResource($companie),
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporate_companies $companie )
    {
        if($companie->delete())
        {
            return response([
                'status' => 200,
                'message' => 'record deleted successfully',
            ],200);
        }
    }
}
