<x-modals.modalEdit>
    <x-slot name="modalID">
        modalEditProfessor
    </x-slot>

    <x-slot name="modalTitle">
        Editar Professor
    </x-slot>

    <x-slot name="route">
        {{ route('professors.update', '1') }}
    </x-slot>

    

    <x-slot name="idForm">
        {{ 'formEditProfessor' }}
    </x-slot>

    <x-slot name="form">
        @method('PUT')
        @include('clubex.professor.partials.form')
    </x-slot>

    <x-slot name="deleteButton">
        <div class="row justify-content-end py-2">
            <div class="col-3" style="padding-right: 0%" >
                <x-crud.crud-buttons 
                    :routeDelete="__('/sports')"
                    :titleDelete="__('Remover Professor')"
                    :deleteBottonName="__('deleteProfessor')"
                />    
            </div>
        </div>
        <hr>
    </x-slot>
</x-modals.modalEdit>