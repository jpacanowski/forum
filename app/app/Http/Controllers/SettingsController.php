<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Http\Requests\SettingsRequest;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Update settings data
    public function update(SettingsRequest $request) {

        Settings::updateOrCreate([], $request->validated());

        return back()->with('info', 'Settings has been updated successfully');
    }
}
