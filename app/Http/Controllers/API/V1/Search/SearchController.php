<?php


namespace App\Http\Controllers\API\V1\Search;

use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\search\ArtistResource;
use App\Http\Resources\V1\search\VenueResource;

class SearchController extends Controller
{
    use ResponseAPI;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('query');

        $artistResults = collect();
        $venueResults = collect();

        if (!empty($searchQuery)) {
            $artistResults = DB::table('artists')
                ->where('name', 'like', '%' . $searchQuery . '%')
                ->orWhere('bio', 'like', '%' . $searchQuery . '%')
                ->select('id', 'name', 'bio')
                ->get();

            $venueResults = DB::table('venues')
                ->where('name', 'like', '%' . $searchQuery . '%')
                ->orWhere('location', 'like', '%' . $searchQuery . '%')
                ->select('id', 'name', 'location')
                ->get();
        }


        $results = [
            'artists' => ArtistResource::collection($artistResults),
            'venues' => VenueResource::collection($venueResults),
        ];
        if ($artistResults->isEmpty() && $venueResults->isEmpty()) {
            return $this->failure('Not found');
        }
        return $this->success('Search result', $results);
    }
}
