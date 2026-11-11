<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>わたしの時間割づくり | POSSE大学</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen">
    <header class="bg-[#1f3a5f] text-white">
        <div class="max-w-5xl mx-auto px-4 py-4">
            <p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
            <h1 class="mt-1 text-xl font-bold">わたしの時間割づくり</h1>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-6">
        <p class="mb-6 text-sm leading-relaxed bg-amber-50 border border-amber-200 text-amber-900 rounded-lg px-4 py-3">
            授業データベースから取得した授業情報です。
        </p>

        <div class="grid gap-6 md:grid-cols-2">
            <section class="min-w-0 bg-white border border-slate-200 rounded-lg">
                <div class="px-5 pt-4 pb-3 border-b border-slate-200">
                    <h2 class="text-base font-bold text-slate-800"><span class="text-slate-500 mr-2">区画1</span>月曜日の授業</h2>
                    <p class="mt-1 text-xs text-slate-500">時限の早い順に並べています。</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-slate-700">
                        <thead class="bg-slate-50 text-slate-600">
                            <tr>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">時限</th>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">授業名</th>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">担当教員</th>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">教室</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($mondayCourses) > 0)
                                @foreach ($mondayCourses as $course)
                                <tr class="border-t border-slate-200">
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $course->period }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $course->name }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $course->teacher ?? '未定' }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $course->room }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr class="border-t border-slate-200">
                                    <td class="px-4 py-3 text-slate-500" colspan="4">授業データがありません。</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="min-w-0 bg-white border border-slate-200 rounded-lg">
                <div class="px-5 pt-4 pb-3 border-b border-slate-200">
                    <h2 class="text-base font-bold text-slate-800"><span class="text-slate-500 mr-2">区画2</span>必修科目</h2>
                    <p class="mt-1 text-xs text-slate-500">科目コードの順に並べています。</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-slate-700">
                        <thead class="bg-slate-50 text-slate-600">
                            <tr>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">授業名</th>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">単位数</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($requiredCourses) > 0)
                                @foreach ($requiredCourses as $course)
                                <tr class="border-t border-slate-200">
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $course->name }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $course->credits }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr class="border-t border-slate-200">
                                    <td class="px-4 py-3 text-slate-500" colspan="2">授業データがありません。</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
