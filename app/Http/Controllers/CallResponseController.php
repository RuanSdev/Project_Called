<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallResponseRequest;
use App\Models\CallResponse;
use Illuminate\Http\Request;

class CallResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(CallResponseRequest $request)
    {
       $validate = $request->validated();
       CallResponse::create($validate);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $called_uuid)
    {
         $responses = CallResponse::all()->where('called_uuid' ,'=', $called_uuid );
        return response()->json([
            "responses" => $responses,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CallResponseRequest $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CallResponse $callResponses)
    {
        //
    }
}
