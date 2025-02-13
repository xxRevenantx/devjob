<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vacantes
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                {{-- <x-welcome /> --}}
                @if (session()->has('message'))
                <x-alert-success color="green">{{ session('message') }}</x-alert-success>
                   @endif



                   <livewire:mostrar-vacantes />



            </div>
        </div>
    </div>
</x-app-layout>
