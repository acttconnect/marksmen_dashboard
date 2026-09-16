<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%");

            });
        }

        // Status filter
        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );
        }

        $blogs = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.blogs.index',
            compact('blogs')
        );
    }


    public function create()
    {
        return view('admin.blogs.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:blogs,slug',
            ],

            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'short_description' => [
                'nullable',
                'string',
            ],

            'full_description' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],
        ]);


        // Generate slug
        $slug = $validated['slug']
            ?: Str::slug($validated['title']);

        $originalSlug = $slug;
        $counter = 1;

        while (Blog::where('slug', $slug)->exists()) {

            $slug = $originalSlug . '-' . $counter;

            $counter++;
        }

        $validated['slug'] = $slug;


        // Featured image
        if ($request->hasFile('featured_image')) {

            $validated['featured_image'] =
                $request
                    ->file('featured_image')
                    ->store('blogs', 'public');
        }


        Blog::create($validated);

        return redirect()
            ->route('admin.blogs.index')
            ->with(
                'success',
                'Blog created successfully.'
            );
    }


    public function show(Blog $blog)
    {
        return view(
            'admin.blogs.show',
            compact('blog')
        );
    }


    public function edit(Blog $blog)
    {
        return view(
            'admin.blogs.edit',
            compact('blog')
        );
    }


    public function update(
        Request $request,
        Blog $blog
    ) {

        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:blogs,slug,' . $blog->id,
            ],

            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'short_description' => [
                'nullable',
                'string',
            ],

            'full_description' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                'in:published,draft',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],
        ]);


        // Generate slug
        $validated['slug'] =
            $validated['slug']
            ?: Str::slug($validated['title']);


        // New image
        if ($request->hasFile('featured_image')) {

            if (
                $blog->featured_image &&
                Storage::disk('public')
                    ->exists($blog->featured_image)
            ) {

                Storage::disk('public')
                    ->delete($blog->featured_image);
            }


            $validated['featured_image'] =
                $request
                    ->file('featured_image')
                    ->store('blogs', 'public');

        } else {

            $validated['featured_image'] =
                $blog->featured_image;
        }


        $blog->update($validated);

        return redirect()
            ->route('admin.blogs.index')
            ->with(
                'success',
                'Blog updated successfully.'
            );
    }


    public function destroy(Blog $blog)
    {
        if (
            $blog->featured_image &&
            Storage::disk('public')
                ->exists($blog->featured_image)
        ) {

            Storage::disk('public')
                ->delete($blog->featured_image);
        }


        $blog->delete();

        return redirect()
            ->route('admin.blogs.index')
            ->with(
                'success',
                'Blog deleted successfully.'
            );
    }
}