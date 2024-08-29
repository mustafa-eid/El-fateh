<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PreviousworkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'image'=>$this->image,
            'en_engineer'=>$this->en_engineer,
            'en_title'=>$this->en_title,
            'starts_at'=>$this->starts_at,
            'ended_at'=>$this->ended_at,
            'en_description'=>$this->en_description,
            'ar_description'=>$this->ar_description,
            'ar_engineer'=>$this->ar_engineer,
            'ar_title'=>$this->ar_title,
            'category_id'=>$this->category_id
        ];
    }
}
