<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        /* return[
            'id' => $this->id,
            'name' => $this->name, 
            'price' => $this->price, 
            'category_id' => $this->category_id,
            'description' => $this->description,
            'rating' => $this->rating,
            'images' => $this->images,
            'bestSeller' => $this->bestSeller, 
        ]; */
    }
}
