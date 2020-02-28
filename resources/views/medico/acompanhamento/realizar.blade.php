@extends('adminlte::page')

@section('title', 'eClinical')

@section('content_header')

@stop

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Acompanhamento Médico</h3>
    </div>
    <div class="box-body">
        <div class="form-group {{ $errors->has('paciente') ? 'has-error' : '' }} col-md-10">
            <label for="paciente" class="control-label">Paciente</label>
            <input for="paciente" class="form-control" type="text" name="paciente"
                value="{{ isset($consulta->paciente) ? $consulta->paciente : old('paciente') }}" readonly />
            @if($errors->has('paciente'))
            <small for="paciente" class="control-label">{{ $errors->first('paciente') }}</small>
            @endif
        </div>
        <div class="form-group {{ $errors->has('horario_consulta') ? 'has-error' : '' }} col-md-2">
            <label for="horario_consulta" class="control-label">Horário</label>
            <input for="horario_consulta" class="form-control hora" type="text" name="horario_consulta"
                value="{{ isset($consulta->horario_consulta) ? $consulta->horario_consulta : old('horario_consulta') }}"
                readonly />
            @if($errors->has('horario_consulta'))
            <small for="horario_consulta" class="control-label">{{ $errors->first('horario_consulta') }}</small>
            @endif
        </div>

        <div class="col-md-8">
            <h3><i class="fa fa-clock-o fa-lg"></i> <strong id="timer">00:00:00</strong></h3>
            <!--<button id="start" class="btn btn-success"><i class="fa fa-play fa-lg"></i><strong>Iniciar</strong></button>-->
            <button id="stop" class="btn btn-danger"><i class="fa fa-stop fa-lg"></i> <strong>Parar</strong></button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('medico.acompanhamento') }}"><i class="fa fa-arrow-circle-left fa-lg"></i> Retornar
            Acompanhamento</a>
    </div>
</div>

@stop

@section('js')

<script>
    Number.prototype.pad = function(size) {
        var s = String(this);
        while (s.length < (size || 2)) {s = "0" + s;}
        return s;
    }

    var Clock = {
        totalSeconds: 0,

        start: function () {
            var self = this;

            this.interval = setInterval(function () {
                self.totalSeconds += 1;
                $("#timer").text(Math.floor(self.totalSeconds / 3600).pad(2) + ':' + Math.floor(self.totalSeconds / 60 % 60).pad(2) + ':' + parseInt(self.totalSeconds % 60).pad(2));
            }, 1000);
        },

        pause: function () {
            clearInterval(this.interval);
            delete this.interval;

        Swal.fire({
            title: 'Deseja encerrar a consulta?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: 'Finalizar',
            cancelButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    type: 'success',
                    title: 'Consulta finalizada com sucesso',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#stop').prop('disabled', true);
            }else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire({
                    type: 'info',
                    title: 'Consulta em andamento',
                    showConfirmButton: false,
                    timer: 1500
                })

                Clock.resume();
            }
        })

        },

        resume: function () {
            if (!this.interval) this.start();
            Swal.fire({
                type: 'info',
                title: 'Consulta em andamento',
                showConfirmButton: false,
                timer: 1500
            })
            $('#start').prop('disabled', true);
            $('#stop').prop('disabled', false);
        }
    };

    Clock.start();
    Swal.fire({
        type: 'info',
        title: 'Consulta iniciada',
        showConfirmButton: false,
        timer: 1500
    })

    $('#stop').click(function () { Clock.pause(); });
    //$('#start').click(function () { Clock.resume(); });

</script>

@stop
