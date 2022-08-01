<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Areas') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row">
            <div class="w-1/2 mr-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-3">
                    <div class="overflow-x-auto">
                        <div class="divider">
                            <h3>{{ __('State') }}</h3>
                        </div>
                        <form action="{{ route('area.state.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap">
                                <div class="w-full px-2 mb-2">
                                    <label for="state_name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>
                                    <input type="text" required id="state_name" name="state_name" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                                </div>
                                <div class="w-1/2 px-2">
                                    <button type="submit" class="btn btn-outline btn-primary">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="w-1/2 ml-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-3">
                    <div class="overflow-x-auto">
                        <div class="divider">
                            <h3>{{ __('City') }}</h3>
                        </div>
                        <form action="{{ route('area.city.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap">
                                <div class="w-1/2 px-2 mb-2">
                                    <label for="city_name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>
                                    <input type="text" id="city_name" name="city_name" required class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                                </div>

                                <div class="w-1/2 px-2 mb-2">
                                    <label for="name" class="block font-medium text-sm text-gray-700">{{ __('State') }}</label>
                                    <select name="state" id="state" required class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                                        <option disabled selected>Select...</option>
                                        @if($states)
                                            @foreach($states as $_s)
                                                <option value="{{ $_s->id }}">{{ $_s->name }}</option>
                                            @endforeach
                                        @endif
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
        </div>
    </div>


</x-app-layout>
