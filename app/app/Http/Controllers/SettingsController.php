<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Update settings data
    public function update(Request $request) {
        $formFields = $request->validate([
            'forum_name' => 'required',
            'forum_tagline' => '',
            'forum_description' => '',
            'forum_keywords' => '',
            'forum_url' => 'required|url',
            'posts_per_page' => 'required|numeric'
        ]);

        $settings = Settings::first();
        $settings->update($formFields);

        return back()->with('info', 'Settings has been updated successfully');
    }
}
