<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    public function index()
    {
        $mondayCourses = DB::select(<<<'SQL'
            SELECT period, name, teacher, room
            FROM courses
            WHERE day = '1'
            ORDER BY period ASC, code ASC
            SQL);

        $requiredCourses = DB::select(<<<'SQL'
            SELECT name, credits
            FROM courses
            WHERE required = TRUE
            ORDER BY code ASC
            SQL);

        return view('timetable', [
            'mondayCourses' => $mondayCourses,
            'requiredCourses' => $requiredCourses,
        ]);
    }
}
