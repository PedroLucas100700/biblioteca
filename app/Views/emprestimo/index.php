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
                <h2 class="text-primary fw-bolder">Emprestimo</h2>
                    <!-- Button do Modal -->
                    <button type="button" class="btn mb-3 btn-primary text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Novo
                    </button>
                    <!-- Tabela de Usuario -->
                    <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover display compact" id="datatable">
                        <thead>
                        <tr class="fw-bolder">
                            <td>ID</td>
                            <td>DATA DE INICIO</td>
                            <td>DATA DO FIM</td>
                            <td>DATA DO PRAZO</td>
                            <td>LIVRO</td>
                            <td>ALUNO</td>
                            <td>USUARIO</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listaEmprestimo as $em) :?>
                                <tr onclick="location.href='<?=base_url('Emprestimo/editar/'.$em['id'])?>'" id="" role="button">
                                    <td class="fw-bolder text-end" id="">
                                        <?=$em['id']?>
                                    </td>
                                    <td>
                                    
                                    <?=$em['data_inicio_formatada']?>
                                    </td>
                                    <td>
                                        <?=$em['mensagem_data_fim']?>
                                    </td>
                                    <td>
                                        <?=$em['data_prazo_formatada']?>
                                    </td>
                                        <td>
                                        <?=$em['titulo']?>
                                    </td>
                                    <td>
                                        <?=$em['aluno']?>
                                    </td>
                                    <td>
                                        <?=$em['usuario']?>
                                    </td>
                                    <td>
                                        <?=$em['mensagem_devolucao']?>
                                    </td>
                                </tr>
                            <?php endforeach ?>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <?=form_open("Emprestimo/cadastrar")?> 
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Emprestimo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                                foreach($listaObra as $obra){
                                    $obras[$obra['id']] = $obra['titulo'];
                                }
                            ?>
                            <div class="form-group">
                                <label for="data_inicio">Data de Inicio:</label>
                                <input class='form-control' type="date" id='data_inicio' name='data_inicio'>
                            </div>
                            <div class="form-group">
                                <label for="data_prazo">Prazo:</label>
                                <input class='form-control' type="number" id='data_prazo' name='data_prazo' min="0" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="telefone">Livro:</label>
                                <select class='form-select' name="id_livro" id="id_livro" required>
                                    <option>Selecione um Livro</option>
                                    <?php foreach($listaLivro as $livro) : ?>
                                        <?php if($livro['disponivel'] >= 1):?>
                                            <option value="<?=$livro['id']?>"><?=$obras[$livro['id_obra']]?></option>
                                        <?php endif?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Aluno:</label>
                                <select class='form-select' name="id_aluno" id="id_aluno" required>
                                    <option>Selecione um Aluno</option>
                                    <?php foreach($listaAluno as $aluno) : ?>
                                        <option value="<?=$aluno['id']?>"><?=$aluno['nome']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Usuario:</label>
                                <select class='form-select' name="id_usuario" id="id_usuario" required>
                                    <?php foreach($listaUsuario as $usuario) : ?>
                                        <option value="<?=$usuario['id']?>"><?=$usuario['nome']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-dark">Cadastrar</button>
                        </div>
                    </div>
                </div>
                    <?=form_close()?>
                </div>
            </div>
