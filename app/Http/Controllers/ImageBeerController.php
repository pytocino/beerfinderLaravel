<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageBeerController extends Controller
{
    public function editImageBeer(Request $request, $id)
    {
        $beer = Beer::findOrFail($id);
        if ($beer->image) {
            $beer->image->delete();
        }
        $path = $request->file('image')->store('images', ['disk' => 'public']);
        $beer->save();
        $beer->update($request->all());
    }
}
