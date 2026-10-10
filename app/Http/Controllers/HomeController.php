<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $projects = config('projects');

        return view('home', [
            'featuredProject' => collect($projects)->firstWhere('featured', true),
            'projects' => array_values(array_filter($projects, fn (array $project) => empty($project['featured']))),
            'projectDetails' => collect($projects)
                ->filter(fn (array $project) => isset($project['detail']))
                ->mapWithKeys(fn (array $project) => [
                    $project['title'] => array_merge($project['detail'], [
                        'github' => $project['github'] ?? null,
                    ]),
                ])
                ->all(),
        ]);
    }
}
