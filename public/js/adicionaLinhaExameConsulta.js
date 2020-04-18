$(document).ready(function() {
    $('#btnAddLinhaExameConsulta').on('click', function(e) {
        // Captura a referência da tabela com id “minhaTabela”
        var table = $('#tblSolicExame')[0];
        // Captura a quantidade de linhas já existentes na tabela
        var numOfRows = table.tBodies[0].rows.length;
        var numOfRowsHead = table.tHead.rows.length;
        // Captura a quantidade de colunas da última linha da tabela
        var numOfCols = table.tHead.rows[numOfRowsHead - 1].cells.length;

        // Insere uma linha no fim da tabela.
        var newRow = table.tBodies[0].insertRow(numOfRows);

        // Faz um loop para criar as colunas
        for (var j = 0; j < numOfCols; j++) {
            // Insere uma coluna na nova linha
            newCell = newRow.insertCell(j);

            switch (j) {
                case 0:
                    newCell.innerHTML = numOfRows + 1;
                    break;

                case 1:
                    var comboGrid = '';

                    $.ajax({
                        type: "GET",
                        url: "/medico/acompanhamento/listarexames",
                        dataType: "json",
                        async: false,
                        success: function(data) {
                            comboGrid += '<select for="exame_id" class="form-control js-example-responsive" name="exame_id" required>';
                            $.each(data, function(k, v) {
                                comboGrid += '<option value="' + v.id + '">' + v.nome + '</option>';
                            });

                            comboGrid += '</select>';
                            newCell.innerHTML = comboGrid;

                            $(".js-example-responsive").select2({
                                width: '100% ' // need to override the changed default
                            });
                        }
                    });
                    break;

                case 2:
                    newCell.innerHTML = '<a class="btnDelLinhaExameConsulta"><i class="fa fa-trash fa-lg"></i></a>';
                    break;

                default:
                    break;
            }
        }
    });

    $(document).on('click', '.btnDelLinhaExameConsulta', function(e) {
        // Captura a referência da tabela com id “minhaTabela”
        var table = $('#tblSolicExame')[0];
        //Id da linha que será removida
        var idLinha = e.currentTarget.parentElement.parentElement.sectionRowIndex;
        // Número de linhas
        var numOfRows = table.tBodies[0].rows.length;
        table.tBodies[0].deleteRow(idLinha);
    });
});
