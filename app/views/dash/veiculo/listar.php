<h1>Listar veiculo</h1>
<div class="navTool">
    <a href="http://localhost/kioficina/public/agendamento/adicionar">ADICIONAR</a>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Modelo</th>
            <th scope="col">Ano Veiculo</th>
            <th scope="col">Cor</th>
            <th scope="col">KM</th>
            <th scope="col">Status</th>
            <th scope="col">Editar</th>
            <th scope="col">Desativar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listarVeiculo as $linha): ?>
            <tr>
                <td><img src="<?php
                                $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $linha['foto_cliente'];
                                if ($linha['foto_cliente'] != "") {
                                    if (file_exists($caminhoArquivo)) {
                                        echo ("http://localhost/kioficina/public/uploads/" . htmlspecialchars($linha['foto_cliente'], ENT_QUOTES, 'UTF-8'));
                                    } else {
                                        echo ("http://localhost/kioficina/public/uploads/cliente/sem-foto-cliente.png");
                                    }
                                } else {
                                    echo ("http://localhost/kioficina/public/uploads/cliente/sem-foto-cliente.png");
                                } ?>" alt="<?php echo htmlspecialchars($linha['alt_foto_cliente'],ENT_QUOTES,'UTF-8');?>">
                </td>
                <td><?php echo $linha['nome_cliente'] ?></td>
                <td><?php echo $linha['nome_modelo'] ?></td>
                <td><?php echo $linha['ano_veiculo'] ?></td>
                <td><?php echo $linha['cor_veiculo'] ?></td>
                <td><?php echo $linha['km_veiculo'] ?></td>
                <td><?php echo $linha['status_veiculo'] ?></td>
                <td><a href="#"><i class="bi bi-pencil"></i></a></td>
                <td><a href="#"><i class="bi bi-trash"></i></a></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>