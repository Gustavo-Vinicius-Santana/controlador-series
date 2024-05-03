<x-layout title="Tela de usuario">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Acesso ao Sistema
                    </div>
                    <div class="card-body text-center">
                        <a href="{{ route('logout') }}" class="btn btn-danger btn-lg btn-block">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>