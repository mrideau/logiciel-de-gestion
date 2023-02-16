<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Dotlogics\Grapesjs\App\Traits\EditorTrait;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use EditorTrait;

    public function index() {
        $pages = Page::all(['slug', 'name', 'route']);
        return view('pages.index', compact('pages'));
    }

    public function create() {
        return $this->edit();
    }

    public function store(Request $request) {
        return $this->update($request, new Page());
    }

    public function edit(Page $page = null) {
        return view('pages.create-edit', compact('page'));
    }

    public function update(Request $request, Page $page) {
        $page->fill($request->all());
        $page->save();

        return redirect()->route('pages.index');
    }

    public function editor(Request $request, Page $page)
    {
        return $this->show_gjs_editor($request, $page);
    }

    public function render(Request $request, $route = '') {
        $route = '/' . $route;

        $page = Page::where('route', $route)->get()->first();

        if($page == null) {
            return abort(404);
        }

        return view('page', compact('page'));
    }

    public function destroy(Page $page) {
        $page->delete();
    }
}
