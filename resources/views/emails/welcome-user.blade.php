<x-mail::message>
# Welcome to ERPM, {{ $user->name }}

Your Enterprise Resource & Project Manager account is ready. You can now manage projects, tasks, and team resources from your dashboard.

<x-mail::button :url="route('dashboard')">
Open dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name', 'ERPM') }}
</x-mail::message>
