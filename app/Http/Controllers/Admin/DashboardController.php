<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard overview.
     */
    public function index(): View
    {
        $stats = [
            'works_count' => count(config('glowtide.works', [])),
            'teachers_count' => count(config('glowtide.people', [])),
            'shots_count' => count(config('glowtide.shots', [])),
            'voices_count' => count(config('glowtide.voices', [])),
            'passes_count' => count(config('glowtide.passes', [])),
            'faqs_count' => count(config('glowtide.faqs', [])),
            'db_overrides_count' => Content::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
