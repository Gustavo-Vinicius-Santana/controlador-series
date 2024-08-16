<x-layout title="Tela de login">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Cadastro</div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Digite o seu nome">
                        </div>

                        <div class="form-group mt-2">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
                        </div>

                        <div class="form-group mt-2">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha">
                        </div>

                        <div class="container d-flex justify-content-center align-items-center mt-4">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>

                        <div class="mt-3 d-flex justify-content-end">
                            <a href="{{ route('login') }}">faça o login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>