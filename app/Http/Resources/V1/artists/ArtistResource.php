<?php

namespace App\Http\Resources\V1\artists;

use App\Services\ImageHandlerService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
{
    protected $imageHandlerService;

    public function __construct(ImageHandlerService $imageHandlerService, $resource)
    {
        parent::__construct($resource);
        $this->imageHandlerService = $imageHandlerService;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'bio' => $this->bio,
            'image_url' => $this->imageHandlerService->get($this->image_url),
        ];
    }
}
