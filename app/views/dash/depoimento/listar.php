<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Nota</th>
            <th scope="col">Hora</th>
            <th scope="col">Status</th>
            <th scope="col">Editar</th>
            <th scope="col">Desativar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listarDepoimento as $linha): ?>
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
                                } ?>" alt="<?php echo htmlspecialchars($linha['alt_foto_cliente'],ENT_QUOTES,'UTF-8');?>"></td>
                <td><?php echo $linha['nome_cliente'] ?></td>
                <td><?php echo $linha['nota_depoimento'] ?></td>
                <td><?php echo $linha['datahora_depoimento'] ?></td>
                <td><?php echo $linha['status_depoimento'] ?></td>
                <td><a href="http://localhost/kioficina/public/servico/editar"><i class="bi bi-pencil"></i></a></td>
                <td><a href="http://localhost/kioficina/public/servico/desativar"><i class="bi bi-trash"></i></a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>