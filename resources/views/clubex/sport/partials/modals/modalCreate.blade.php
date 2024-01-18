<x-modals.modalCreate>
    <x-slot name="modalID">
        modalCreateSport
    </x-slot>

    <x-slot name="modalTitle">
        Novo Esporte
    </x-slot>

    <x-slot name="route">
        {{ route('sports.store') }}
    </x-slot>

    <x-slot name="form">
        @include('clubex.sport.partials.form')
    </x-slot>
</x-modals.modalEdit>