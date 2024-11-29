@section('title', 'Atendimentos')
@push('fonts')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@400;700&display=swap"
        rel="stylesheet">
@endpush

@section('section')
    <div id="main-content" class="container-fluid">
        <div class="container">
            <div class="header-atendimentos d-flex justify-content-between align-items-center mb-4">
                <h2>Atendimentos</h2>
                <button class="btn btn-novo-atendimento" data-bs-toggle="modal" data-bs-target="#novoAtendimentoModal">NOVO
                    ATENDIMENTO</button>
            </div>

            <!-- Filtros -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Busca" id="busca">
                </div>
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="periodoDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            PERÍODO
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="periodoDropdown">
                            <li><a class="dropdown-item" href="#">Hoje</a></li>
                            <li><a class="dropdown-item" href="#">Ontem</a></li>
                            <li><a class="dropdown-item" href="#">Amanhã</a></li>
                            <li><a class="dropdown-item" href="#">Esta semana</a></li>
                            <li><a class="dropdown-item" href="#">Este mês</a></li>
                            <li><a class="dropdown-item" href="#">Mês Anterior</a></li>
                            <li><a class="dropdown-item" href="#">Mês Posterior</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" id="dataInicio" placeholder="Data Início">
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" id="dataFim" placeholder="Data Fim">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-outline-secondary"><i class="bi bi-filter"></i></button>
                    <button class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
                </div>
            </div>

            <!-- Abas de navegação -->
            <ul class="nav nav-tabs mb-3" id="atendimentosTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pendentes-tab" data-bs-toggle="tab" href="#pendentes" role="tab"
                        aria-controls="pendentes" aria-selected="true">PENDENTES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="programados-tab" data-bs-toggle="tab" href="#programados" role="tab"
                        aria-controls="programados" aria-selected="false">PROGRAMADOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="previstos-tab" data-bs-toggle="tab" href="#previstos" role="tab"
                        aria-controls="previstos" aria-selected="false">PREVISTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="nao-concluidos-tab" data-bs-toggle="tab" href="#nao-concluidos" role="tab"
                        aria-controls="nao-concluidos" aria-selected="false">NÃO CONCLUÍDOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="concluidos-tab" data-bs-toggle="tab" href="#concluidos" role="tab"
                        aria-controls="concluidos" aria-selected="false">CONCLUÍDOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="cancelados-tab" data-bs-toggle="tab" href="#cancelados" role="tab"
                        aria-controls="cancelados" aria-selected="false">CANCELADOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="renovacao-tab" data-bs-toggle="tab" href="#renovacao" role="tab"
                        aria-controls="renovacao" aria-selected="false">RENOVAÇÃO</a>
                </li>
            </ul>

            <!-- Conteúdo das abas -->
            <div class="tab-content" id="atendimentosTabContent">
                <!-- Pendentes -->
                <div class="tab-pane fade show active" id="pendentes" role="tabpanel" aria-labelledby="pendentes-tab">
                    <?php
                    $atendimentosPendentes = [];
                    ?>
                    <!-- Tabela de Pendentes -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>ORÇAMENTO</th>
                                <th>O.S</th>
                                <th>DATA</th>
                                <th>CLIENTE</th>
                                <th>SERVIÇO</th>
                                <th>PROFISSIONAL(IS)</th>
                                <th>HORÁRIO</th>
                                <th>VALOR R$</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($atendimentosPendentes as $atendimento): ?>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td><?= $atendimento['orcamento'] ?></td> <!-- ORÇAMENTO -->
                                <td><?= $atendimento['os_numero'] ?></td> <!-- O.S -->
                                <td><?= date('d/m/Y', strtotime($atendimento['data_competencia'])) ?></td> <!-- DATA -->
                                <td><?= $atendimento['cliente_nome'] ?></td> <!-- CLIENTE -->
                                <td>Serviço X</td> <!-- SERVIÇO -->
                                <td><?= $atendimento['profissionais'] ?? 'Não informado' ?></td> <!-- PROFISSIONAL(IS) -->
                                <td><?= $atendimento['horario_inicio'] ?></td> <!-- HORÁRIO -->
                                <td>R$ <?= number_format($atendimento['valor'], 2, ',', '.') ?></td> <!-- VALOR -->
                                <td><button class="btn btn-sm btn-primary">Ação</button></td> <!-- AÇÕES -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Botões de Ação -->
                    <div class="d-flex justify-content-between mt-3">
                        <div>
                            <button class="btn btn-success">CONCLUIR ATENDIMENTOS</button>
                            <button class="btn btn-danger">CANCELAR ATENDIMENTOS</button>
                        </div>
                        <!-- Paginação -->
                        <div>
                            <label for="pagina">Exibir</label>
                            <select id="pagina" class="form-select d-inline-block w-auto">
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                            </select>
                            Página <input type="number" value="1" min="1"
                                class="form-control d-inline-block w-auto"> de 1
                        </div>
                    </div>
                </div>

                <!-- Programados (Placeholder) -->
                <div class="tab-pane fade" id="programados" role="tabpanel" aria-labelledby="programados-tab">
                    <p>Lista de atendimentos programados.</p>
                </div>

                <!-- Previstos -->
                <div class="tab-pane fade" id="previstos" role="tabpanel" aria-labelledby="previstos-tab">
                    <?php
                    $atendimentosPrevistos = [];
                    ?>
                    <!-- Tabela de Previstos -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>ORÇAMENTO</th>
                                <th>O.S</th>
                                <th>DATA</th>
                                <th>CLIENTE</th>
                                <th>SERVIÇO</th>
                                <th>PROFISSIONAL(IS)</th>
                                <th>HORÁRIO</th>
                                <th>VALOR R$</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($atendimentosPrevistos as $atendimento): ?>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td><?= $atendimento['orcamento'] ?></td> <!-- ORÇAMENTO -->
                                <td><?= $atendimento['os_numero'] ?></td> <!-- O.S -->
                                <td><?= date('d/m/Y', strtotime($atendimento['data_competencia'])) ?></td> <!-- DATA -->
                                <td><?= $atendimento['cliente_nome'] ?></td> <!-- CLIENTE -->
                                <td>Serviço X</td> <!-- SERVIÇO -->
                                <td><?= $atendimento['profissionais'] ?? 'Não informado' ?></td> <!-- PROFISSIONAL(IS) -->
                                <td><?= $atendimento['horario_inicio'] ?></td> <!-- HORÁRIO -->
                                <td>R$ <?= number_format($atendimento['valor'], 2, ',', '.') ?></td> <!-- VALOR -->
                                <td><button class="btn btn-sm btn-primary">Ação</button></td> <!-- AÇÕES -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Não Concluídos (Placeholder) -->
                <div class="tab-pane fade" id="nao-concluidos" role="tabpanel" aria-labelledby="nao-concluidos-tab">
                    <p>Lista de atendimentos não concluídos.</p>
                </div>

                <!-- Concluídos (Placeholder) -->
                <div class="tab-pane fade" id="concluidos" role="tabpanel" aria-labelledby="concluidos-tab">
                    <p>Lista de atendimentos concluídos.</p>
                </div>

                <!-- Cancelados (Placeholder) -->
                <div class="tab-pane fade" id="cancelados" role="tabpanel" aria-labelledby="cancelados-tab">
                    <p>Lista de atendimentos cancelados.</p>
                </div>

                <!-- Renovação (Placeholder) -->
                <div class="tab-pane fade" id="renovacao" role="tabpanel" aria-labelledby="renovacao-tab">
                    <p>Lista de atendimentos para renovação.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layout.index')
