{{ $deleteButton ?? null }}
<form id="{{ $idForm ?? null }}" action="{{ $route }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method ?? 'PATCH')
    <div class="form">
        {{ $form }}
    </div>
    
    <div class="row mt-2">
        <div class="col">
            <x-primary-button type="submit">
                Salvar
            </x-primary-button>
            
        </div>

    </div>
</form>

