<?php

namespace Faithgen\Miscellaneous\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use InnoFlash\LaraStart\Helper;

class FAQ extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'       => $this->id,
            'question' => $this->question,
            'answer'   => $this->answer,
            'date'     => Helper::getDates($this->created_at),
        ];
    }
}
