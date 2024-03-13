<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalledRequest;
use App\Http\Requests\CalledUpdateRequest;
use App\Models\Called;
use App\Models\Establishment;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class CalledController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Called::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CalledRequest $request)
    {
        $validate = $request->validated();
        $called = Called::create($validate);
        return response()->json([
            'action' => true,
            "data" => $called,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Called $called)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(CalledUpdateRequest $request, Called $called, string $uuid)
    {
        $validate = $request->validated();
        $called = Called::find($uuid);
        if (empty($called)) {
            return response()->json(['error' => 'Not Found'], 404);
        }
        $called->update($validate);

        return response()->json([
            "status" => "assigned",
            'data' => $called,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Called $called)
    {
        //
    }
}
