<?php

namespace App\Http\Controllers;

use App\Models\TimetableEntry;
use Illuminate\Http\Request;

class TimetableEntryController extends Controller
{
    public function index()
    {
        $entries = TimetableEntry::orderBy('day')
            ->orderBy('period')
            ->get();

        return view('entries.index', [
            'entries' => $entries,
        ]);
    }

    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => ['required', 'integer', 'between:1,5'],
            'period' => ['required', 'integer', 'between:1,6'],
            'title' => ['required', 'string', 'max:255'],
            'room' => ['nullable', 'string', 'max:255'],
        ], [
            'day.required' => '曜日を選択してください。',
            'day.integer' => '曜日を正しく選択してください。',
            'day.between' => '曜日は月曜日から金曜日の間で選択してください。',
            'period.required' => '時限を選択してください。',
            'period.integer' => '時限を正しく選択してください。',
            'period.between' => '時限は1限から6限の間で選択してください。',
            'title.required' => '授業名を入力してください。',
            'title.string' => '授業名は文字列で入力してください。',
            'title.max' => '授業名は255文字以内で入力してください。',
            'room.string' => '教室名は文字列で入力してください。',
            'room.max' => '教室名は255文字以内で入力してください。',
        ]);

        TimetableEntry::create($validated);

        return redirect()->route('entries.index');
    }
}