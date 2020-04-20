<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotesRequest;
use App\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = (object)[
            'error' => null,
            'notes' => []
        ];
         $data->notes = Notes::orderBy('id', 'DESC')->get();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NotesRequest $request)
    {
        $data = (object)[
            'error' => null,
            'note' => (object) []
        ];
        try{

            $data->note = Notes::create($request->all());
            return response()->json($data);
        }
        catch (\Exception $e){
            $data->error = "une Erreur est survenu ! Do u know Da WAY ?";
            return response()->json($data, 404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notes  $Notes
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Notes $Notes, $id)
    {
        $data = (object)[
            'error' => null,
            'note' => (object) []
        ];
        try{
            $data->note =Notes::findOrFail($id);
            return response()->json($data, 200);
        }
        catch (\Exception $e){
            $data->error = "Cet identifiant est inconnu";
            return response()->json($data, 404);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notes  $Notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $Notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notes  $Notes
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(NotesRequest $request, Notes $Notes, $id)
    {
        $data = (object)[
            'error' => null,
            'note' => (object) []
        ];
        try{
            Notes::findOrFail($id)->update($request->all());
            $data->note = Notes::where('id',$id)->first();
            return response()->json($data, 200);
        }
        catch (\Exception $e){
            $data->error = "une Erreur est survenu ! Do u know Da WAY ?";
            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notes  $Notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $Notes, $id)
    {
        $data = (object)[
            'error' => null,
            'note' => []
        ];
        try{
            $data->note =Notes::findOrFail($id)->delete();
            return response()->json($data, 200);
        }
        catch (\Exception $e){
            $data->error = "Cet identifiant est inconnu";
            return response()->json($data, 404);
        }
    }
}
