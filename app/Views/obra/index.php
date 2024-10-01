<div class="container">

        <!-- Main Content -->
        <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

                <h2 class="text-primary fw-bolder">Obra</h2>
                    <!-- Button do Modal -->
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Novo
                    </button>
                    <!-- Tabela de Usuario -->
                <table class="table table-hover shadow-lg">
                    <thead>
                    <tr class="fw-bolder">
                        <td>ID</td>
                        <td>TITULO</td>
                        <td>CATEGORIA</td>
                        <td>ANO</td>
                        <td>ISBN</td>
                        <td>EDITORA</td>
                        <td>QUANTIDADE</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listaObra as $ob) :?>
                            <tr onclick="location.href='<?=base_url('Obra/editar/'.$ob['id'])?>'" role="button">
                                <td class="fw-bolder text-center">
                                    <?=$ob['id']?>
                                </td>
                                <td>
                                    <?=$ob['titulo']?>
                                </td>
                                <td>
                                    <?=$ob['categoria']?>
                                </td>
                                <td>
                                    <?=$ob['ano_publicacao']?>
                                </td>
                                <td>
                                    <?=$ob['isbn']?>
                                </td>
                                <td>
                                    <?=$ob['nome']?>
                                </td>
                                <td>
                                    <?=$ob['quantidade']?>
                                </td>
                            </tr>
                        <?php endforeach ?>  
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <?=form_open("Obra/cadastrar")?> 
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Nova Obra</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="titulo">Titulo:</label>
                                <input class='form-control' type="text" id='titulo' name='titulo' autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <input class='form-control' type="text" id='categoria' name='categoria' autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="ano">Ano:</label>
                                <input class='form-control' type="text" id='ano_publicacao' name='ano_publicacao' autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN:</label>
                                <input class='form-control' type="text" id='isbn' name='isbn' autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="telefone">EDITORA:</label>
                                    <select class='form-select' selected="oi" name="id_editora" id="id_editora" required>
                                        <option>Selecione uma editora</option>
                                        <?php foreach($listaEditora as $ob) : ?>
                                            <option value="<?=$ob['id']?>"><?=$ob['nome']?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="form-group">
                                    <label for="quantidade">Quantidade:</label>
                                    <input maxlength="2" class='form-control' type="number" id='quantidade' name='quantidade' min="1" max="100" autocomplete="off">
                                </div>
                                <div id="alert" class="alert"></div>
                                <div class="form-group" id="inputsContainer"></div>
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
