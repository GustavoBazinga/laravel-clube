<div class="row">
    <div class="col-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control sportName" id="" name="name" placeholder="Nome do esporte">
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control sportDescription" style="height:150px" name="description" placeholder="Descrição" rows="1" id=""></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="mb-3">
            <x-input-label>
                Imagem
            </x-input-label>
            <img src="" alt="Imagem do esporte" id="previewImage" class="img-fluid previewImage">
            <input class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control sportImage" id="sportImage" type="file" name="image" placeholder="image">
        </div>
    </div>
    <div class="col-2"></div>
</div>
<input type="hidden" id="sportId" name="id">