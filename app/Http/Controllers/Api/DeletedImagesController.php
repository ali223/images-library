<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Image;
use Illuminate\Http\Request;

class DeletedImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ImageResource::collection(Image::onlyTrashed()->get());
    }

    /**
     * Restore the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function restore($imageId)
    {
        $image = Image::onlyTrashed()->findOrFail($imageId);

        $image->restore();

        return response()->json([
            'message' => 'Image restored successfully'
        ]);
    }
}
