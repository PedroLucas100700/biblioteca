<div class="container p-5">
    <?=form_open('Obra/salvar')?>
    <input value='<?=$obra['id']?>' class='form-control' type="hidden" id='id' name='id'>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Titulo</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['titulo']?>'class='form-control' type="text" id='titulo' name='titulo'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Categoria</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['categoria']?>'class='form-control' type="text" id='categoria' name='categoria'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Ano</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['ano_publicacao']?>'class='form-control' type="text" id='ano_publicacao' name='ano_publicacao'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="isbn">ISBN</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['isbn']?>'class='form-control' type="text" id='isbn' name='isbn'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="editora">Editora</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['id_editora']?>'class='form-control' type="text" id='id_editora' name='id_editora' disabled>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="quantidade">quantidade</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['quantidade']?>'class='form-control' type="text" id='quantidade' name='quantidade'>
            <div id="alert" class="alert alert-danger" style="display: none;"></div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
        </div>
        <div class="col-10">
            <div class="form-group" id="inputsContainer2"></div>
        </div>
    </div>
    
    <div class="d-flex justify-content-center">
        <table class="table table-sm p-5 border-dark" id="autor_obra">
            <thead>
                <tr>
                    <th>
                        <label for="autores">Autores(a)</label>
                    </th>
                    <th>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalautor">
                                Adicionar...
                            </button>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listaAutorObra as $lao):?>
                <tr>
                    <td>
                        <?=$lao['nome']?>
                    </td>
                    <td>
                        <div>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalAutorExcluir" data-info2="<?=$lao['id']?>" data-info="<?=$lao['nome']?>">
                                Excluir
                            </button>
                        </div>
                    </td>
                </tr>
                    <?php endforeach?>
            </tbody>
        </table>
    </div>

    <div class="row p-4">
        <div class="col">
            <div class="btn-group w-100" role="group">
                <a href='<?=base_url('Obra/index')?>'class="btn btn-outline-secondary">Cancelar</a>
                <button type="submit" class="btn btn-outline-success" id="salvar_obra">Salvar</button>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Excluir
                </button>
            </div>
        </div>
    </div>
    <?=form_close()?>
</div>

    <!-- Modal De Excluir-->
    <?=form_open('Obra/excluir')?>
    <input value='<?=$obra['id']?>'class='form-control' type="hidden" id='id' name='id'>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Você tem certeza que deseja excluir: <br>ID: <?=$obra['id']?><br>Titulo: <?=$obra['titulo']?><br>Ano: <?=$obra['ano_publicacao']?><br>ISBN: <?=$obra['isbn']?><br> Editora: <?=$obra['id_editora']?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
        </div>
        <?=form_close()?>
    </div>
    </div>

    <!-- Modal De Autores-->
    <div class="modal fade" id="exampleModalautor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?=form_open('Obra/adicionarAutor')?>
    <input value='<?=$obra['id']?>'class='form-control' type="hidden" id='id_obra' name='id_obra'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Lista de Autores</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="autor">Autores:</label>
                            <select class='form-select' name="id_autor" id="id_autor" required>
                                <option>Selecione</option>
                                <?php foreach($listaAutor as $autor) : ?>
                                    <option value="<?=$autor['id']?>"><?=$autor['nome']?></option>
                                <?php endforeach ?>
                            </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </div>
    <?=form_close()?>
    </div>

    <!-- Modal Excluir Autores-->
    <div class="modal fade" id="exampleModalAutorExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?=form_open('Obra/excluirAutor')?>
    <input value='<?=$obra['id']?>'class='form-control' type="hidden" id='id_obra' name='id_obra'>
    <input value='<?=$autor['id']?>'class='form-control' type="hidden" id='id_autor' name='id_autor'>
        <div class="modal-dialog">
            <div class="modal-content">
                <input type="hidden" name="informacao">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Lista de Autores</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        Você tem certeza que deseja excluir o(a) autor(a) <span id="modalTexto"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </div>
        </div>
    <?=form_close()?>
    </div>
    <div class="d-flex justify-content-end me-5">
        <?=anchor("Obra/gerar_pdf/".$obra['id'],"Formatação",['class' => 'btn  btn-primary']);?>
    </div>
    <script src="<?=base_url('assets/jquery/input-tombo-edit.js')?>"></script>
