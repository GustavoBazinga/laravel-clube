<div class="modal fade" id="{{ $modalID }}" tabindex="-1" aria-labelledby="{{ $modalID }}" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">{{ $modalTitle }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <x-crud.create>
                    <x-slot name="route">
                        {{ $route }}
                    </x-slot>
                    <x-slot name="form">
                        {{ $form }}
                    </x-slot>
                </x-crud.create>
            </div>
            <div class="modal-footer">
                <x-secondary-button type="button" data-bs-dismiss="modal">
                    Fechar
                </x-secondary-button>
                
            </div>
        </div>
    </div>
</div>
