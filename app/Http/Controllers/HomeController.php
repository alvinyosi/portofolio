<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $projects = collect(config('projects'));
        $projectsByGroup = $projects->groupBy('group');

        return view('home', [
            'featuredProject' => $projectsByGroup->get('tugas_akhir', collect())->first(),
            'internshipProject' => $projectsByGroup->get('magang', collect())->first(),
            'projects' => $projectsByGroup->get('lainnya', collect())->values(),
            'projectDetails' => $projects
                ->filter(fn (array $project) => isset($project['detail']))
                ->mapWithKeys(function (array $project): array {
                    $detail = $project['detail'];

                    if (($project['group'] ?? null) === 'tugas_akhir') {
                        $detail['title'] = config('portfolio.education.0.tugas_akhir');
                    }

                    return [
                        $project['title'] => array_merge($detail, [
                            'github' => $project['github'] ?? null,
                        ]),
                    ];
                })
                ->all(),
        ]);
    }
}
