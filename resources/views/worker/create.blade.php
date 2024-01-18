<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Criação de Funcionário
        </h2>
    </x-slot>
    
    <x-crud.create>
        <x-slot name="route">
            {{ route('workers.store') }}
        </x-slot>
        <x-slot name="form">
            <div class="row">
                <div class="col">
                    <x-input-label>
                        Nome do Funcionário
                    </x-input-label>
                    <x-text-input style="width:100%" id="name" name="name" label="Name"/>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <x-input-label>
                        Matrícula
                    </x-input-label>
                    <x-text-input style="width:100%" id="register" name="register" label="Register"/>
                </div>
                <div class="col-6">
                    <x-input-label>
                        CPF
                    </x-input-label>
                    <x-text-input style="width:100%" id="cpf" name="cpf" label="CPF"/>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <x-input-label>
                        Data de Admissão
                    </x-input-label>
                    <x-text-input type="date" style="width:100%" id="admission_date" name="admission_date" label="Admission Date"/>
                </div>
                <div class="col-4">
                    <x-input-label>
                        Telefone
                    </x-input-label>
                    <x-text-input style="width:100%" id="telephone" name="telephone" label="Telephone"/>
                </div>
                <div class="col-4">
                    <x-input-label>
                        E-mail
                    </x-input-label>
                    <x-text-input style="width:100%" id="email" name="email" label="Email"/>
                </div>
            </div>
        </x-slot> 
    </x-crud.create>
</x-app-layout>
