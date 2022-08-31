<?php

namespace App\Http\Controllers\Wiki;

use App\Models\Wiki;
use App\Models\Character;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\Markdown\Parsedown;
use App\Http\Controllers\Controller;

class WikiController extends Controller
{
    public $parsedown;

    public function __construct()
    {
        // $parsedown = new Parsedown();
    }

    public function index()
    {
        return self::show('main-page');
    }

    public function create()
    {
        return view('frontend.wiki.create', [
            'title' => trans('wiki.page.create'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $slug = Str::slug($request->title);

        Wiki::create([
            'character_id' => auth()->user()->character->id(),
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
        ]);
        return redirect()->route('wiki.show', $slug)
            ->withSuccess('wiki.page.created_ok');
    }

    public function manage($id = null)
    {
        $edit = false;
        $title = trans('wiki.create');
        $page = null;

        if ($id) {
            $edit = true;
            $page = Wiki::findOrFail($id);
            $title = trans('wiki.edit', ['title' => $page->title]);
        }
        return view('frontend.wiki.manage', compact('edit', 'title', 'page'));
    }

    public function show($page, $owner = false)
    {
        $parsedown = new Parsedown();
        $wikipage = Wiki::with('character')->where('slug', $page)->firstOrFail();
        dd($page, $wikipage);
        return view('frontend.wiki.show', [
            'title' => $wikipage->title,
            'page' => $wikipage,
            'parsedown' => $parsedown,
        ]);
    }

    public function edit($id)
    {
        $page = Wiki::findOrFail($id);
        return view('frontend.wiki.edit', [
            'title' => __('Edit') . ' ' . $page->title,
            'page' => $page,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $slug = Str::slug($request->title);
        $page = Wiki::findOrFail($id);

        $page->update([
            'character_id' => auth()->user()->character->id(),
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
        ]);
        return redirect()->route('wiki.show', $slug)
            ->withSuccess('wiki.page.updated_ok');
    }

    public function delete($id)
    {
        $page = Wiki::findOrFail($id);
        if ($page->character_id === auth()->user()->character->id) {
            $page->delete();
            return redirect()->back()->withSuccess('wiki.page.deleted_ok');
        }
        return redirect()->back()->withSuccess('wiki.page.deleted_ko');
    }

    public function restore($id)
    {
        $page = Wiki::withTrashed()->findOrFail($id);
        if ($page->character_id === auth()->user()->character->id) {
            $page->restore();
            return redirect()->back()->withSuccess('wiki.page.restored_ok');
        }
        return redirect()->back()->withSuccess('wiki.page.restore_ko');
    }

    public function destroy($id)
    {
        $page = Wiki::withTrashed()->findOrFail($id);
        if ($page->character_id === auth()->user()->character->id) {
            $page->forceDelete();
            return redirect()->back()->withSuccess('wiki.page.destroyed_ok');
        }
        return redirect()->back()->withSuccess('wiki.page.destroyed_ko');
    }

    public function list($action = 'all')
    {
        $pages = Wiki::withTrashed()
            ->with('character')
            ->orderBy('created_at', 'desc');

        switch (strtolower($action)) {
            case 'all':
                $pages = $pages;
                $title = trans('wiki.title.all');
                break;
            case 'my_wikis':
                $pages = $pages->where('author_id', auth()->user()->character->id);
                $title = trans('wiki.title.mywikis');
                break;
        }
        return view('frontend.wiki.list', [
            'title' => $title,
            'pages' => $pages->paginate(48),
        ]);
    }
}
