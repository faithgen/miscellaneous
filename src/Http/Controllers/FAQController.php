<?php

namespace Faithgen\Miscellaneous\Http\Controllers;

use Faithgen\Miscellaneous\Http\Resources\FAQ as FAQResource;
use Faithgen\Miscellaneous\Models\FAQ;
use Illuminate\Routing\Controller;

class FAQController extends Controller
{
    /**
     * Fetches the FAQs.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $faqs = FAQ::latest()
            ->get();

        FAQResource::wrap('faqs');

        return FAQResource::collection($faqs);
    }
}
