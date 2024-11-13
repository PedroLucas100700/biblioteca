<div class="container" id="container">
    <h2 class="text-primary fw-bolder">Autor</h2>
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
                            <td>NOME</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($listaAutor as $a) :?>
                                <tr onclick="location.href='<?=base_url('Autor/editar/'.$a['id'])?>'" role="button">
                                    <td class="fw-bolder">
                                        <?=$a['id']?>
                                    </td>
                                    <td>
                                        <?=$a['nome']?>
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
<?=form_open("Autor/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Autor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input class='form-control' type="text" id='nome' name='nome'>
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