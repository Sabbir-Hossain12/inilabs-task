<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->get();
        return response()->json($tasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
//                'is_complete' => 'boolean',
            ]);

            Task::create(
                [
                    'name' => $request->input('name'),
                ]
            );

            return response()->json('successful', 201);
        }
        catch (\Exception $exception)
        {
            return response()->json('failed', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Task::where('id', $id)->update(
                [
                    'is_complete' => $request->input('is_complete'),
                ]
            );
        return response()->json('successful', 200);
        }
        catch (\Exception $exception)
        {
            return response()->json('failed', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

        Task::where('id', $id)->delete();

        return response()->json('successful', 204);
        }
        catch (\Exception $exception)
        {
            return response()->json('failed', 500);
        }


    }
}
