<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Support Ticket</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #f4f7fc; color: #18243a; }
        main { max-width: 720px; margin: 40px auto; padding: 28px; background: white; border: 1px solid #e5eaf2; border-radius: 14px; }
        label { display: block; margin: 18px 0 7px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font: inherit; }
        textarea { min-height: 150px; resize: vertical; }
        .button { margin-top: 20px; padding: 12px 18px; border: 0; border-radius: 8px; background: #356df3; color: white; cursor: pointer; }
        .error { color: #b91c1c; font-size: 14px; margin-top: 5px; }
        a { color: #356df3; text-decoration: none; }
    </style>
</head>
<body>
<main>
    <p><a href="{{ route('tickets.index') }}">← Back to my tickets</a></p>
    <h1>Submit a Support Ticket</h1>
    <p>Describe the technical issue you need help with.</p>

    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf

        <label for="subject">Subject</label>
        <input id="subject" name="subject" value="{{ old('subject') }}" maxlength="150" required>
        @error('subject') <div class="error">{{ $message }}</div> @enderror

        <label for="description">Describe the issue</label>
        <textarea id="description" name="description" maxlength="5000" required>{{ old('description') }}</textarea>
        @error('description') <div class="error">{{ $message }}</div> @enderror

        <label for="priority">Priority</label>
        <select id="priority" name="priority" required>
            <option value="low" @selected(old('priority') === 'low')>Low</option>
            <option value="medium" @selected(old('priority', 'medium') === 'medium')>Medium</option>
            <option value="high" @selected(old('priority') === 'high')>High</option>
        </select>
        @error('priority') <div class="error">{{ $message }}</div> @enderror

        <button class="button" type="submit">Submit Ticket</button>
    </form>
</main>
</body>
</html>