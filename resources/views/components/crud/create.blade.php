<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form">
                        {{ $form }}
                    </div>
                    
                    <div class="row mt-2">
                        <div class="col">
                            <x-primary-button type="submit">
                                Salvar
                            </x-primary-button>
                            {{ $deleteButton ?? null }}
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
