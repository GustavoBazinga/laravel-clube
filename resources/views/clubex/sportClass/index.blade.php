<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ClubeX - Turmas') }} 
        </h2>
        <x-primary-button id="createButton">
            Nova Turma
        </x-primary-button>
    </x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/clubex/sportClass/cardsStyles.css') }}"> 
    </x-slot>

    <x-slot name="slot">
        <div class="container">
           
            @foreach ($classes as $groupName => $items)
                @php
                    $count = 0;
                @endphp
                <h2 class="font-semibold text-xl text-gray-800 leading-tight py-3">
                    {{ $groupName }} 
                </h2>
                @foreach ($items as $item)
                    @if ($count % 6 == 0)
                        <div class="row py-2">
                    @endif
                    <div class="col-lg-2">
                        @include('clubex.sportClass.partials.card')
                    </div>
                    @php
                        $count++;
                    @endphp
                    @if ($count % 6 == 0)
                        </div>
                    @endif
                    
                @endforeach
            @endforeach
        </div>

    @include('clubex.sportClass.partials.modals.modalCreate')
    @include('clubex.sportClass.partials.modals.modalEdit')
    
    </x-slot>
    <x-slot name="script">
        <script src="{{ asset('js/clubex/sportClass/modalEvents.js') }}"></script>
    </x-slot>
</x-app-layout>
