<?php


namespace App\Http\Controllers\API\V1\artists;

use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\API\V1\artists\Artist;
use App\Services\ImageHandlerService;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\V1\artists\ArtistResource;

class ArtistController extends Controller
{
    use ResponseAPI;
    protected $imageHandler;
    public function __construct(ImageHandlerService $_imageHandler)
    {
        $this->imageHandler = $_imageHandler;
    }
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
            'bio' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->failure('Validation failed', $validator->errors()->all());
        }

        $artist = new Artist([
            'name' => $request->name,
            'bio' => $request->bio,
        ]);
        $artist->save();

        if ($request->has('image')) {
            $path = $this->imageHandler->upload($request->file('image'), 'artists/' . $artist->id);
            $artist->image_url = $path;
            $artist->save();
        }

        return $this->success('Saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artist = Artist::find($id);
        if ($artist != null) {
            return $this->success(
                'About artist',
                new ArtistResource($this->imageHandler, $artist)
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
