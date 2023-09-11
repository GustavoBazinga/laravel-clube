<div class="p-6 question-container">
    <div class="row mt-4">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <x-input-label  label="Título" name="title">Data Início</x-text-label>
                    <input id="dataInicioInput" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="date" name="" id="">
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <x-input-label  label="Descrição" name="description">Data Final</x-text-label>
                <input id="dataFinalInput" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="date" name="" id="">
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-2">
            <x-primary-button type="button">Buscar</x-primary-button>
        </div>
    </div>
    <div id="dashboard" class="row mt-2 border-top text-center">
        <div class="row mt-4 text-center">
            <div id="periodo" class="col-sm-3 col-12">
                <h3><strong>Período:</strong></h3> 
                <span id="dataInicio"></span> - <span id="dataFinal"></span>
            </div>
            <div class="col-sm-9 col-12">
                <strong>Evolução das Requisições</strong>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Total de Requisições</th>
                                <th>Total de Requisições por Período</th>
                                <th>Concluídas</th>
                                <th>Concluídas por Período</th>
                                <th>Em andamento</th>
                                <th>Em aberto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="dash-data-num text-center"><span id="totalRequest">0</span></td>
                                <td class="dash-data-num text-center"><span id="totalRequestByPeriod">0</span></td>
                                <td class="dash-data-num text-center"><span id="totalDone">0</span></td>
                                <td class="dash-data-num text-center"><span id="totalDoneByPerior">0</span></td>
                                <td class="dash-data-num text-center"><span id="inProgress">0</span></td>
                                <td class="dash-data-num text-center"><span id="open">0</span></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <div class="row my-3 border-bottom">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <strong>Requisições por Recebidas</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <canvas id="requestsByMonth"></canvas>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <strong>Requisições por Natureza por Período</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <canvas style="height: 165%" id="requestsByOriginByPeriod"></canvas>
                </div>
            </div>

        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <strong>Requisições por Tipo</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <canvas style="height: 165%" id="requestsByType"></canvas>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-12">
                <strong>Requisições por Setor</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <canvas id="requestsBySector"></canvas>
            </div>
        </div>
    </div>
    </div>
</div>