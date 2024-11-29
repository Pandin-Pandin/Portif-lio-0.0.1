@section('title', 'Login')
@push('fonts')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@300;500&display=swap"
        rel="stylesheet">
@endpush
@section('section')
    <div class="container-fluid">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center vh-100">
                <div class="login-container text-center">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Empresa" class="img-fluid mb-4" width="150">

                    <form method="POST" action="/auth" class="login-form p-4 bg-white rounded shadow">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">ENTRAR</button>
                        <a href="#" class="d-block mt-3 text-decoration-none text-secondary">ESQUECI MINHA SENHA</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layout.index')