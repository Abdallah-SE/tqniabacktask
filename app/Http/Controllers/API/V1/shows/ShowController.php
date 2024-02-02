<?php


namespace App\Http\Controllers\API\V1\shows;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\API\V1\shows\Show;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\Validator;

class ShowController extends Controller
{
    use ResponseAPI;
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
    public function store(Request $request)
    {     
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'artist_id' => 'required|exists:artists,id',
            'venue_id' => 'required|exists:venues,id',
        ]);
        if ($validator->fails()) {
            return $this->failure('Validation failed', $validator->errors()->all());
        }

        $show = new Show([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'artist_id' => $request->artist_id,
            'venue_id' => $request->venue_id,
        ]);
        $show->save();

        return $this->success('Saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
