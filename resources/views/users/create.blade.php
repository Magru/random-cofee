<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New User') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-3">
            <div class="overflow-x-auto">
                <form action="{{ route('user.store') }}" method="GET">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="w-1/2 px-2 mb-2">
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>
                            <input type="text" id="name" name="name" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div class="w-1/2 px-2 mb-2">
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Community') }}</label>
                            <select name="community" id="community" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                                <option disabled selected>Select...</option>
                                @foreach($communities as $_c)
                                    <option value="{{ $_c->id }}">{{ $_c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/2 px-2">
                            <button type="submit" class="btn btn-outline btn-primary">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
