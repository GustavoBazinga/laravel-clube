<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $form->title }} - Perguntas
        </h2>
    </x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/question/styles.css') }}">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('questions.update', $form->id) }}" method="POST" id="form-questions">
                        @csrf
                        @method('PUT')
                        <div id="questions-list">
                            @foreach($form->questions as $question)
                                <div>
                                    <x-input-label class="label-questions">
                                        Questão {{ $loop->iteration }}
                                    </x-input-label>
                                    <div class="row">
                                        <div class="col-6">
                                            <x-text-input style="width:100%"  name="old_questions[{{ $question->id }}]" label="question" value="{{ $question->question }}" />
                                        </div>
                                        <div class="col-5">
                                            <x-select-input style="width:100%" name="old_types[{{ $question->id }}]" label="Type" value="{{ $question->type }}">
                                                <option value="text" {{ $question->type == "text" ? 'selected' : '' }}>Texto</option>
                                                <option value="longtext" {{ $question->type == "longtext" ? 'selected' : '' }}>Texto Longo</option>
                                                <option value="select" {{ $question->type == "select" ? 'selected' : '' }} >Seleção</option>
                                                <option value="email" {{ $question->type == "email" ? 'selected' : '' }}>E-mail</option>
                                                <option value="number" {{ $question->type == "number" ? 'selected' : '' }}>Número </option>
                                                <option value="date" {{ $question->type == "date" ? 'selected' : '' }}>Data</option>
                                                <option value="telephone" {{ $question->type == "telephone" ? 'selected' : '' }}>Telefone</option>
                                            </x-select-input>
                                        </div>
                                        <div class="col-1">
                                            <button type="button" class="remove-button">X</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <x-primary-button id="btn-add-question" type="button">
                                    Adicionar Pergunta
                                </x-primary-button>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <x-primary-button type="submit" id="teste">
                                    Salvar
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <x-slot name="script">
        <script src="{{ asset('js/question/script.js') }}"></script>
    </x-slot>

</x-app-layout>
