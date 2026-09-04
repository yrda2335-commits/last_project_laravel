<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $project->name }}</h2>
            <div class="flex gap-2">
                <a href="{{ route('projects.edit', $project) }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Edit</a>
                <form method="POST" action="{{ route('projects.destroy', $project) }}" onsubmit="return confirm('Delete this project?')">
                    @csrf
                    @method('DELETE')
                    <button class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-500">Delete</button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl space-y-6 px-4 sm:px-6 lg:px-8">
            @include('projects.partials.flash')
            <section class="rounded-lg bg-white p-6 shadow-sm">
                <dl class="grid gap-6 sm:grid-cols-2">
                    <div><dt class="text-sm text-gray-500">Department</dt><dd class="font-medium text-gray-900">{{ $project->department->name }}</dd></div>
                    <div><dt class="text-sm text-gray-500">Status</dt><dd class="font-medium text-gray-900">{{ ucfirst($project->status) }}</dd></div>
                    <div><dt class="text-sm text-gray-500">Priority</dt><dd class="font-medium text-gray-900">{{ ucfirst($project->priority) }}</dd></div>
                    <div><dt class="text-sm text-gray-500">Due date</dt><dd class="font-medium text-gray-900">{{ $project->due_date?->format('M d, Y') ?? 'Not set' }}</dd></div>
                </dl>
                @if ($project->description)
                    <div class="mt-6 border-t pt-6"><h3 class="text-sm text-gray-500">Description</h3><p class="mt-2 whitespace-pre-line text-gray-700">{{ $project->description }}</p></div>
                @endif
            </section>
            <section class="rounded-lg bg-white p-6 shadow-sm">
                <h3 class="font-semibold text-gray-900">Tasks ({{ $project->tasks->count() }})</h3>
                <ul class="mt-4 divide-y divide-gray-100">
                    @forelse ($project->tasks as $task)
                        <li class="py-3 text-sm text-gray-700">{{ $task->title }} <span class="text-gray-400">({{ str_replace('_', ' ', $task->status) }})</span></li>
                    @empty
                        <li class="py-3 text-sm text-gray-500">No tasks assigned yet.</li>
                    @endforelse
                </ul>
            </section>
        </div>
    </div>
</x-app-layout>
