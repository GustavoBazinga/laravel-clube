<div class="row">
    <div class="col-6">
        <div class="mb-3">
            <x-input-label>
                Esporte
            </x-input-label>
            <img src="" alt="Imagem do esporte" id="" class="img-fluid previewImageSport py-3">
            <x-select-input name='sport_id' style="width: 100%" class="selectSport" id="" required>                                         
                
            </x-select-input>
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <x-input-label>
                Professor
            </x-input-label>
            <img src="" alt="Imagem do professor" id="" class="img-fluid previewImageProfessor py-3">
            <x-select-input name='professor_id' style="width: 100%" class="selectProfessor" id="" required>                                         
                
            </x-select-input>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-3">
        <div class="mb-3">
            <label for="day" class="form-label">Dia</label>
                @php
                    $days = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
                @endphp                                          
                @foreach ($days as $day)
                    <div class="form-check">
                        <input class="form-check-input dayClass" type="checkbox" name="days[]" id="{{ $day }}" value="{{ $day }}">
                        <label class="form-check-label" for="{{ $day }}">
                            {{ $day }}
                        </label>
                    </div>
                @endforeach
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="hour" class="form-label">Horário</label>
            <input required type="time" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control hourClass" id="" name="hour" placeholder="Horário">
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="hour" class="form-label">Vagas</label>
            <input required type="number" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control slotsClass" id="" name="slots" placeholder="Vagas">
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="price" class="form-label">Preço</label>
            <input required type="number" step="0.01" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control priceClass" id="" name="price" placeholder="Preço">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nome da Turma</label>
            <input required type="text" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control nameClass" id="" name="name" placeholder="Nome da turma">
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea required class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control descriptionClass" style="height:150px" name="description" placeholder="Descrição" rows="1" id=""></textarea>
        </div>
    </div>
</div>
<input type="hidden" id="sportId" name="originalClass" class="originalClass">