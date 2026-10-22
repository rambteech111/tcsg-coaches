<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CoachController extends Controller
{
    public function home(): View
    {
        $coaches = Coach::active()->orderBy('first_name')->get();

        return view('home', ['coaches' => $coaches]);
    }

    public function index(): View
    {
        $coaches = Coach::active()->orderBy('first_name')->get();

        return view('coaches.index', ['coaches' => $coaches]);
    }

    public function show(string $slug): View
    {
        $coach = Coach::where('slug', $slug)->first();

        if (! $coach || $coach->status !== 'active') {
            throw new NotFoundHttpException;
        }

        return view('coaches.show', ['coach' => $coach]);
    }
}
