<?php

namespace App\Http\Controllers;

use App\Models\DailyNote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DailyNoteController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'all');
        $q = trim((string) $request->query('q', ''));
        $mine = fn () => DailyNote::where('user_id', auth()->id());

        $counts = [
            'all'       => $mine()->count(),
            'kronologi' => $mine()->where('category', 'kronologi')->count(),
            'curahan'   => $mine()->where('category', 'curahan')->count(),
            'pinned'    => $mine()->where('is_pinned', true)->count(),
        ];

        $notes = $mine()
            ->when(in_array($filter, ['kronologi', 'curahan']), fn ($qb) => $qb->where('category', $filter))
            ->when($filter === 'pinned', fn ($qb) => $qb->where('is_pinned', true))
            ->orderByDesc('is_pinned')
            ->orderByDesc('event_at')
            ->get();

        if ($q !== '') {
            $needle = mb_strtolower($q);
            $notes = $notes->filter(function ($n) use ($needle) {
                $haystack = $n->title.' '.($n->is_locked ? '' : strip_tags($n->content));

                return str_contains(mb_strtolower($haystack), $needle);
            })->values();
        }

        $latest = $mine()->latest('updated_at')->first()?->updated_at;

        return view('daily-notes.index', compact('notes', 'counts', 'filter', 'q', 'latest'));    
    }

    public function store(Request $request)
    {
        DailyNote::create($this->validated($request) + ['user_id' => auth()->id()]);
        return redirect()->route('catatan.index')->with('success', 'Catatan tersimpan ke Brankas Aman.');
    }

    public function edit(DailyNote $dailyNote)
    {
        $this->authorizeOwner($dailyNote);
        return view('daily-notes.edit', ['note' => $dailyNote]);
    }

    public function update(Request $request, DailyNote $dailyNote)
    {
        $this->authorizeOwner($dailyNote);
        $dailyNote->update($this->validated($request));

        return redirect()->route('catatan.index')->with('success', 'Catatan diperbarui.');
    }

    public function destroy(DailyNote $dailyNote)
    {
        $this->authorizeOwner($dailyNote);
        $dailyNote->delete();

        return redirect()->route('catatan.index')->with('success', 'Catatan dihapus.');
    }

    public function togglePin(DailyNote $dailyNote)
    {
        $this->authorizeOwner($dailyNote);
        $dailyNote->update(['is_pinned' => ! $dailyNote->is_pinned]);

        return back();
    }

    private function authorizeOwner(DailyNote $note): void
    {
        abort_unless($note->user_id === auth()->id(), 403);
    }

    private function validated(Request $request): array
    {
        $request->merge(['content' => $this->clean((string) $request->input('content'))]);

        $data = $request->validate([
            'category'   => ['required', 'in:kronologi,curahan'],
            'title'      => ['required', 'string', 'max:150'],
            'content'    => ['required', 'string'],
            'emotion'    => ['nullable', Rule::in(array_keys(DailyNote::EMOTIONS))],
            'event_date' => ['required', 'date'],
            'event_time' => ['required', 'date_format:H:i'],
        ], [
            'title.required'   => 'Judul catatan wajib diisi.',
            'content.required' => 'Detail catatan wajib diisi.',
        ]);

        return [
            'category'          => $data['category'],
            'title'             => $data['title'],
            'content'           => $data['content'],
            'emotion'           => $data['emotion'] ?? null,
            'event_at'          => Carbon::parse($data['event_date'].' '.$data['event_time']),
            'is_locked'         => $request->boolean('is_locked'),
            'hide_from_history' => $request->boolean('hide_from_history'),
        ];
    }

    private function clean(string $html): string
    {
        if (trim(strip_tags($html)) === '') {
            return '';
        }
        $html = strip_tags($html, '<b><strong><i><em><ul><ol><li><br><p><div>');

        return preg_replace('/<(b|strong|i|em|ul|ol|li|br|p|div)\b[^>]*>/i', '<$1>', $html);
    }
}
