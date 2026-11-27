<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Support Tickets</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #f4f7fc; color: #18243a; }
        header { background: #101b35; color: white; padding: 22px 6%; }
        header a { color: white; text-decoration: none; }
        main { max-width: 1250px; margin: 30px auto; padding: 0 18px; }
        .panel { background: white; border: 1px solid #e5eaf2; border-radius: 12px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 950px; }
        th, td { padding: 14px; text-align: left; vertical-align: top; border-bottom: 1px solid #edf0f6; }
        th { background: #f8faff; color: #64748b; font-size: 12px; text-transform: uppercase; }
        input, select, textarea { width: 100%; min-width: 130px; padding: 9px; margin-bottom: 8px; border: 1px solid #cbd5e1; border-radius: 7px; font: inherit; }
        textarea { min-height: 75px; }
        button { padding: 9px 13px; border: 0; border-radius: 7px; background: #356df3; color: white; cursor: pointer; }
        .message { background: #e3f8ef; color: #087443; padding: 12px; border-radius: 8px; margin-bottom: 16px; }
        .issue { max-width: 250px; white-space: pre-wrap; overflow-wrap: anywhere; }
    </style>
</head>
<body>
<header><a href="{{ route('admin.dashboard') }}">← Back to Admin Dashboard</a></header>
<main>
    <h1>Helpdesk Tickets</h1>
    <p>Review submitted issues and update their status, priority, or response.</p>

    @if(session('success')) <div class="message">{{ session('success') }}</div> @endif

    <div class="panel">
        <table>
            <thead><tr><th>Ticket</th><th>Submitted by</th><th>Issue</th><th>Manage</th></tr></thead>
            <tbody>
            @forelse($tickets as $ticket)
                <tr>
                    <td>
                        #{{ $ticket->id }}<br>
                        <small>{{ $ticket->created_at->format('d M Y') }}</small>
                    </td>
                    <td>{{ $ticket->user->name }}<br>{{ $ticket->user->email }}</td>
                    <td class="issue">
                        <strong>{{ $ticket->subject }}</strong><br>
                        {{ $ticket->description }}
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.tickets.update', $ticket) }}">
                            @csrf
                            @method('PATCH')

                            <label>Priority</label>
                            <select name="priority">
                                @foreach(['low', 'medium', 'high'] as $priority)
                                    <option value="{{ $priority }}" @selected($ticket->priority === $priority)>{{ ucfirst($priority) }}</option>
                                @endforeach
                            </select>

                            <label>Status</label>
                            <select name="status">
                                @foreach(['open', 'in_progress', 'resolved'] as $status)
                                    <option value="{{ $status }}" @selected($ticket->status === $status)>{{ ucfirst(str_replace('_', ' ', $status)) }}</option>
                                @endforeach
                            </select>

                            <label>Response</label>
                            <textarea name="admin_response" maxlength="5000">{{ old('admin_response', $ticket->admin_response) }}</textarea>

                            <button type="submit">Save Update</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No support tickets have been submitted yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</main>
</body>
</html>