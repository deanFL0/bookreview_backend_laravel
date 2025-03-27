<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'cover_path'=>$this->cover_path, 
            'title'=>$this->title, 
            'author'=>$this->author,
            'genres'=>$this->genres,
            'total_pages'=>$this->total_pages,
            'first_publish'=>$this->first_publish, 
            'synopsis'=>$this->synopsis,
            'total_rating'=>$this->getTotalRating(),
        ];
    }
}
