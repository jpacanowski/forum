<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Show threads by category
    public function index(String $category) {
        $category = Category::whereSlug($category)->first();
        return view('threads.index', [
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'threads_number' => Thread::count(),
            'categories' => Category::all(),
            'top_users' => User::orderByDesc('points')->limit(10)->get(),
            'threads' => $category->threads()->orderByDesc('last_post_date')->get()
        ]);
    }

    // Show form to create category
    public function create() {
        return view('categories.create');
    }

    // Show form to edit category
    public function edit(Category $category) {
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    // Store category
    public function store(Request $request, Category $category) {
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|min:3'
        ]);

        $category = Category::create($formFields);

        return redirect()->route('categories.edit', $category)
            ->with('info', 'Category has been created successfully');
    }

    // Update category data
    public function update(Request $request, Category $category) {
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|min:3'
        ]);

        $category->update($formFields);
        return back()->with('info', 'Category has been updated successfully');
    }

    // Delete category
    public function destroy(Category $category) {
        $category->delete();
        return back()->with('info', 'Category has been deleted successfully');
    }
}
