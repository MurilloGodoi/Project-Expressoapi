@extends('layout')
@section('conteudo')
    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container-fluid">

    <div class="row ml-3 mr-3">

        <div class="col-5">
            <div class="mb-3 bg-dark p-2 pl-3">
                <h3 class="text-light">Adicione um provedor</h3>
            </div>
            <form method="post">
                @csrf
                <select class="custom-select custom-select-lg mb-3" name="id">
                    <option  selected value="1"> JAMEF</option>
                    <option  value="2">RTE</option>
                    <option  value="3">GBC</option>
                    <option  value="4">ABC</option>
                </select>
                <div class="form-group"><input class="form-control" type="Email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="Password" name="password" placeholder="Password"></div>
                <div class="bota-adicionar">
                    <button class="btn btn-primary" type="submit">ADICIONAR</button>
                </div>
            </form>
        </div>

        @if(!empty($apiname))
        <div class="col-5 offset-1">
            <div class="mb-3 bg-dark p-2 pl-3">
                <h3 class="text-light">Seus Provedores</h3>
            </div>
            <div class="table mt-3 ml-0">
                <table>
                    <thead class="thead-light">
                    <tr>
                        <th scope="col"><h6>Provedores</h6></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$apiname}}</th>
                        <td>
                            <form method="post" id="excluir" onsubmit="return confirm('Deseja realmente excluir o provedor {{$apiname}}?')">
                                @method('DELETE')
                                @csrf
                            <button type="submit" form="excluir" type="button" class="btn btn-outline-primary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                </svg>
                            </button>
                            </form>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
        @endif
    </div>
</div>

<footer class="page-footer bg-dark font-small blue">
    <div class="footer-copyright text-center  py-3">© 2020 Copyright:
        <a class="link-site" href="https://d2msystem.com/"> D2Msystem.com</a>
    </div>
</footer>

@endsection




