<div class="container" id="container">
    <h2 class="text-primary fw-bolder">Livro</h2>
        <!-- Button do Modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                            <td>DISPONIVEL</td>
                            <td>STATUS</td>
                            <td>OBRA</td>
                            <td>TOMBO</td>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listaLivro as $li) :?>
                                <tr onclick="location.href='<?=base_url('Livro/editar/'.$li['id'])?>'" role="button">
                                    <td class="fw-bolder">
                                        <?=$li['id']?>
                                    </td>
                                    <td>
                                        <span class="rounded fw-bolder text-light text-center margin me-3 <?=$li['class_disponivel']?>">
                                            <?=$li['disponivel']?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="rounded fw-bolder text-light text-center margin me-3 <?=$li['class_status']?>">
                                            <?=$li['status']?>
                                        </span>
                                    </td>
                                    <td>
                                        <?=$li['titulo']?>
                                    </td>
                                    <td>
                                        <?=$li['tombo']?>
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
    <?=form_open("Livro/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="disponivel">Disponivel:</label>
                    <select class='form-select' name="disponivel" id="disponivel" required>
                        <option>Selecione a Disponibilidade</option>
                        <?php foreach($statusdisponivel as $chave => $valor) : ?>
                            <option value="<?=$chave?>"><?=$valor?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class='form-select' name="status" id="status" required>
                        <option>Selecione o Status</option>
                        <?php foreach($status as $chave => $valor) : ?>
                            <option value="<?=$chave?>"><?=$valor?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="telefone">Obra:</label>
                    <select class='form-select' name="id_obra" id="id_obra" required>
                        <option>Selecione uma obra</option>
                        <?php foreach($listaObra as $obra) : ?>
                            <option value="<?=$obra['id']?>"><?=$obra['titulo']?></option>
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

