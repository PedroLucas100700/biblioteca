    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <div class="container" id="container">
                <!-- Main Content -->
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- end alert -->
                        <div class="alert alert-success alert-dismissible <?=(session()->has('sucesso')) ? '' : 'visually-hidden'?>">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Sucesso!</strong>  Dados salvos com sucesso!
                        </div>
                        <div class="alert alert-danger <?= (session()->has('erro')) ? '' : 'visually-hidden'?>">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Problema!</strong> Problema ao inserir os dados!.
                        </div>
                        <!-- end alert -->

                        <!-- Page Heading -->
                        <h2 class="text-primary fw-bolder">Usuário</h2>
                        <button type="button" class="btn btn-primary mb-3 theme-mode" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Novo
                        </button>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-hover display compact" id="datatable">
                                        <thead>
                                            <tr class="fw-bolder" role="button">
                                                <td>ID</td>
                                                <td>NOME</td>
                                                <td>EMAIL</td>
                                                <td>TELEFONE</td>
                                                <td>ACESSO</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($listaUsuarios as $u) : ?>
                                                <tr onclick="location.href='<?= base_url('Usuario/editar/' . $u['id']) ?>'" role="button">
                                                    <td class="fw-bolder text-center">
                                                        <?= $u['id'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $u['nome'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $u['email'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $u['telefone'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $u['acesso']?>
                                                    </td>
                                                </tr>

                                            <?php
                                            endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-primary fw-bolder" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?= form_open("Usuario/cadastrar") ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class='form-control' type="text" id='nome' name='nome' autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="e-mail">Email:</label>
                        <input class='form-control' type="text" id='email' name='email' autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input class='form-control' type="text" id='senha' name='senha' autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="acesso">Acesso:</label>
                        <select class="form-select js-example-basic-single" name="" id="">
                            <option value="0">Bibliotecário</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input class='form-control' type="text" id='telefone' name='telefone' onkeyup="formatarTelefone(this)" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
        <?= form_close() ?>
    </div>