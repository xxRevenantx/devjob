<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                {{-- <x-welcome /> --}}
                @if (session()->has('message'))
                <x-alert color="green">{{ session('message') }}</x-alert>
             @endif



            <livewire:mostrar-vacantes />



            </div>
        </div>
    </div>
</x-app-layout>
