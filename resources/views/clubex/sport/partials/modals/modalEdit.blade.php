<x-modals.modalEdit>
    <x-slot name="modalID">
        modalEditSport
    </x-slot>

    <x-slot name="modalTitle">
        Editar Esporte
    </x-slot>

    <x-slot name="route">
        {{ route('sports.update', '1') }}
    </x-slot>
    
    <x-slot name="idForm">
        {{ 'formEditSport' }}
    </x-slot>

    <x-slot name="form">
        @method('PUT')
        @include('clubex.sport.partials.form')
    </x-slot>

    <x-slot name="deleteButton">
        <div class="row justify-content-end py-2">
            <div class="col-3" style="padding-right: 0%" >
                <x-crud.crud-buttons 
                    :routeDelete="__('/sports')"
                    :titleDelete="__('Remover Esporte')"
                    :deleteBottonName="__('deleteSport')"
                />    
            </div>
        </div>
        <hr>
    </x-slot>
</x-modals.modalEdit>