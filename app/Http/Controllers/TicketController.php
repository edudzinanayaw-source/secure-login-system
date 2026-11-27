<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = auth()->user()->tickets()->latest()->get();

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'max:5000'],
            'priority' => ['required', 'in:low,medium,high'],
        ]);

        auth()->user()->tickets()->create($validated);

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Your support ticket has been submitted.');
    }

    public function show(Ticket $ticket)
    {
        abort_unless((int) $ticket->user_id === (int) auth()->id(), 403);

        return view('tickets.show', compact('ticket'));
    }

    public function adminIndex()
    {
        $tickets = Ticket::with('user')->latest()->get();

        return view('admin.tickets.index', compact('tickets'));
    }

    public function adminUpdate(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:open,in_progress,resolved'],
            'priority' => ['required', 'in:low,medium,high'],
            'admin_response' => ['nullable', 'string', 'max:5000'],
        ]);

        $ticket->update($validated);

        return redirect()
            ->route('admin.tickets.index')
            ->with('success', 'Ticket updated successfully.');
    }
}