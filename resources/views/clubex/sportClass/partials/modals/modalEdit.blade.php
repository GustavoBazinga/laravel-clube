<x-modals.modalEdit>
    <x-slot name="modalID">
        modalEditSportClass
    </x-slot>

    <x-slot name="modalTitle">
        Editar Esporte
    </x-slot>

    <x-slot name="route">
        {{ url('/sportsClass/update') }}
    </x-slot>

    <x-slot name="method">
        POST
    </x-slot>

    <x-slot name="idForm">
        {{ 'formEditClasses' }}
    </x-slot>

    <x-slot name="form">
        @include('clubex.sportClass.partials.form')
    </x-slot>

    <x-slot name="deleteButton">
        <div class="row justify-content-end py-2">
            <div class="col-3" style="padding-right: 0%" >
                <x-primary-button class="editButtonClass">
                    Editar Turma
                </x-primary-button>  
            </div>
            <div class="col-3" style="padding-right: 0%" >
                <x-crud.crud-buttons 
                    :routeDelete="__('/sports')"
                    :titleDelete="__('Remover Turma')"
                    :deleteBottonName="__('deleteClass')"
                />   

            </div>
        </div>
        <hr>
    </x-slot>
</x-modals.modalEdit>