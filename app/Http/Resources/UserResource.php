<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Map Domain User model values
        return [
            'data' => [
                'name' => $this->name()->value(),
                'lastname' => $this->lastname()->value(),
                'email' => $this->email()->value(),
                'emailVerifiedDate' => $this->emailVerifiedDate()->value(),
            ]
        ];
    }
}
