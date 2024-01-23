<x-app-layout>
    

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Esporte') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="container my-3">
            <x-crud.edit :route="route('sports.update', $sport->id)" :method="'PUT'" :idForm="'editSport'" :deleteButton="null">
                <x-slot name="form">
                    @include('clubex.sport.partials.form')
                </x-slot>
                <div class="row mt-2">
                    <div class="col">
                        <x-primary-button type="submit">
                            Salvar
                        </x-primary-button>
                    </div>
                </div>
            </x-crud.edit>
        </div>
    </x-slot>

</x-app-layout>