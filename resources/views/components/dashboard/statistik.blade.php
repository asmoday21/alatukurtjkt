<ul class="text-sm text-gray-700 space-y-1">
    <li>Materi: {{ \App\Models\Materi::where('user_id', auth()->id())->count() }}</li>
    <li>Kuis: {{ \App\Models\Kuis::where('user_id', auth()->id())->count() }}</li>
    <li>Tugas: {{ \App\Models\Tugas::where('user_id', auth()->id())->count() }}</li>
</ul>
