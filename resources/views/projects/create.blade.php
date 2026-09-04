<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Create project</h2></x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            @include('projects.partials.flash')
            <form method="POST" action="{{ route('projects.store') }}" class="space-y-6 rounded-lg bg-white p-6 shadow-sm">
                @include('projects.partials.form', ['submitLabel' => 'Create project'])
            </form>
        </div>
    </div>
</x-app-layout>
