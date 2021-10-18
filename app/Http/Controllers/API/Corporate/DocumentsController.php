<?php

namespace App\Http\Controllers\API\Corporate;

use App\Models\Documents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Documents\UpdateRequest;
use App\Http\Requests\Documents\RegisterRequest;
use App\Http\Resources\Documents\DocumentsResource;
use App\Http\Resources\Documents\DocumentDetailResource;

class DocumentsController extends Controller
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
        $documents = Documents::Paginate(5);
            
        return $documents->count() < 1 ? 
            response([
                'status' => 404,
                'message' => 'No data was found'
            ],404) : response([
                'status' => 200,
                'message'=> 'Retrieved Successfully',
                'total' => $documents->total(),
                'reg' => $documents->count(),
                'next' => $documents->nextPageUrl(),
                'prev' => $documents->previousPageUrl(),
                'data' => DocumentsResource::Collection($documents),
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

        $documents = Documents::create($request->all());
            return response([
                'status' => 201,
                'message' => 'Registration successfully created',
                'data' => new DocumentsResource($documents),
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Documents $document)
    {
        return response([
            'status' => 200,
            'message'=> 'Retrieved Successfully',
            'data' => new DocumentsResource($document)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Documents $document)
    {
        $request->validated();

        if($document->update($request->all()))
        {
            return response([
                'status' => 200,
                'message' => 'Registration successfully updated',
                'data' => new DocumentsResource($document),
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documents $document)
    {
        if($document->delete())
        {
            return response([
                'status' => 200,
                'message' => 'record deleted successfully',
            ],200);
        }
    }

    public function documentdetail(Documents $document)
    {

        return response([
            'status' => 200,
            'message'=> 'Retrieved Successfully',
            'data' => new DocumentDetailResource($document)
         ],200);
    }
}
