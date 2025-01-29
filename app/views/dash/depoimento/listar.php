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
    <a href="http://localhost/kioficina/public/depoimento/adicionar">ADICIONAR</a>
</div>
<table class="table table-hover">
    <thead>
        <tr>
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