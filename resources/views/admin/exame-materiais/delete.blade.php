<form id="frmExameMaterial" class="form-horizontal">
    {{ csrf_field() }}

    <div class="box-body">

        <input type="hidden" value="{{ $exameMaterial->id }}" name="id">

        <div class="alert alert-danger" role="alert">
            Deseja REALMENTE excluir essa Área de Atuação?
        </div>

        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Descrição</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="nome" value="{{ $exameMaterial->nome }}" disabled="disabled">
            </div>
        </div>

    </div>
</form>

<script>
    $("#btnSave").unbind("click").click(function (e) {
        e.preventDefault();
        var form = $("#frmExameMaterial").serialize();
        $("#btnSave").css("pointer-events", "none");
        $("#btnClose").css("pointer-events", "none");
        $.ajax({
            type: "POST",
            url: "{{ route('admin.exame-materiais.confirmardelete', $exameMaterial->id) }}",
            data: form,
            success: function (data) {

                if (data == "Removido com sucesso!") {
                    Swal.fire({
                        position: 'center ',
                        type: 'success',
                        title: data,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#tblExameMateriais").DataTable().ajax.reload();
                    $("#modal_CRUD").modal("hide");
                }
                else {
                    $("#modalMensagens .modal-body").html(data);
                    $("#modalMensagens .modal-title").html("Erros");
                    $('#modalMensagens').modal('toggle');
                    $('#modalMensagens').modal('show');
                }
                $("#btnSave").css("pointer-events", "");
                $("#btnClose").css("pointer-events", "");
            }
        });
    });
    $('#modal_CRUD').unbind("hide.bs.modal").on('hide.bs.modal', function () {
        $("#tblExameMateriais").DataTable().ajax.reload();
    });
</script>
