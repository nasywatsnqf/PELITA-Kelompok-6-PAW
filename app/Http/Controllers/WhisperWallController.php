<?php

namespace App\Http\Controllers;

use App\Models\WhisperWall;
use Illuminate\Http\Request;

class WhisperWallController extends Controller {
    public function index() {
        $posts = WhisperWall::with('user')->latest()->take(20)->get();

        return view('whisper-wall.index', compact('posts'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'content' => ['required', 'string', 'min:5', 'max:1000'],
        ], [
            'content.required' => 'Ceritamu belum ditulis.',
            'content.min'      => 'Cerita minimal 5 karakter.',
            'content.max'      => 'Cerita maksimal 1000 karakter.',
        ]);

        WhisperWall::create([
            'user_id'      => auth()->id(),
            'content'      => $validated['content'],
            'is_anonymous' => $request->boolean('is_anonymous'),
        ]);

        return redirect()->route('whisper-wall.index')
            ->with('success', 'Ceritamu sudah dibagikan.');
    }

    public function react(WhisperWall $whisperWall, string $type) {
        $column = match ($type) {
            'hug'     => 'hug_count',
            'support' => 'support_count',
            default   => abort(404),
        };

        $whisperWall->increment($column);

        return response()->json(['count' => $whisperWall->$column]);
    }

    public function destroy(WhisperWall $whisperWall) {
        abort_unless(auth()->check() && $whisperWall->user_id === auth()->id(), 403);

        $whisperWall->delete();

        return back()->with('success', 'Postingan berhasil dihapus.');
    }
}