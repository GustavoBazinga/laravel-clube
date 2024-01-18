<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evento ' .  $event->name . ' - ' . date('d/m/Y', strtotime($event->date))) }}
        </h2>
        <div class="col-3 mt-2">
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('workers.create') }}">
                {{ __('Emitir Planilha de Cachê') }}
            </a> 
        </div>
    </x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/question/styles.css') }}">
    </x-slot>

    <x-slot name="slot">
        <x-crud.show>
            <x-slot name="data">
                <div class="row">
                    <div class="col-12 my-2">
                        <x-primary-button id="addWorker">
                            Adicionar Funcionário
                        </x-primary-button>
                        <x-primary-button id="saveCachet">
                            Salvar
                        </x-primary-button>
                    </div>
                
                </div>
                <div class="main-row border-bottom">
                    <div class="cachets">
                        <table id="cachet" class="table" event="{{ $event->id }}">
                            <thead>
                                <tr>
                                    <th>Funcionário</th>
                                    <th>Função</th>
                                    <th>Horário de Entrada</th>
                                    <th>Horário de Saída</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event->cachets as $cachet)
                                    <tr>
                                        <td class="workerClass">{{ $cachet->worker->id }} - {{ $cachet->worker->name }}</td>
                                        <td>
                                            <x-select-input style="width: 100%" class="roleClass">                                                
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}" {{ $cachet->role->name == $role->name ? 'selected' : '' }} >{{ $role->name }}</option>
                                                    {{-- <option value="{{ $role->id }}" {{ $cachet->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option> --}}
                                                @endforeach
                                            </x-select-input>
                                        </td>
                                        <td class="startTimeClass"><input class="form-control startTimeClass" type="time" value="{{ date('H:i', strtotime($cachet->start_time)) }}"></td>
                                        <td class="endTimeClass"><input class="form-control endTimeClass" type="time" value="{{ date('H:i', strtotime($cachet->end_time)) }}"></td>
                                        {{-- <td><button type="button" class="remove-button">X</button></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </x-slot>
        </x-crud.show>
    </x-slot>

    <x-slot name="script">
        <script src="{{ asset('js/role/script.js') }}"></script>
        <script src="{{ asset('js/cachet/script.js') }}"></script>

    </x-slot>
</x-app-layout>


