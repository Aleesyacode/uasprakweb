<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $searchDate = $request->input('search_date');

        $journals = Journal::query()
            ->when($searchDate, function ($query, $searchDate) {
                $query->whereDate('date', $searchDate);
            })
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('journals.index', compact('journals'));
    }


    public function create()
    {
        return view('journals.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'date' => 'required|date',
        'mood' => 'required|string',
        'activities' => 'nullable|array',
        'to_do_list' => 'nullable|string',
        'notes' => 'nullable|string',
    ]);

    Journal::create([
        'user_id' => auth()->id(),
        'date' => $data['date'],
        'mood' => $data['mood'],
        'activities' => json_encode($data['activities'] ?? []),
        'to_do_list' => $data['to_do_list'] ?? null,
        'notes' => $data['notes'] ?? null,
    ]);

    return redirect()->route('journals.index')->with('success', 'Jurnal berhasil disimpan.');
}

    public function show(Journal $journal)
    {
        $this->authorizeAccess($journal);
        return view('journals.show', compact('journal'));
    }

    public function edit(Journal $journal)
    {
        $this->authorizeAccess($journal);
        return view('journals.edit', compact('journal'));
    }

    public function update(Request $request, Journal $journal)
{
    $data = $request->validate([
        'date' => 'required|date',
        'mood' => 'required|string',
        'activities' => 'nullable|array',
        'to_do_list' => 'nullable|string',
        'notes' => 'nullable|string',
    ]);

    $journal->update([
        'date' => $data['date'],
        'mood' => $data['mood'],
        'activities' => json_encode($data['activities'] ?? []),
        'to_do_list' => $data['to_do_list'] ?? null,
        'notes' => $data['notes'] ?? null,
    ]);

    return redirect()->route('journals.index')->with('success', 'Jurnal berhasil diperbarui.');
}


    public function destroy(Journal $journal)
    {
        $this->authorizeAccess($journal);
        $journal->delete();

        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil dihapus.');
    }

    private function authorizeAccess(Journal $journal)
    {
        if ($journal->user_id !== auth()->id()) {
            abort(403);
        }
    }
}