<div class="row">
    <div class="col-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control professorName" id="" name="name" placeholder="Nome do esporte">
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="telephone" class="form-label">Telefone</label>
            <input type="text" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control professorTelephone" id="" name="telephone" placeholder="Telefone">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control professorEmail" id="" name="email" placeholder="Email">
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="more" class="form-label">Outros</label>
            <textarea class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control professorMore" style="height:150px" name="more" placeholder="Outras informações" rows="1" id=""></textarea>
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
            <img src="" alt="Imagem do Professor" id="previewImage" class="img-fluid previewImage">
            <input class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control professorImage" id="professorImage" type="file" name="image" placeholder="image">
        </div>
    </div>
    <div class="col-2"></div>
</div>
<input type="hidden" id="professorId" name="id">