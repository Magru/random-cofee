<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
        <a href="{{ route('user.create') }}" class="btn btn-outline btn-primary">New</a>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $_user)
                        <tr>
                            <th>{{ $_user->id }}</th>
                            <td>{{ $_user->name }}</td>
                            <td>{{ $_user->getRoleNames() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
