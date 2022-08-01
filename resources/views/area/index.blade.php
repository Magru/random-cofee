<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Locations') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row">
            <div class="w-1/2 mr-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-3">
                    <div class="overflow-x-auto px-3 py-3">
                        <div class="divider">
                            <h3>{{ __('State') }}</h3>
                        </div>
                        <livewire:state-table />
                    </div>
                </div>
            </div>
            <div class="w-1/2 ml-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-3">
                    <div class="overflow-x-auto px-3 py-3">
                        <div class="divider">
                            <h3>{{ __('City') }}</h3>
                        </div>
                        <livewire:city-table />
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
