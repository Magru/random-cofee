<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Communities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($communities as $_com)
                            <tr>
                                <th>{{ $_com->id }}</th>
                                <td>{{ $_com->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
