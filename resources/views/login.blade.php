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
                    <div class="display-6 text-center mb-4">Entrar</div>
                    <form class="text-center" action="/tenta_login" method="POST">
                        @csrf
                        <div class="form-floating mb-3 div_form">
                            <input type="email" name="email" class="form-control" placeholder="name@example.com"
                                id="email_user" />
                            <label for="email_user">Adicione seu e-mail</label>
                        </div>
                        <div class="form-floating div_form">
                            <input type="password" name="senha" class="form-control" placeholder="Password"
                                id="senha_user" />
                            <label for="senha_user">Adicione sua senha</label>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-success mt-4" type="submit">Entrar</button>
                            <a class="btn btn-primary mt-2" href="{{ route('usuario_novo') }}">Cadastrar</a>
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center text-white mt-3">Esqueceu sua senha? - <a href="">Clique aqui</a></p>
            <div class="small text-center text-muted mt-5">Copyright © 2021 - Onefloat Developer</div>
        </div>
    </div>

@endsection
