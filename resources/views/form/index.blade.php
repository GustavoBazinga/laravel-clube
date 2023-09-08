<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <ul class="list-group">
                        @foreach($forms as $form)
                            <a href="{{ route('forms.edit', $form->id)  }}" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">{{ $form->title  }}</a>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
