<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eventos') }} 
        </h2>
        <a class="small" href="" id="openModalRoles">Configurar funções e valores</a>
    </x-slot>
    <x-crud.index>
        <x-slot name="buttonCreate">
            <x-crud.crud-buttons :routeCreate="route('events.create')" :titleCreate="__('Criar')"/>
        </x-slot>
        <x-slot name="data">
            @foreach ($events as $item)
                <div class="row main-row border-bottom">
                    <div class="col-12 align-center">
                        <div class="row p-3">
                            <div class="col-4 align-middle">
                                {{ $item->name }} - {{ date('d-m-Y', strtotime($item->date)) }}
                            </div>
                            <div class="col-3">
                            </div>
                            <div class="col-5">
                                <x-crud.crud-buttons 
                                    :titleRead="__('Cachê')"
                                    :routeRead="route('events.show', $item->id)"
                                    :titleEdit="__('Editar')" 
                                    :routeEdit="route('events.edit', $item->id)" 
                                    :titleDelete="__('Remover')"
                                    :routeDelete="url('/events' . '/' . $item->id)" 
                                    />                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </x-slot>
       
    </x-crud.index>
    @include('partials.modal.modalRoles')
    <x-slot name="script">
        <script src="{{ asset('js/role/script.js') }}"></script>
    </x-slot>
</x-app-layout>
