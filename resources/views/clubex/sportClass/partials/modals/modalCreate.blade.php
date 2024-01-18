<x-modals.modalCreate>
    <x-slot name="modalID">
        modalCreateSportClass
    </x-slot>

    <x-slot name="modalTitle">
        Novo Turma
    </x-slot>

    <x-slot name="route">
        {{ route('sportsClass.store') }}
    </x-slot>

    <x-slot name="form">
        @include('clubex.sportClass.partials.form')
    </x-slot>
</x-modals.modalEdit>