<?php

namespace App\Http\Resources\Gambling;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GamblingHistoryCollectionResource extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = GamblingResource::class;
}
