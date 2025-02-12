<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {

    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    /**Exibir a mensagem */
    if ($tipo == 'sucesso') {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> ' . $mensagem . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } elseif ($tipo == 'erro') {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro!</strong> ' . $mensagem . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }

    /** Limpe as variáveis de sessão */
    unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']);
}


?>
<div class="navTool">
    <a href="http://localhost/kioficina/public/cliente/adicionar">ADICIONAR</a>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Documento</th>
            <th scope="col">email_cliente</th>
            <th scope="col">telefone_cliente</th>
            <th scope="col">cidade_cliente</th>
            <th scope="col">bairro_cliente</th>
            <th scope="col">Editar</th>
            <th scope="col">Desativar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listarCliente as $linha): ?>
            <tr>
                <td>
                    <img src="<?php
                                $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $linha['foto_cliente'];
                                if ($linha['foto_cliente'] != "") {
                                    if (file_exists($caminhoArquivo)) {
                                        echo ("http://localhost/kioficina/public/uploads/" . htmlspecialchars($linha['foto_cliente'], ENT_QUOTES, 'UTF-8'));
                                    } else {
                                        echo ("http://localhost/kioficina/public/uploads/cliente/sem-foto-cliente.png");
                                    }
                                } else {
                                    echo ("http://localhost/kioficina/public/uploads/cliente/sem-foto-cliente.png");
                                } ?>"
                        alt="<?php echo htmlspecialchars($linha['alt_foto_cliente'], ENT_QUOTES, 'UTF-8'); ?>" id="preview-img" onclick="abrirModalPerfil(<?php echo $linha['id_cliente']; ?>)" style="cursor:pointer;">
                </td>
                <td><?php echo $linha['nome_cliente'] ?></td>
                <td><?php echo $linha['cpf_cnpj_cliente'] ?></td>
                <td><?php echo $linha['email_cliente'] ?></td>
                <td><?php echo $linha['telefone_cliente'] ?></td>
                <td><?php echo $linha['cidade_cliente'] ?></td>
                <td><?php echo $linha['bairro_cliente'] ?></td>
                <td><a href="http://localhost/kioficina/public/cliente/editar/<?php echo $linha['id_cliente'] ?>"><i class="bi bi-pencil"></i></a></td>
                <td><a href="#"><i class="bi bi-trash"></i></a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="modal" id="modalPerfil" tabindex="-1" aria-labelledby="modalPerfilLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPerfilLabel">Perfil de usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Coluna da Imagem -->
                    <div class="col-md-4 text-center">
                        <label for="imagem_cliente">
                            <img id="preview-img" style="width:100%; cursor:pointer;"
                                title="Clique na imagem para selecionar uma foto de cliente"
                                src="http://localhost/kioficina/public/uploads/cliente/sem-foto-cliente.png"
                                alt="">
                        </label>
                        <input type="file" id="imagem_cliente" name="imagem_cliente" accept="image/*" class="form-control d-none">
                    </div>

                    <!-- Coluna do Formulário -->
                    <div class="col-md-8">
                        <!-- Nome -->
                        <div class="mb-3">
                            <label class="form-label">Nome do Cliente</label>
                            <input type="text" class="form-control" name="nome_cliente" value="" required>
                        </div>

                        <!-- Data Nascimento -->
                        <div class="mb-3">
                            <label class="form-label">Data de Nascimento</label>
                            <input type="text" class="form-control" name="data_nasc_cliente" value="" required>
                        </div>

                        <!-- Tipo Cliente -->
                        <div class="mb-3">
                            <label class="form-label">Tipo Cliente</label>
                            <select class="form-select" name="tipo_cliente" required>
                                <option selected disabled>Selecione o tipo</option>
                                <option value="<?= htmlspecialchars('Pessoa Jurídica', ENT_QUOTES, 'UTF-8') ?>">Pessoa Jurídica</option>
                                <option value="<?= htmlspecialchars('Pessoa Física', ENT_QUOTES, 'UTF-8') ?>">Pessoa Física</option>
                            </select>
                        </div>

                        <!-- CPF/CNPJ -->
                        <div class="mb-3">
                            <label class="form-label">CPF ou CNPJ</label>
                            <input type="text" class="form-control" name="cpf_cnpj_cliente" value="" required placeholder="Digite o CPF ou CNPJ">
                        </div>

                        <!-- Telefone -->
                        <div class="mb-3">
                            <label class="form-label">Telefone</label>
                            <input type="text" class="form-control" name="telefone_cliente" value="" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email_cliente" value="" required>
                        </div>

                        <!-- Senha -->
                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-control" name="senha_cliente" value="" required>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="statusServico" class="form-label">Status</label>
                            <select class="form-select" name="status_cliente" required>
                                <option selected disabled>Selecione o status</option>
                                <option value="Ativo">Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Botões (DENTRO DO FORM) -->
                <div class="modal-footer">
                    <a href="http://localhost/kioficina/public/cliente/editar/<?php echo $linha['id_cliente'] ?>"><button type="submit" class="btn btn-primary">Atualizar</button></a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div> <!-- Fechamento do form -->
            </div>
        </div>
    </div>
</div>