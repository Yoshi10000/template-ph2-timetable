<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>授業を登録 | POSSE大学</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
    <header class="bg-[#1f3a5f] text-white">
        <div class="mx-auto max-w-5xl px-4 py-4">
            <p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
            <h1 class="mt-1 text-xl font-bold">わたしの時間割</h1>
        </div>
    </header>

    <main class="mx-auto max-w-2xl px-4 py-8">
        <a href="{{ route('entries.index') }}" class="text-sm font-medium text-blue-700 hover:underline">← 登録した授業に戻る</a>
        <section class="mt-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <p class="text-sm font-medium text-blue-700">NEW CLASS</p>
            <h2 class="mt-1 text-2xl font-bold">授業を登録する</h2>
            <p class="mt-2 text-sm text-slate-600">履修している授業の情報を入力してください。</p>

            @if ($errors->any())
                <div class="mt-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
                    <p class="font-bold">入力内容を確認してください。</p>
                    <ul class="mt-2 list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('entries.store') }}" method="POST" class="mt-6 space-y-5">
                @csrf
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="day" class="mb-2 block text-sm font-semibold">曜日 <span class="text-red-600">必須</span></label>
                        <select id="day" name="day" required class="w-full rounded-lg border border-slate-300 bg-white px-3 py-3 focus:border-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-100">
                            <option value="">曜日を選択</option>
                            @foreach (['月', '火', '水', '木', '金'] as $index => $weekday)
                                <option value="{{ $index + 1 }}" @selected(old('day') == $index + 1)>{{ $weekday }}曜日</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="period" class="mb-2 block text-sm font-semibold">時限 <span class="text-red-600">必須</span></label>
                        <select id="period" name="period" required class="w-full rounded-lg border border-slate-300 bg-white px-3 py-3 focus:border-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-100">
                            <option value="">時限を選択</option>
                            @foreach (range(1, 6) as $period)
                                <option value="{{ $period }}" @selected(old('period') == $period)>{{ $period }}限</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label for="title" class="mb-2 block text-sm font-semibold">授業名 <span class="text-red-600">必須</span></label>
                    <input id="title" name="title" type="text" value="{{ old('title') }}" required maxlength="255" class="w-full rounded-lg border border-slate-300 px-3 py-3 focus:border-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-100" placeholder="例：データベース基礎">
                </div>

                <div>
                    <label for="room" class="mb-2 block text-sm font-semibold">教室 <span class="text-slate-400">任意</span></label>
                    <input id="room" name="room" type="text" value="{{ old('room') }}" maxlength="255" class="w-full rounded-lg border border-slate-300 px-3 py-3 focus:border-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-100" placeholder="例：A-101">
                </div>

                <button type="submit" class="w-full rounded-lg bg-blue-700 px-5 py-3 font-bold text-white shadow-sm transition hover:bg-blue-800">
                    授業を登録する
                </button>
            </form>
        </section>
    </main>
</body>
</html>