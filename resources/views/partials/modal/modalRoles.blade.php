<div class="modal fade" id="modalRoles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        
        <div class="modal-content">
            <form action="{{ route('roles.update') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Funções</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">

                    <x-crud.crud-buttons :routeCreate="route('roles.create')"></x-crud.crud-buttons>

                    <div class="row row-Role">
                        <div id="role" class="col-4">

                        </div>
                        <div id="hour" class="col-4">

                        </div>
                        <div id="cash" class="col-4">

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <x-secondary-button data-bs-dismiss="modal" value="Close">Fechar</x-secondary-button>
                    <x-primary-button id="btnSave" value="Save">Salvar</x-primary-button> 
                </div>
            </form>
        </div>
    </div>
</div>
