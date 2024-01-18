<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Funcionários') }}
        </h2>
    </x-slot>
    <x-crud.index>
        <x-slot name="buttonCreate">
            <x-crud.crud-buttons :routeCreate="route('workers.create')" :titleCreate="__('Criar')"/>
        </x-slot>

        <x-slot name="data">
            @foreach ($workers as $item)
                <div class="row main-row border-bottom">
                    <div class="col-12 align-center">
                        <div class="row p-3">
                            <div class="col-4 align-middle">
                                {{ $item->register }} - {{ $item->name }}
                            </div>
                            <div class="col-5">
                            </div>
                            <div class="col-3">
                                <x-crud.crud-buttons 
                                    :titleEdit="__('Editar')" 
                                    :routeEdit="route('workers.edit', $item->id)" 
                                    :titleDelete="__('Remover')"
                                    :routeDelete="url('/workers' . '/' . $item->id)" 
                                    />                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </x-slot>
    </x-crud.index>
</x-app-layout>
