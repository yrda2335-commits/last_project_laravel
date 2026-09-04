<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects</h2>
            <a href="{{ route('projects.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">New project</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            @include('projects.partials.flash')
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto p-6">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                        <thead class="text-xs uppercase text-gray-500">
                            <tr>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Department</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Priority</th>
                                <th class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($projects as $project)
                                <tr>
                                    <td class="px-4 py-4 font-medium text-gray-900">{{ $project->name }}</td>
                                    <td class="px-4 py-4 text-gray-600">{{ $project->department->name }}</td>
                                    <td class="px-4 py-4 text-gray-600">{{ str_replace('_', ' ', ucfirst($project->status)) }}</td>
                                    <td class="px-4 py-4 text-gray-600">{{ ucfirst($project->priority) }}</td>
                                    <td class="px-4 py-4 text-right"><a class="font-medium text-indigo-600 hover:text-indigo-500" href="{{ route('projects.show', $project) }}">View</a></td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">No projects found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-6">{{ $projects->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
