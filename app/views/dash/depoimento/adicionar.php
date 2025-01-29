<h1>Adicionar Depoimento</h1>
<div class="container mt-5">
    <form id="normal" method="POST" action="http://localhost/kioficina/public/depoimento/adicionar" enctype="multipart/form-data">

        <!-- Cliente -->
        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <select class="form-select" name="id_cliente" required>
                <option selected disabled>Selecione o cliente</option>
                <?php foreach ($listarCliente as $cliente): ?>
                    <option value="<?php echo $cliente['id_cliente']; ?>">
                <?php echo $cliente['nome_cliente']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Descrição do Depoimento -->
        <div class="mb-3">
            <label class="form-label">Descrição do Depoimento</label>
            <textarea class="form-control" name="descricao_depoimento" rows="4" required></textarea>
        </div>

        <!-- Nota do Depoimento -->
        <div class="mb-3">
            <label class="form-label">Nota (de 1 a 5)</label>
            <select class="form-select" name="nota_depoimento" required>
                <option selected disabled>Selecione a nota</option>
                <option value="1">1 - Péssimo</option>
                <option value="2">2 - Ruim</option>
                <option value="3">3 - Regular</option>
                <option value="4">4 - Bom</option>
                <option value="5">5 - Excelente</option>
            </select>
        </div>

        <!-- Data e Hora do Depoimento -->
        <div class="mb-3">
            <label for="dataHoraDepoimento" class="form-label">Data e Hora</label>
            <input type="datetime-local" class="form-cont rol" name="datahora_depoimento" required>
        </div>

        <!-- Status do Depoimento -->
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="status_depoimento" required>
                <option selected disabled>Selecione o status</option>
                <option value="Ativo">Aprovado</option>
                <option value="Inativo">Inativo</option>
            </select>
        </div>

        <!-- Botões -->
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancelar</button>
    </form>
</div>