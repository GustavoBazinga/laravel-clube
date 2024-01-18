<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ClubeX') }} 
        </h2>
        <p>Sistema de instrução</p>
    </x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/clubex/styles.css') }}">
    </x-slot>

    <x-slot name="slot">
        <div class="container">
            <div id="sportsClasses" class="section">
              <div class="content">
                <h1>Turmas</h1>
              </div>
              <div class="overlay"></div>
            </div>
            <div id="events" class="section">
              <div class="content">
                <h1>Eventos</h1>
              </div>
              <div class="overlay"></div>
            </div>
            <div id="waitingList" class="section">
              <div class="content">
                <h1>Lista de Espera</h1>
              </div>
              <div class="overlay"></div>
            </div>
            <div id="sports" class="section">
                <div class="content">
                  <h1>Esportes</h1>
                </div>
                <div class="overlay"></div>
              </div>
              <div id="professors" class="section">
                <div class="content">
                  <h1>Professores</h1>
                </div>
                <div class="overlay"></div>
              </div>
        </div>
    
        
    </x-slot>

    <x-slot name="script">
        <script src="{{ asset('js/clubex/onClickEvents.js') }}"></script>
    </x-slot>
</x-app-layout>
