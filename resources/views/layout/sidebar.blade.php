<div id="sidebar" class="bg-white vh-100 p-3">
    <!-- Ícone de fechar (X) dentro do menu -->
    <div class="d-flex justify-content-end mb-4">
        <button id="close-btn" class="btn text-dark">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <!-- Logo -->
    <div class="text-center mb-4">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Empresa" class="img-fluid logo">
    </div>

    <!-- Menu -->
    <ul class="nav flex-column">
        <!-- Dashboard -->
        <li class="nav-item">
            <a href="index.php" class="nav-link text-dark d-flex align-items-center">
                <i class="bi bi-house-door-fill me-4"></i> Dashboard
            </a>
        </li>

        <!-- Atendimentos -->
        <li class="nav-item">
            <a href="{{route('atendimentos')}}" class="nav-link text-dark d-flex align-items-center">
                <i class="bi bi-person-fill me-4"></i> Atendimentos
            </a>
        </li>

        <!-- Orçamentos -->
        <li class="nav-item">
            <a href="orcamentos.php" class="nav-link text-dark d-flex align-items-center">
                <i class="bi bi-file-earmark-text me-4"></i> Orçamentos
            </a>
        </li>

        <!-- Contratos -->
        <li class="nav-item">
            <a href="contratos.php" class="nav-link text-dark d-flex align-items-center">
                <i class="bi bi-briefcase-fill me-4"></i> Contratos
            </a>
        </li>

        <!-- Financeiro (submenu) -->
        <li class="nav-item">
            <a href="#submenuFinanceiro" class="nav-link text-dark d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" aria-expanded="false">
                <i class="bi bi-wallet-fill me-4"></i> Financeiro <span class="bi bi-chevron-down"></span>
            </a>
            <ul class="collapse nav flex-column ms-3" id="submenuFinanceiro">
                <li class="nav-item"><a href="cobranca.php" class="nav-link text-dark">Cobrança</a></li>
                <li class="nav-item"><a href="movimentacao.php" class="nav-link text-dark">Movimentação</a></li>
                <li class="nav-item"><a href="repasse.php" class="nav-link text-dark">Repasse</a></li>
            </ul>
        </li>

        <!-- Clientes -->
        <li class="nav-item">
            <a href="clientes.php" class="nav-link text-dark d-flex align-items-center">
                <i class="bi bi-people-fill me-4"></i> Clientes
            </a>
        </li>

        <!-- Pessoas (submenu) -->
        <li class="nav-item">
            <a href="#submenuPessoas" class="nav-link text-dark d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" aria-expanded="false">
                <i class="bi bi-person-circle me-4"></i> Pessoas <span class="bi bi-chevron-down"></span>
            </a>
            <ul class="collapse nav flex-column ms-3" id="submenuPessoas">
                <li class="nav-item"><a href="profissionais.php" class="nav-link text-dark">Profissionais</a></li>
                <li class="nav-item"><a href="recrutamento.php" class="nav-link text-dark">Recrutamento</a></li>
            </ul>
        </li>

        <!-- Configurações (submenu) -->
        <li class="nav-item">
            <a href="#submenuConfiguracoes" class="nav-link text-dark d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" aria-expanded="false">
                <i class="bi bi-gear-fill me-4"></i> Configurações <span class="bi bi-chevron-down"></span>
            </a>
            <ul class="collapse nav flex-column ms-3" id="submenuConfiguracoes">
                <li class="nav-item"><a href="campanhas.php" class="nav-link text-dark">Campanhas</a></li>
                <li class="nav-item"><a href="categorias.php" class="nav-link text-dark">Categorias</a></li>
                <li class="nav-item"><a href="contadigital.php" class="nav-link text-dark">Conta Digital</a></li>
                <li class="nav-item"><a href="contasbancarias.php" class="nav-link text-dark">Contas Bancárias</a></li>
                <li class="nav-item"><a href="cupons.php" class="nav-link text-dark">Cupons de Desconto</a></li>
                <li class="nav-item"><a href="feriados.php" class="nav-link text-dark">Feriados</a></li>
                <li class="nav-item"><a href="parametros.php" class="nav-link text-dark">Parâmetros</a></li>
                <li class="nav-item"><a href="permissoes.php" class="nav-link text-dark">Permissões</a></li>
                <li class="nav-item"><a href="portfolioservicos.php" class="nav-link text-dark">Portfólio de
                        Serviços</a></li>
                <li class="nav-item"><a href="servicossite.php" class="nav-link text-dark">Serviços para o Site</a>
                </li>
                <li class="nav-item"><a href="usuario.php" class="nav-link text-dark">Usuário</a></li>
            </ul>
        </li>

        <!-- Relatórios -->
        <li class="nav-item">
            <a href="relatorios.php" class="nav-link text-dark d-flex align-items-center">
                <i class="bi bi-clipboard-data-fill me-4"></i> Relatórios
            </a>
        </li>
    </ul>
</div>
<div id="overlay" class="overlay" style="display: none;"></div>

@push('scripts')
    <script>
        // Seleção dos elementos
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');
        const overlay = document.getElementById('overlay');
        const mainContent = document.getElementById('main-content');
        const closeBtn = document.getElementById('close-btn'); // Ícone de fechar (X)

        // Função para alternar a visibilidade do menu
        menuToggle.addEventListener('click', function() {
            if (sidebar.style.transform === 'translateX(0px)') {
                // Fechar o menu
                sidebar.style.transform = 'translateX(-250px)';
                overlay.style.display = 'none'; // Esconde o overlay
                mainContent.classList.remove('shifted');
            } else {
                // Abrir o menu
                sidebar.style.transform = 'translateX(0)';
                overlay.style.display = 'block'; // Exibe o overlay
                mainContent.classList.add('shifted');
            }
        });

        // Fechar o menu ao clicar no overlay
        overlay.addEventListener('click', function() {
            sidebar.style.transform = 'translateX(-250px)';
            overlay.style.display = 'none'; // Esconde o overlay
            mainContent.classList.remove('shifted');
        });

        // Fechar o menu ao clicar no "X" dentro do menu
        closeBtn.addEventListener('click', function() {
            sidebar.style.transform = 'translateX(-250px)';
            overlay.style.display = 'none'; // Esconde o overlay
            mainContent.classList.remove('shifted');
        });
    </script>
@endpush
