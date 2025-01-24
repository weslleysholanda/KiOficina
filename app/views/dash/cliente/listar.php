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
                <td><?php echo $linha['cpf_cnpj_cliente'] ?></td>
                <td><?php echo $linha['email_cliente'] ?></td>
                <td><?php echo $linha['telefone_cliente'] ?></td>
                <td><?php echo $linha['cidade_cliente'] ?></td>
                <td><?php echo $linha['bairro_cliente'] ?></td>
                <td><a href="#"><i class="bi bi-pencil"></i></a></td>
                <td><a href="#"><i class="bi bi-trash"></i></a></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>