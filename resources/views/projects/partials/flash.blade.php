@if (session('success'))
    <div class="rounded-md bg-emerald-50 p-4 text-sm text-emerald-700">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="rounded-md bg-red-50 p-4 text-sm text-red-700">
        <ul class="list-disc space-y-1 pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
