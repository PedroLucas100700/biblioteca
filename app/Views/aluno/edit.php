<div class="container p-5">
    <?=form_open('Aluno/salvar')?>
    <input value='<?=$aluno['id']?>'class='form-control' type="hidden" id='id' name='id'>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Nome</label>
        </div>
        <div class="col-10">
            <input value='<?=$aluno['nome']?>'class='form-control' type="text" id='nome' name='nome'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">CPF</label>
        </div>
        <div class="col-10">
            <input value='<?=$aluno['cpf']?>'class='form-control' type="text" id='cpf' name='cpf' disabled="">
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Email</label>
        </div>
        <div class="col-10">
            <input value='<?=$aluno['email']?>'class='form-control' type="email" id='email' name='email'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="telefone">Telefone</label>
        </div>
        <div class="col-10">
            <input value='<?=$aluno['telefone']?>'class='form-control' type="text" id='telefone' name='telefone'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="turma">Turma</label>
        </div>
        <div class="col-10">
            <?php
                $turma = ['1A','1B','1C','1D','2A','2B','2C','2D','3A','3B','3C','3D'];
            ?>
            <select class='form-select' name="turma" id="turma">
                    <option hidden><?=$aluno['turma']?>
                    <?php foreach ($turma as $t) { ?>
                        <option value="<?=$t?>"><?=$t?></option>
                    <?php } ?>
                    </option>
            </select>
        </div>
    </div>
    <div class="row p-4">
        <div class="col">
            <div class="btn-group w-100" role="group">
                <a href='<?=base_url('Aluno/index')?>'class="btn btn-outline-secondary">Cancelar</a>
                <button type="submit" class="btn btn-outline-success">Salvar</button>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Excluir
                </button>
            </div>
        </div>
    </div>
    <?=form_close()?>
</div>

    <!-- Modal -->
    <?=form_open('Aluno/excluir')?>
        <input value='<?=$aluno['id']?>'class='form-control' type="hidden" id='id' name='id'>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Você tem certeza que deseja excluir: <br>ID: <?=$aluno['id']?><br>CPF: <?=$aluno['cpf']?><br>Nome: <?=$aluno['nome']?><br>Email: <?=$aluno['email']?><br>Telefone: <?=$aluno['telefone']?><br> Turma: <?=$aluno['turma']?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
        <?=form_close()?>
        <div class="d-flex justify-content-end me-5">
            <?=anchor("Aluno/gerar_pdf/".$aluno['id'],"Formatação",['class' => 'btn  btn-primary']);?>
        </div>