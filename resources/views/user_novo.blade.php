@extends('template')

@section('conteudo')
    <div class="container-fluid">
        <div class="row align-content-center row_1">
            <div class="text-center mb-4">
                <a href="https://www.onefloat.com.br" target="_blank">
                    <img class="img-fluid" src="{{ URL::asset('img\img\logo_onefloat_vert_white.png') }}"
                        alt="logo onefloat">
                </a>
            </div>
            <div class="card rounded-3 card_1">
                <div class="card-body">
                    <div class="display-6 text-center mb-4">Novo Usuario</div>
                    <form method="POST" action="{{ route('usuario_inserir') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="f_nome" placeholder="name@example.com">
                            <label for="f_nome">Nome</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="f_email"
                                placeholder="name@example.com">
                            <label for="f_email">Email</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="senha" class="form-control" id="f_senha" placeholder="Password">
                            <label for="f_senha">Senha</label>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto mt-4">
                        <input type="submit" class="btn btn-success" value="cadastrar">
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center text-white mt-3">Já tem um acesso? - <a href="">Clique aqui</a></p>
            <div class="small text-center text-muted mt-5">Copyright © 2021 - Onefloat Developer</div>
        </div>
    </div>
@endsection('conteudo')
