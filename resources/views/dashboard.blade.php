@extends('layouts.layout')

@section('conteudo')
<div class="container-fluid">
    <div class="row ml-3 mr-3">
        <div class="col-5">
            <div class="mb-3 bg-dark p-2 pl-3">
                <h3 class="text-light">Consumo de Chamadas</h3>
            </div>
            @include('charts.chartdoughnut')
            <div class="d-flex justify-content-around mt-3 p-2 bg-light">
                <div class="d-flex flex-column text-center">
                    <p class="m-0">CONTRATADO</p>
                    <p class="text-success m-0">{{ $requests_quantity}}</p>
                </div>
                <div class="d-flex flex-column text-center">
                    <p class="m-0">UTILIZADO</p>
                    <p class="text-warning m-0">{{ $requests_consumed}}</p>
                </div>
                <div class="d-flex flex-column text-center">
                    <p class="m-0">DISPONÍVEL</p>
                    <p class="text-primary m-0">{{ $requests_available}}</p>
                </div>
                <div class="d-flex flex-column text-center">
                    <p class="m-0">ULTRAPASSADO</p>
                    <p class="text-danger m-0">{{ $extras}}</p>
                </div>
            </div>

            <br>
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col"><h4>Resumo do Plano Contratado</h4></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Nome do Provedor</th>
                        <td>JAMEF</td>
                    </tr>
                    <tr>
                        <td scope="row">Valor Contratado</td>
                        <td>R$ 500,00</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="col-5 offset-1">
            <div class="mb-3 bg-dark p-2 pl-3">
                <h3 class="text-light">Detalhes do Meu Plano</h3>
            </div>

            <form class="data" method="post">
                @csrf
                <h5 style="margin-left: 30px">Mês/Ano</h5>
                <input style="width: 200px" id="date" type="month" name="mes">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>

            <div class="table-responsive">
                <table class="table">

                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" scope="col">Provedor</th>
                            <th class="text-center" scope="col">Contratado</th>
                            <th class="text-center" scope="col">Utilizado</th>
                            <th class="text-center" scope="col">Disponível</th>
                            <th class="text-center" scope="col">Ultrapassado</th>
                            <th class="text-center" scope="col">Valor Mensal</th>
                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <th class="text-center">JAMEF</th>
                        <td class="text-center">100</td>
                        <td class="text-center">300</td>
                        <td class="text-center">500</td>
                        <td class="text-center">700</td>
                        <td class="text-center">1000</td>
                    </tr>
                </tbody>
            </table>
            </div>

            <div class="mb-3 bg-dark p-2 pl-3 mt-4">
                <h3 class="text-light">Chamadas Diáras Nos Últimos 7 Dias</h3>
            </div>

            @include('charts.chartbarra')

            <div class="text-center mt-3 p-2 bg-light">
                <h4>Uso médio diário: <b>{{ $daily_usage_mean }}</b></h4>
            </div>
        </div>
    </div>
</div>
@endsection





