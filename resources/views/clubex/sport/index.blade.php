<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ClubeX - Esportes') }} 
        </h2>
        <x-primary-button id="createButton">
            Novo Esporte
        </x-primary-button>
    </x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/clubex/sports/cardsStyles.css') }}"> 


    </x-slot>

    <x-slot name="slot">
        <div class="container">
            @php
                $count = 0;
            @endphp
            @foreach ($sports as $item)
                @if ($count % 6 == 0)
                    <div class="row py-2">
                @endif
                <div class="col-lg-2">
                    @include('clubex.sport.partials.card', ['item' => $item])
                </div>
                @php
                    $count++;
                @endphp
                @if ($count % 6 == 0)
                    </div>
                @endif
            @endforeach
            @if ($count % 6 != 0)
                </div>
            @endif
        </div>

    @include('clubex.sport.partials.modals.modalCreate')
    @include('clubex.sport.partials.modals.modalEdit')
    
    </x-slot>
    <x-slot name="script">
        <script src="{{ asset('js/clubex/sports/modalEvents.js') }}"></script>
    </x-slot>
</x-app-layout>
