<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <!-- Remove the following line, as it's not related to user listing -->
                {{-- <a href="{{ route('issues.create') }}" type="button"
                    class="focus:outline-none text-gray-600 text-sm py-2.5 px-5 rounded-full border border-gray-600 hover:border-white hover:bg-indigo-400 hover:text-white transition-all duration-300 ease-linear">New
                    Project</a> --}}
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        @if (count($users) < 1)
                            <h3 class="text-lg w-full text-center">You have no Users</h3>
                        @else
                            <div class="flex-grow overflow-auto">
                                <table class="relative w-full border table-fixed">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 w-1/4 text-gray-900 bg-gray-100">Name</th>
                                            <th class="px-6 py-3 w-1/2 text-gray-900 bg-gray-100">Email</th>
                                            <!--<th class="px-6 py-3 w-1/4 text-gray-900 bg-gray-100">Action</th>-->
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 text-left">
                                                    <h2 class="font-bold">{{ $user->name }}</h2>
                                                    <!-- Displaying user name -->
                                                    <span class="text-sm font-light text-gray-400">Updated
                                                        {{ $user->created_at }}</span>
                                                </td>
                                                <td class="px-6 py-4 text-center">{{ $user->email }}</td>
                                                <!-- Displaying user email -->
                                                <!--<td class="px-6 py-4 text-center">
                                                    <!-- Action buttons (Edit and Delete) --> 
                                                    
                                                    <!--<a href="{{ route('users.show', $user->id) }}"
                                                        class="inline-flex focus:outline-none text-white text-sm py-1 px-2 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <!-- Your SVG content for "View" button -->
                                                        <!--</svg>
                                                    </a>
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="inline-flex focus:outline-none text-white text-sm py-1 px-2 rounded-md bg-yellow-500 hover:bg-yellow-600 hover:shadow-lg">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <!-- Your SVG content for "Edit" button -->
                                                        <!--</svg>
                                                    </a>
                                                    <form
                                                        action="{{ route('users.destroy', $user->id) }}"
                                                        method="POST" class="inline-flex">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="focus:outline-none text-white text-sm py-1 px-2 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg">
                                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <!-- Your SVG content for "Delete" button -->
                                                            <!--</svg>
                                                        </button>
                                                    </form>
                                                </td> -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
