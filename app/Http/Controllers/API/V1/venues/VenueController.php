<?php


namespace App\Http\Controllers\API\V1\venues;

use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use App\Models\API\V1\venues\Venue;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\V1\venues\VenueResource;

class VenueController extends Controller
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
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'capacity' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return $this->failure('Validation failed', $validator->errors()->all());
        }

        $venue = new Venue([
            'name' => $request->name,
            'location' => $request->location,
            'capacity' => $request->capacity,
        ]);
        $venue->save();

        return $this->success('Saved successfully');
    }

    /**
     * Display the specified resource.
     */ 
    public function show(string $id)
    {
        $venue = Venue::find($id);
        if ($venue != null) {
            return $this->success(
                'About venue',
                new VenueResource($venue)
            );
        } else {
            return $this->failure('Not found', status: 404);
        }
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
