<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()

            ->when(
                $request->search,
                function ($query, $search) {

                    $query->where(
                        'name',
                        'like',
                        "%{$search}%"
                    );

                }
            )

            ->when(
                $request->status,
                function ($query, $status) {

                    $query->where(
                        'status',
                        $status
                    );

                }
            )

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view(
            'admin.categories.index',
            compact('categories')
        );
    }


    public function create()
    {
        return view(
            'admin.categories.create'
        );
    }


    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = $data['slug']
            ?? Str::slug($data['name']);

        Category::create($data);

        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category created successfully.'
            );
    }


    public function show(Category $category)
    {
        return view(
            'admin.categories.show',
            compact('category')
        );
    }


    public function edit(Category $category)
    {
        return view(
            'admin.categories.edit',
            compact('category')
        );
    }


    public function update(
        CategoryRequest $request,
        Category $category
    ) {

        $data = $request->validated();

        $data['slug'] = $data['slug']
            ?? Str::slug($data['name']);

        $category->update($data);

        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category updated successfully.'
            );
    }


    public function destroy(Category $category)
    {
        if (
            $category
                ->galleries()
                ->exists()
        ) {

            return back()->with(
                'error',
                'Cannot delete category because gallery records exist.'
            );
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category deleted successfully.'
            );
    }
}