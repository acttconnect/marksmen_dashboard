<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Gallery List
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Gallery::with('category');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('media_type')) {
            $query->where('media_type', $request->media_type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $galleries = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view(
            'admin.galleries.index',
            compact('galleries', 'categories')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categories = Category::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view(
            'admin.galleries.create',
            compact('categories')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */
public function store(GalleryRequest $request)
{
    $data = $request->validated();

    if ($request->hasFile('media_file')) {

        if ($request->media_type === 'image') {
            $data['media_path'] = $request
                ->file('media_file')
                ->store('gallery/images', 'gallery');
        } else {
            $data['media_path'] = $request
                ->file('media_file')
                ->store('gallery/videos', 'gallery');
        }
    }

    if ($request->hasFile('thumbnail')) {
        $data['thumbnail_path'] = $request
            ->file('thumbnail')
            ->store('gallery/thumbnails', 'gallery');
    }

    Gallery::create($data);

    return redirect()
        ->route('admin.galleries.index')
        ->with('success', 'Gallery item created successfully.');
}



    public function show(Gallery $gallery)
    {
        $gallery->load('category');

        return view(
            'admin.galleries.show',
            compact('gallery')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit(Gallery $gallery)
    {
        $categories = Category::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view(
            'admin.galleries.edit',
            compact('gallery', 'categories')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(
        GalleryRequest $request,
        Gallery $gallery
    ) {
        $data = $request->validated();

        /*
        |--------------------------------------------------------------------------
        | Replace Media
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('media_file')) {

            if (
                $gallery->media_path &&
                Storage::disk('public')->exists($gallery->media_path)
            ) {
                Storage::disk('public')->delete($gallery->media_path);
            }

            if ($request->media_type === 'image') {

                $data['media_path'] = $request
                    ->file('media_file')
                    ->store('gallery/images', 'public');

            } else {

                $data['media_path'] = $request
                    ->file('media_file')
                    ->store('gallery/videos', 'public');
            }

        } else {

            $data['media_path'] = $gallery->media_path;
        }

        /*
        |--------------------------------------------------------------------------
        | Replace Thumbnail
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnail')) {

            if (
                $gallery->thumbnail_path &&
                Storage::disk('public')->exists($gallery->thumbnail_path)
            ) {
                Storage::disk('public')->delete($gallery->thumbnail_path);
            }

            $data['thumbnail_path'] = $request
                ->file('thumbnail')
                ->store('gallery/thumbnails', 'public');

        } else {

            $data['thumbnail_path'] = $gallery->thumbnail_path;
        }

        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $gallery->update($data);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function destroy(Gallery $gallery)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Media
        |--------------------------------------------------------------------------
        */

        if (
            $gallery->media_path &&
            Storage::disk('public')->exists($gallery->media_path)
        ) {
            Storage::disk('public')->delete($gallery->media_path);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Thumbnail
        |--------------------------------------------------------------------------
        */

        if (
            $gallery->thumbnail_path &&
            Storage::disk('public')->exists($gallery->thumbnail_path)
        ) {
            Storage::disk('public')->delete($gallery->thumbnail_path);
        }

        $gallery->delete();

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery item deleted successfully.');
    }
}