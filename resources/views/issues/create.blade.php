<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('issues.create') ? __('Create a New') : __('Edit') }} {{ __('Issue') }}
        </h2>
    </x-slot>

    <div class="py-12 xs:px-4">
        <div class="max-w-3xl mx-auto px-4 lg:px-8">
            <form action="{{ request()->routeIs('issues.create') ? route('issues.store') : route('issues.update', $issue->id) }}" method="POST">
                @csrf
                @if (!request()->routeIs('issues.create'))
                    <input type="hidden" name="_method" value="PUT">
                @endif

                <div class="border-t border-b border-gray-300 py-8">
                <div class="md:w-2/3 w-full mb-6">
                <label for="status" class="block text-sm font-bold text-gray-700">
                    Status
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <select name="status" id="status" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                        <option value="Not Yet Started">Not Yet Started</option>
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Done">Done</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div>
                <label for="developer" class="block text-sm font-bold text-gray-700">
                    Developer <span class="text-xs text-gray-500">(Optional)</span>
                </label>
                <div class="mt-1">
                    <select id="developer" name="developer" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                        <option value="">Select Developer</option>
                        @foreach ($users ?? [] as $user)
                        {{-- Debug statement: --}}
                        {{ $user->name }}
                            @if ($user->is_admin == 2)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
    <label for="project_id" class="block text-sm font-bold text-gray-700">Select Project</label>
    <div class="mt-1">
        <select id="project_id" name="project_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
            <option value="">Select Project</option>
            @foreach ($projects ?? [] as $project)
                <option value="{{ $project->id }}">{{ $project->title }}</option>
            @endforeach
        </select>
    </div>
</div>

                </div>
                <div class="mt-6 sm:mt-4">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ request()->routeIs('issues.create') ? __('Create') : __('Save') }} {{ __('Issue') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
