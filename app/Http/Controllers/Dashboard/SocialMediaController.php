<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SocialMediaController extends Controller
{
  /**
     * Display a listing of the social media entries.
     */
    public function index()
    {
        $socialMedia = SocialMedia::all();
        return view('dashboard.social-media.index', compact('socialMedia'));
    }

    /**
     * Show the form for creating a new social media entry.
     */
    public function create()
    {
        return view('dashboard.social-media.create');
    }

    /**
     * Store a newly created social media entry in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|in:facebook,twitter,instagram,linkedIn,youTube|unique:social_media,platform',
            'url' => 'required|url',
        ]);

        SocialMedia::create($request->all());

        return redirect()->route('social-media.index')->with('success', 'Social Media entry created successfully.');
    }

    /**
     * Show the form for editing the specified social media entry.
     */
    public function edit($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        return view('dashboard.social-media.edit', compact('socialMedia'));
    }

    /**
     * Update the specified social media entry in the database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'platform' => [
                'required',
                'in:facebook,twitter,instagram,linkedIn,youTube',
                Rule::unique('social_media', 'platform')->ignore($id),
            ],
            'url' => 'required|url',
        ]);

        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->update($request->all());

        return redirect()->route('social-media.index')->with('success', 'Social Media entry updated successfully.');
    }

    /**
     * Remove the specified social media entry from the database.
     */
    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->delete();

        return redirect()->route('social-media.index')->with('success', 'Social Media entry deleted successfully.');
    }
}
