<h1>Adicionar Cliente</h1>
<!-- Tempus dominus timepicker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/css/tempus-dominus.min.css" crossorigin="anonymous">
<div class="container mt-5">

    <form method="POST" action="http://localhost/kioficina/public/cliente/adicionar" enctype="multipart/form-data">
        <div class="img">
            <img id="preview-img" style="width:100%; cursor:pointer;" name="foto_cliente" title="Clique na imagem para selecionar uma foto de serviço" src="http://localhost/kioficina/public/uploads/servico/sem-foto-servico.png" alt="">
            <input type="file" name="foto_cliente" id="foto_cliente" required style="display: none;" accept="image/*">
        </div>
        <div class="container-form">
            <div class="flex">
                <!-- Nome cliente -->
                <div class="mb-3">
                    <label class="form-label">Nome do Cliente</label>
                    <input type="text" class="form-control" name="nome_cliente" value="<?php echo htmlspecialchars($cliente['nome_cliente']); ?>" required>
                </div>

                <!-- Data de Nascimento-->
                <div class="mb-3">
                    <label for="dataCadastro" class="form-label">Data de Nascimento</label>
                    <div class="input-group date" id="dataCadastroPicker">
                        <input type="text" class="form-control" name="data_nasc_cliente" id="dataCadastro" placeholder="DD/MM/YYYY"
                            value="<?php echo htmlspecialchars(DateTime::createFromFormat('Y-m-d', $cliente['data_nasc_cliente'])->format('d/m/Y'), ENT_QUOTES, 'UTF-8'); ?>">

                        <span class="input-group-text">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex">
                <!-- Tipo Cliente -->
                <div class="mb-3">
                    <label class="form-label">tipo cliente</label>
                    <select class="form-select" name="tipo_cliente" required>
                        <option disabled <?php echo empty($cliente['tipo_cliente']) ? 'selected' : ''; ?>>Selecione o tipo</option>
                        <option value="Pessoa Física" <?php echo ($cliente['tipo_cliente'] === 'Pessoa Física') ? 'selected' : ''; ?>>Pessoa Física</option>
                        <option value="Pessoa Jurídica" <?php echo ($cliente['tipo_cliente'] === 'Pessoa Jurídica') ? 'selected' : ''; ?>>Pessoa Jurídica</option>
                    </select>
                </div>

                <!-- Cpf/Cnpj -->
                <div class="mb-3">
                    <label class="form-label">CPF ou CNPJ</label>
                    <input type="text" class="form-control" name="cpf_cnpj_cliente" required placeholder="Digite o CPF ou CNPJ" value="<?php echo $cliente['cpf_cnpj_cliente'] ?>">
                </div>
            </div>
            <div class="flex">
                <!-- Telefone -->
                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" class="form-control" name="telefone_cliente" value="<?php echo $cliente['telefone_cliente'] ?>" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="text" class="form-control" name="email_cliente" value="<?php echo $cliente['email_cliente'] ?>" required>
                </div>

                <!-- Senha -->
                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="text" class="form-control" value="<?php echo $cliente['senha_cliente'] ?>" name="senha_cliente" required>
                </div>
            </div>
            <div class="flex"><!-- Endereço Cliente -->
                <div class="mb-3">
                    <label class="form-label">Endereço</label>
                    <input type="text" class="form-control" value="<?php echo $cliente['endereco_cliente'] ?>" name="endereco_cliente" required>
                </div>

                <!-- Bairo cliente -->
                <div class="mb-3">
                    <label class="form-label">bairro</label>
                    <input type="text" class="form-control" name="bairro_cliente" value="<?php echo $cliente['bairro_cliente'] ?>" required>
                </div>
            </div>

            <div class="flex">
                <!-- Cidade cliente -->
                <div class="mb-3">
                    <label class="form-label">Cidade</label>
                    <input type="text" class="form-control" value="<?php echo $cliente['cidade_cliente'] ?>" name="cidade_cliente" required>
                </div>


                <!-- Estado -->
                <div class="mb-3">
                    <label for="statusServico" class="form-label">Estado</label>
                    <select class="form-select" id="status_servico" name="id_uf" required>
                        <option disabled <?= empty($cliente['id_uf']) ? 'selected' : ''; ?>>Selecione o Estado</option>
                        <?php foreach ($listarEstado as $estado): ?>
                            <option value="<?= $estado['id_uf']; ?>" <?= ($cliente['id_uf'] ?? '') == $estado['id_uf'] ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($estado['nome_uf'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>
            <!-- Status do Serviço -->
            <div class="mb-3">
                <label for="statusServico" class="form-label">Status</label>
                <select class="form-select" id="status_servico" name="status_cliente" required>
                    <option disabled <?= empty($cliente['status_cliente']) ? 'selected' : ''; ?>>Selecione o status</option>
                    <option value="Ativo" <?= ($cliente['status_cliente'] ?? '') == 'Ativo' ? 'selected' : ''; ?>>Ativo</option>
                    <option value="Inativo" <?= ($cliente['status_cliente'] ?? '') == 'Inativo' ? 'selected' : ''; ?>>Inativo</option>
                </select>
            </div>

            <!-- Botões -->
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancelar</button>
        </div>

    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const visualizarImg = document.getElementById('preview-img');
        const arquivo = document.getElementById('foto_cliente');

        visualizarImg.addEventListener('click', function() {
            arquivo.click()
        })

        arquivo.addEventListener('change', function() {
            if (arquivo.files && arquivo.files[0]) {
                let render = new FileReader();
                render.onload = function(e) {
                    visualizarImg.src = e.target.result
                }

                render.readAsDataURL(arquivo.files[0]);

            }

        })
    })
</script>

<!-- Tempus Dominus JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/js/tempus-dominus.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="http://localhost/kioficina/public/assets/js/teste.js"></script>