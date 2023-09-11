<div class="modal fade" id="modalStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStatusTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <x-input-label class="label-options">
                        Status Atual:
                    </x-input-label>
                    <x-select-input id="modalStatusSelect" style="width:100%" name='newStatus' label="Type" >
                        @foreach($status as $item)
                            <option value="{{ $loop->iteration }}">{{ $item }}</option>
                        @endforeach          
                    </x-select-input>
                </div>
                <div class="row">
                    <x-input-label class="label-options">
                        Mensagem
                    </x-input-label>
                    <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="message" id="modalStatusMessage"></textarea>
                    <div id="captionSelect" class="form-text"></div>
                </div>
            </div>
            <div class="modal-footer">
                <x-secondary-button type="button" data-bs-dismiss="modal">
                    Fechar
                </x-secondary-button>
                <x-primary-button id="modalStatusButton" type="button">
                    Salvar
                </x-primary-button>
            </div>
        </div>
    </div>
</div>
