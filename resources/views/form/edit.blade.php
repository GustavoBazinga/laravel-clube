<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $form->title }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                        <form action="{{ route('forms.update', $form->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <x-input-label>
                                        Título do Formulário
                                    </x-input-label>
                                    <x-text-input style="width:100%" id="title" name="title" label="Title" value="{{ $form->title }}" />
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <x-primary-button type="submit">
                                        Salvar
                                    </x-primary-button>
                                </div>
                        </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
