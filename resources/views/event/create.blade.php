<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Criação de Eventos
        </h2>
    </x-slot>
    
    <x-crud.create>
        <x-slot name="route">
            {{ route('events.store') }}
        </x-slot>
        <x-slot name="form">
            <div class="row">
                <div class="col">
                    <x-input-label>
                        Nome do Evento
                    </x-input-label>
                    <x-text-input style="width:100%" id="name" name="name" label="Name"/>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <x-input-label>
                        Descrição
                    </x-input-label>
                    <x-text-input style="width:100%" id="description" name="description" label="Description"/>
                </div>
                <div class="col-6">
                    <x-input-label>
                        Data
                    </x-input-label>
                    <x-text-input type="date" style="width:100%" id="date" name="date" label="Date"/>
                </div>
            </div>
           
        </x-slot> 
    </x-crud.create>
</x-app-layout>
