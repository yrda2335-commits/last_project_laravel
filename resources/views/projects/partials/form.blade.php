@csrf

<div>
    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
    <input id="name" name="name" value="{{ old('name', $project->name ?? '') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
</div>

<div>
    <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
    <select id="department_id" name="department_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        <option value="">Select a department</option>
        @foreach ($departments as $department)
            <option value="{{ $department->id }}" @selected(old('department_id', $project->department_id ?? '') == $department->id)>{{ $department->name }}</option>
        @endforeach
    </select>
    @error('department_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
</div>

<div>
    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
    <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $project->description ?? '') }}</textarea>
    @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
</div>

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select id="status" name="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach (['planning', 'active', 'completed', 'cancelled'] as $status)
                <option value="{{ $status }}" @selected(old('status', $project->status ?? 'planning') === $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
        @error('status') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
        <select id="priority" name="priority" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach (['low', 'medium', 'high'] as $priority)
                <option value="{{ $priority }}" @selected(old('priority', $project->priority ?? 'medium') === $priority)>{{ ucfirst($priority) }}</option>
            @endforeach
        </select>
        @error('priority') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
</div>

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label for="start_date" class="block text-sm font-medium text-gray-700">Start date</label>
        <input id="start_date" type="date" name="start_date" value="{{ old('start_date', isset($project->start_date) ? $project->start_date->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('start_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="due_date" class="block text-sm font-medium text-gray-700">Due date</label>
        <input id="due_date" type="date" name="due_date" value="{{ old('due_date', isset($project->due_date) ? $project->due_date->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('due_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
</div>

<button class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">{{ $submitLabel }}</button>
