@extends('layout')

@section('conteudo')
<div class="container-fluid">
    <div class="row ml-3 mr-3">
        <div class="col-5">
            <div class="mb-3 bg-dark p-2 pl-3">
                <h3 class="text-light">SMS</h3>

            </div>


            <div class="row">
                <canvas class="col-12 flex-fill chartSms1" id="chartSms1" ></canvas>
            </div>

            <div class="d-flex justify-content-around mt-3 p-2">
                <div class="d-flex flex-column text-center">
                    <p class="m-0">CONTRATADO</p>
                    <p class="text-success m-0">{{ $sms_credits}}</p>
                </div>
                <div class="d-flex flex-column text-center">
                    <p class="m-0">UTILIZADO</p>
                    <p class="text-primary m-0">{{ $requests_quantity}}</p>
                </div>
                <div class="d-flex flex-column text-center">
                    <p class="m-0">EXTRAS</p>
                    <p class="text-danger m-0">{{ $extras}}</p>
                </div>
            </div>

            <div class="table mt-3 ml-2">
                <table>
                    <thead class="thead-light">
                    <tr>
                        <th scope="col"><h4>Resumo do Plano Pacote SMS</h4></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Nome do Plano</th>
                        <td>APP20</td>
                    </tr>

                    <tr>
                        <td scope="row">Valor Mensal</td>
                        <td>R$ 500,00</td>
                    </tr>

                    <tr>
                        <td scope="row">Valor por Mensagem</td>
                        <td>R$ 0,10</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="px-3 py-2 mt-5">
                <div class="mb-3 bg-dark p-2 pl-3">
                    <h3 class="text-light">Números Diários de SMS</h3>
                </div>

                <div class="row">
                    <canvas class="col-12 flex-fill chart" id="numDiarioSms" ></canvas>
                </div>

                <div class="text-center mt-3 p-2">
                    <h4>Uso médio diário de SMS: 8</h4>
                </div>
            </div>
        </div>

        <div class="col-5 offset-1">
            <div class="mb-3 bg-dark p-2 pl-3">
                <h3 class="text-light">Chamadas Excedentes</h3>
            </div>

            <div class="row">
                <canvas class="col-12 flex-fill chart" id="chamadasExcedentes" ></canvas>
            </div>

            <div class="d-flex justify-content-around mt-3 p-2">
                <div class="d-flex flex-column text-center">
                    <p class="m-0">CONTRATADO</p>
                    <p class="text-primary m-0">3000</p>
                </div>
                <div class="d-flex flex-column text-center">
                    <p class="m-0">UTILIZADO</p>
                    <p class="text-success m-0">1500</p>
                </div>
                <div class="d-flex flex-column text-center">
                    <p class="m-0">EXTRAS</p>
                    <p class="text-danger m-0">0</p>
                </div>
            </div>

            <div class="table mt-3 ml-2">
                <table>
                    <thead class="thead-light">
                    <tr>
                        <th scope="col"><h4>Resumo do Plano Pacote Chamadas</h4></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Nome do Plano</th>
                        <td>APP21</td>
                    </tr>

                    <tr>
                        <th scope="row">Valor Mensal</th>
                        <td>R$ 450,00</td>
                    </tr>

                    <tr>
                        <th scope="row">Valor por Mensagem</th>
                        <td>R$ 0,10</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="px-3 py-2 mt-5">
                <div class="mb-3 bg-dark p-2 pl-3">
                    <h3 class="text-light">Números de Chamadas Diárias</h3>
                </div>

                <div class="row">
                    <canvas class="col-12 flex-fill chart" id="numDiarioChamadas" ></canvas>
                </div>

                <div class="text-center mt-3 p-2">
                    <h4>Média de chamadas diárias: 8</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="page-footer bg-dark font-small ">

    <div class="footer-copyright text-center  py-3">© 2020 Copyright:
        <a class="link-site" href="https://d2msystem.com/"> D2Msystem.com</a>
    </div>

@endsection





