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
                        <td>{{$provedor_name}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Valor Contratado</td>
                        <td>{{$price_plan}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-5 offset-1">
            <div class="mb-3 bg-dark p-2 pl-3">
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





