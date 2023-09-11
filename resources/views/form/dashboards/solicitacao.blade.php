<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard {{ $form->title }}
        </h2>
    </x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/form/dashboard.css') }}">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
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
                            <div class="col-5">
                                <x-primary-button id="findDataDash" type="button">Buscar</x-primary-button>
                                <x-primary-button id="exportDataDash" type="button">Exportar</x-primary-button>
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
                                                    <td class="dash-data-num text-center"><span id="totalDoneByPeriod">0</span></td>
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
                                            <canvas style="height: 165%" id="requestsByAreaByPeriod"></canvas>
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
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const dataInicioInput = document.getElementById('dataInicioInput');
            const dataFinalInput = document.getElementById('dataFinalInput');
            let buttonFind = document.querySelector('#findDataDash');

            buttonFind.addEventListener('click', () => {
                fetch(`http://192.168.100.20/api/dashboard/{{ $form->id }}/${dataInicioInput.value}/${dataFinalInput.value}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById('dataInicio').innerHTML = (dataInicioInput.value).split('-').reverse().join('/');
                    document.getElementById('dataFinal').innerHTML = (dataFinalInput.value).split('-').reverse().join('/');
                    document.getElementById('totalRequest').innerHTML = data.total;
                    document.getElementById('totalRequestByPeriod').innerHTML = data.totalByPeriod;
                    document.getElementById('totalDone').innerHTML = data.totalDone;
                    document.getElementById('totalDoneByPeriod').innerHTML = data.totalDoneByPeriod;
                    document.getElementById('inProgress').innerHTML = data.totalInProgress;
                    document.getElementById('open').innerHTML = data.totalOpen;

                    const ctx = document.getElementById('requestsByMonth');

                    config1 = {
                        type: 'bar',
                        data: {
                            labels: Object.keys(data.totalByMonth),
                            datasets: [{
                            label: 'Requisições',
                            data: Object.values(data.totalByMonth),
                            borderWidth: 1,
                            }]
                        },
                        options:{
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    }

                    window.myChart ? window.myChart.destroy() : null;
                    window.myChart = new Chart(ctx, config1);

                    const ctx2 = document.getElementById('requestsByAreaByPeriod');

                    config2 = {
                        type: 'bar',
                        data: {
                            labels: Object.keys(data.totalByArea),
                            datasets: [{
                            label: 'Requisições',
                            data: Object.values(data.totalByArea),
                            borderWidth: 1,
                            }]
                        },
                        options:{
                            responsive: true,
                            maintainAspectRatio: false,
                            indexAxis: 'y',
                        }
                    }

                    window.myChart2 ? window.myChart2.destroy() : null;
                    window.myChart2 = new Chart(ctx2, config2);

                    const ctx3 = document.getElementById('requestsByType');

                    config3 = {
                        type: 'bar',
                        data: {
                            labels: Object.keys(data.totalByType),
                            datasets: [{
                            label: 'Requisições',
                            data: Object.values(data.totalByType),
                            borderWidth: 1,
                            }]
                        },
                        options:{
                            responsive: true,
                            maintainAspectRatio: false,
                            indexAxis: 'y',
                        }
                    }

                    window.myChart3 ? window.myChart3.destroy() : null;
                    window.myChart3 = new Chart(ctx3, config3);
                    
                });
            });

            let buttonExport = document.querySelector('#exportDataDash');

            buttonExport.addEventListener('click', () => {
                const dashboard = document.getElementById('dashboard');
                html2canvas(dashboard).then(canvas => {
                    const imgData = canvas.toDataURL('image/png');
                    const pdf = new jsPDF("l", "mm", "a4");
                    pdf.addImage(imgData, 'PNG', 0, 0, 297, 210);
                    pdf.save("download.pdf");
                });
            });

            

            


</script>

    </x-slot>
</x-app-layout>
