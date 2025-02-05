<div class="navTool">
    <a href="http://localhost/kioficina/public/funcionario/adicionar">ADICIONAR</a>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Documento</th>
            <th scope="col">email</th>
            <th scope="col">cidade</th>
            <th scope="col">bairro</th>
            <th scope="col">Editar</th>
            <th scope="col">Desativar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listarFuncionario as $linha): ?>
            <tr>
                <td><img src="<?php
                                $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $linha['foto_funcionario'];
                                if ($linha['foto_funcionario'] != "") {
                                    if (file_exists($caminhoArquivo)) {
                                        echo ("http://localhost/kioficina/public/uploads/" . htmlspecialchars($linha['foto_funcionario'], ENT_QUOTES, 'UTF-8'));
                                    } else {
                                        echo ("http://localhost/kioficina/public/uploads/funcionario/sem-foto-funcionario.png");
                                    }
                                } else {
                                    echo ("http://localhost/kioficina/public/uploads/funcionario/sem-foto-funcionario.png");
                                } ?>" alt="<?php echo htmlspecialchars($linha['alt_foto_funcionario'],ENT_QUOTES,'UTF-8');?>">
                </td>
                <td><?php echo $linha['nome_funcionario'] ?></td>
                <td><?php echo $linha['cpf_cnpj_funcionario'] ?></td>
                <td><?php echo $linha['email_funcionario'] ?></td>
                <td><?php echo $linha['cidade_funcionario'] ?></td>
                <td><?php echo $linha['bairro_funcionario'] ?></td>
                <td><a href="#"><i class="bi bi-pencil"></i></a></td>
                <td><a href="#"><i class="bi bi-trash"></i></a></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>