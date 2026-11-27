<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket #{{ $ticket->id }}</title>
    <style>
        body { margin: 0; padding: 30px 18px; font-family: Arial, sans-serif; background: #f4f7fc; color: #18243a; }
        main { max-width: 760px; margin: auto; padding: 28px; background: white; border: 1px solid #e5eaf2; border-radius: 14px; }
        .muted { color: #718096; }
        .response { margin-top: 25px; padding: 18px; border-radius: 10px; background: #edf3ff; }
        a { color: #356df3; text-decoration: none; }
    </style>
</head>
<body>
<main>
    <p><a href="{{ route('tickets.index') }}">← Back to my tickets</a></p>
    <p class="muted">Ticket #{{ $ticket->id }}</p>
    <h1>{{ $ticket->subject }}</h1>
    <p><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}</p>
    <p><strong>Priority:</strong> {{ ucfirst($ticket->priority) }}</p>
    <hr>
    <h3>Issue description</h3>
    <p>{{ $ticket->description }}</p>

    @if($ticket->admin_response)
        <div class="response">
            <h3>Helpdesk response</h3>
            <p>{{ $ticket->admin_response }}</p>
        </div>
    @else
        <p class="muted">The helpdesk has not responded yet.</p>
    @endif
</main>
</body>
</html>