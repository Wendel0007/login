@extends('template')
@section('conteudo')

    @if ($tipo_resposta == 'success')
        <div class="container mt-4">
            <div class="row">
                <table class="table text-white">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>ENDERECO</th>
                        <th>CIDADE</th>
                        <th>ESTADO</th>
                        <th>CEP</th>
                        <th>CATEGORIA</th>
                        <th>OPERACOES</th>
                    </tr>
                    @foreach ($usuarios as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->nome }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->endereco }}</td>
                            <td>{{ $u->cidade }}</td>
                            <td>{{ $u->estado }}</td>
                            <td>{{ $u->cep }}</td>
                            <td>{{ $u->categoria->nome }}</td>
                            <td>
                                <a href="{{ route('usuario_editar', ['id' => $u->id]) }}" class="btn btn-warning">Alt</a>
                                <a href="#" onclick="excluir({{ $u->id }})" class="btn btn-danger">Exc</a>

                            </td>
                        </tr>
                    @endforeach
                    <table>
                        <div class="alert alert-{{ $tipo_resposta }} alert-dismissible fade show" role="alert">
                            <strong>{{ $resposta }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('usuario_novo') }}" class="btn btn-success">Adicionar Novo</a>
                            <a href="{{ route('logout') }}" class="btn btn-light">Logout</a>
                        </div>
                        @if (session('mensagem'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('mensagem') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
    @endif
    @if ($tipo_resposta == 'danger')
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
                            <div class="alert alert-{{ $tipo_resposta }} alert-dismissible fade show mt-3" role="alert">
                                <strong>{{ $resposta }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-success mt-4" type="submit">Entrar</button>
                                <a class="btn btn-primary mt-2" href="{{ route('usuario_novo') }}">Cadastrar</a>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center text-white mt-3">Esqueceu sua senha? - <a href="{{ route('usuario_novo') }}">Clique aqui</a></p>
                <div class="small text-center text-muted mt-5">Copyright © 2021 - Onefloat Developer</div>
            </div>
        </div>
    @endif
@endsection
</div>
</div>
<script>
    function excluir(id) {
        if (confirm('Excluir ' + id + '?')) {
            location.href = route('usuario_excluir', {
                id: id
            });
        }
    }

</script>
