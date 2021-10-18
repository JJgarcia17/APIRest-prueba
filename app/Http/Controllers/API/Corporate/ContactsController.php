<?php

namespace App\Http\Controllers\API\Corporate;

use Illuminate\Http\Request;
use App\Models\Corporate_contacts;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\RegisterRequest;
use App\Http\Requests\Contacts\UpdateRequest;
use App\Http\Resources\Contacts\ContactResource;

class ContactsController extends Controller
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
        $contact = Corporate_contacts::Paginate(5);
            
        if($contact->count() < 1)
        {
            return response([
                'status' => 404,
                'message' => 'No data was found'
            ],404);
        }
            return response([
                'status' => 200,
                'message'=> 'Retrieved Successfully',
                'total' => $contact->total(),
                'reg' => $contact->count(),
                'next' => $contact->nextPageUrl(),
                'prev' => $contact->previousPageUrl(),
                'data' => ContactResource::Collection($contact),
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

        $contact = Corporate_contacts::create($request->all());
            return response([
                'status' => 201,
                'message' => 'Registration successfully created',
                'data' => new ContactResource($contact),
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Corporate_contacts $contact)
    {
        return response([
            'status' => 200,
            'message'=> 'Retrieved Successfully',
            'data' => new ContactResource($contact)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Corporate_contacts $contact)
    {
        $request->validated();

        if($contact->update($request->all()))
        {
            return response([
                'status' => 200,
                'message' => 'Registration successfully updated',
                'data' => new ContactResource($contact),
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporate_contacts $contact)
    {
        if($contact->delete())
        {
            return response([
                'status' => 200,
                'message' => 'record deleted successfully',
            ],200);
        }
    }
}
