<x-modals.modalCreate>
    <x-slot name="modalID">
        modalCreateProfessor
    </x-slot>

    <x-slot name="modalTitle">
        Novo Professor
    </x-slot>

    <x-slot name="route">
        {{ route('professors.store') }}
    </x-slot>

    <x-slot name="form">
        @include('clubex.professor.partials.form')
    </x-slot>
</x-modals.modalEdit>