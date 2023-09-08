<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar opções
        </h2>
    </x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/question/styles.css') }}">
    </x-slot>

    <form action="{{ route('options.update', $form) }}" method="POST">
        @csrf
        @method('PUT')

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @foreach($questions as $question)
                        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                            <div class="p-6 question-container">
                                <div class="question-title">
                                {{ $loop->iteration }} - {{ $question->question }}
                                </div>
                                <br>
                                @if($question->type == 'select')
                                    <div class="row div-options">
                                        @foreach($question->options as $option)
                                            <div class="row mb-1">
                                                <div class="col-6">
                                                    <x-input-label class="label-options">
                                                        Opção {{ $loop->iteration }}:
                                                    </x-input-label>
                                                    <x-text-input style="width:100%"  name="old_options[{{ $question->id }}][{{ $option->id }}]" label="question" value="{{ $option->option }}" />
                                                </div>
                                                <div class="col-5">
                                                    <x-input-label>
                                                        Próxima Pergunta:
                                                    </x-input-label>
                                                    <x-select-input style="width:100%" name="old_next_question[{{ $question->id }}][{{ $option->id }}]" label="Type" value="{{ $question->type }}">
                                                        @foreach($questions as $item)
                                                            @if($item->id != $question->id)
                                                                <option value="{{ $item->id }}" {{ $option->next_question_id == $item->id ? 'selected' : '' }}>{{ $item->question }}</option>
                                                            @endif
                                                        @endforeach
                                                        <option value="" {{ $question->options[0]->next_question_id == '' ? 'selected' : '' }}>Finalizar questionário</option>
                                                    </x-select-input>
                                                </div>
                                                <div class="col-1 mt-3">
                                                    <button type="button" class="remove-button">X</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <x-primary-button class="btn-add-option" type="button">
                                                Adicionar Opção
                                            </x-primary-button>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <x-input-label class="label-options">
                                            Próxima Pergunta:
                                        </x-input-label>
                                        <x-select-input style="width:100%" name='old_next_question[free][{{ $question->id }}]' label="Type" value="{{ $question->type }}">
                                            @foreach($questions as $item)
                                                @if($item->id != $question->id)

                                                    <option value="{{ $item->id }}" {{ isset($question->options[0]->next_question_id) && $question->options[0]->next_question_id == $item->id ? 'selected' : '' }}>{{ $item->question }}</option>

                                                @endif
                                            @endforeach
                                            @if(!isset($question->options[0]->next_question_id))
                                                <option value="" selected>Finalizar questionário</option>
                                            @else
                                                <option value="">Finalizar questionário</option>
                                            @endif
                                        </x-select-input>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br/>
                    @endforeach
                    <x-primary-button type="submit">
                        Salvar
                    </x-primary-button>
                </div>
            </div>
    </form>

    <x-slot name="script">
        <script src="{{ asset('js/option/script.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.btn-add-option').click(function() {
                    let parent = $(this).parent().parent().parent();

                    let question = parent.find('.question-title').text();

                    question = question.split(' - ')[1];

                    question = question.trim()

                    let id;

                    @foreach($questions as $item)
                        if ( '{{ $item->question }}' == question) {
                            id = '{{ $item->id }}';
                        }

                    @endforeach

                    divOptions = parent.find('.div-options');

                    count = divOptions.find('.label-options').length;

                    label = $('<label></label>').text(`Opção ${count + 1}`).addClass('block text-sm font-medium text-gray-700 label-options');
                    label2 = $('<label></label>').text('Próxima Pergunta:').addClass('block text-sm font-medium text-gray-700');
                    input = $('<input></input>')
                        .attr('type', 'text')
                        .attr('name', 'new_option[' + id + '][]')
                        .addClass('border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm')
                        .attr('style', 'width: 100%')
                        .attr('required', 'required');
                    select = $('<select></select>')
                        .attr('name', 'new_next_question[' + id + '][]')
                        .addClass('border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm')
                        .attr('style', 'width: 100%')
                        .attr('required', 'required');
                    @foreach($questions as $item)
                        if ( '{{ $item->question }}' != question) {
                            select.append($('<option></option>').attr('value', {{ $item->id }}).text('{{ $item->question }}'));
                        }
                    @endforeach
                    select.append($('<option></option>').attr('value', '').text('Finalizar questionário').attr('selected', 'selected'))

                    div = $('<div></div>').addClass('row mb-1');
                    div.append($('<div></div>').addClass('col-6').append(label).append(input));
                    div.append($('<div></div>').addClass('col-5').append(label2).append(select));
                    div.append($('<div></div>').addClass('col-1 mt-3').append($('<button></button>').addClass('remove-button').attr('type', 'button').text('X')));

                    divOptions.append(div);

                });
            });
        </script>
    </x-slot>
</x-app-layout>
