<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6 question-container">
                            <div class="accordion accordion-flush list" id="accordionExample">
                            @foreach($requests as $item)
                                <div class="accordion-item item">
                                    <h2 class="accordion-header" id="heading{{ $item->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}" aria-expanded="true" aria-controls="collapse{{ $item->id }}">
                                            Requisição #{{ $item->id }} - {{ $item->number }}
                                            <span class="badge {{ $item->status == "Aberto" ? 'bg-success' : 'bg-warning' }} ml-3">{{ $item->status }}</span>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row ms-auto">
                                                <div class="col-8">
                                                    @foreach($item->answers as $answer)
                                                        <b>{{ $answer->question->question }}:</b> {{ $answer->answer }} <br/>
                                                    @endforeach
                                                </div>
                                                <div class="col-4">
                                                    <x-primary-button href="">Atualizar Status</x-primary-button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>

                            <br/>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <br/>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('js/pagination.js') }}"></script>
        <
    </x-slot>
</x-app-layout>
