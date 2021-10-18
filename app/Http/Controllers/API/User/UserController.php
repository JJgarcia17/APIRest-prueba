<?php

namespace App\Http\Controllers\API\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\UserResource;
use Error;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
      
        $user = User::Paginate(5);
            
        if($user->count() < 1)
        {
            return response([
                'status' => 404,
                'message' => 'No data was found'
            ],404);
        }
            return response([
                'status' => 200,
                'message'=> 'Retrieved Successfully',
                'total' => $user->total(),
                'reg' => $user->count(),
                'next' => $user->nextPageUrl(),
                'prev' => $user->previousPageUrl(),
                'data' => UserResource::Collection($user),
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
            return response([
                'status' => 200,
                'message'=> 'Retrieved Successfully',
                'data' => new UserResource($user)
            ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,User $user)
    {
       
            $request->validated();

            if($user->update($request->all()))
            {
                return response([
                    'status' => 200,
                    'message' => 'Registration successfully updated',
                    'data' => new UserResource($user),
                ],200);
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
            if($user->delete())
            {
                return response([
                    'status' => 200,
                    'message' => 'record deleted successfully',
                ],200);
            }
    }
}
