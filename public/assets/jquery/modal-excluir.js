    // Script para passar o valor do botão para o modal
    $('#exampleModalAutorExcluir').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que abriu o modal
        var info = button.data('info'); // Extrai informação do atributo data-info
        var modal = $(this);
        modal.find('#modalTexto').text(info); // Insere o valor no conteúdo do modal

        var info2 = button.data('info2'); // Extrai informação do atributo data-info
        $('input[name="informacao"]').val(info2); // Insere o valor no conteúdo do modal
    });