<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録した授業 | POSSE大学</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
    <header class="bg-[#1f3a5f] text-white">
        <div class="mx-auto max-w-5xl px-4 py-4">
            <p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
            <h1 class="mt-1 text-xl font-bold">わたしの時間割</h1>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-4 py-8">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <div>
                <p class="text-sm font-medium text-blue-700">MY TIMETABLE</p>
                <h2 class="mt-1 text-2xl font-bold">登録した授業</h2>
                <p class="mt-2 text-sm text-slate-600">曜日・時限の順に表示しています。</p>
            </div>
            <a href="{{ route('entries.create') }}" class="rounded-lg bg-blue-700 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-blue-800">
                授業を登録する
            </a>
        </div>

        <section class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            @if ($entries->isEmpty())
                <p class="px-6 py-12 text-center text-slate-500">まだ授業が登録されていません。</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 text-slate-600">
                            <tr>
                                <th class="whitespace-nowrap px-6 py-4 font-semibold">曜日</th>
                                <th class="whitespace-nowrap px-6 py-4 font-semibold">時限</th>
                                <th class="px-6 py-4 font-semibold">授業名</th>
                                <th class="whitespace-nowrap px-6 py-4 font-semibold">教室</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entries as $entry)
                                <tr class="border-t border-slate-100 hover:bg-slate-50">
                                    <td class="whitespace-nowrap px-6 py-4">{{ ['月', '火', '水', '木', '金'][$entry->day - 1] }}曜日</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $entry->period }}限</td>
                                    <td class="px-6 py-4 font-medium">{{ $entry->title }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-slate-600">{{ $entry->room ?: '未登録' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </main>
</body>
</html>