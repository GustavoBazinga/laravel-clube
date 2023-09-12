<div class="modal fade" id="modalStatusWindow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <x-input-label class="label-options">
                            Nome da Requisição:
                        </x-input-label>
                        <x-text-input style="width: 100%;" id="modalName" name="name" placeholder="Nome" />
                        
                    </div>
                    <div class="col-6">
                        <x-input-label class="label-options">
                            Número Requisitante:
                        </x-input-label>
                        <x-text-input  style="width: 100%; background-color: #ccc; color: #999; cursor: not-allowed; opacity: 0.6;" id="modalNumber" name="number" placeholder="Número" />
                        
                    </div>
                </div>
                <div class="row mt-2">
                   <div id="column-1" class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <x-input-label class="label-options">
                                    Status Atual:
                                </x-input-label>
                                <x-select-input id="modalStatus" style="width:100%" name='newStatus' label="Type" >
                                    @foreach($options as $item)
                                        <option value="{{ $loop->iteration }}">{{ $item }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <x-input-label class="label-options">
                                    Mensagem
                                </x-input-label>
                                <textarea rows="4" style="width:100%" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="message" id="modalMessage" placeholder="Digite aqui a mensagem de atualização que será enviada para o requisitante no momento da atualização"></textarea>
                            </div>
                        </div>
                   </div>
                   <div id="column-2" class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <x-input-label class="label-options">
                                    Natureza:
                                </x-input-label>
                                <x-text-input style="width: 100%;" id="modalArea" name="area" placeholder="Natureza" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <x-input-label class="label-options">
                                    Tipo:
                                </x-input-label>
                                <x-text-input style="width: 100%;" id="modalType" name="type" placeholder="Tipo" />
                            </div>
                        </div>

                   </div>
               
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
