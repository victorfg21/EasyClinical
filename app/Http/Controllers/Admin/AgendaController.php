<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AgendaRequest;
use App\Http\Controllers\Controller;
use App\Agenda;
use App\Profissional;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    //construtor
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //if (Auth::user()->authorizeRoles() == false)
        //    abort(403, 'Você não possui autorização para realizar essa ação.');
        $agendas = Agenda::all();
        return view('admin.agendas.index', compact('agendas'));
    }

    //Método que lista todos os usuarios no DataTable da Tela
    public function listaragendas(Request $request)
    {
        //if (Auth::user()->authorizeRoles() == false)
        //    abort(403, 'Você não possui autorização para realizar essa ação.');
        $agendas = new Agenda;
        return $agendas->ListarAgendas($request);
    }

    public function create()
    {
        //if (Auth::user()->authorizeRoles() == false)
        //    abort(403, 'Você não possui autorização para realizar essa ação.');

        $profissional_list = Profissional::orderBy('nome')->get();
        return view('admin.agendas.create', [
            'profissional_list' => $profissional_list
        ]);
    }

    public function store(AgendaRequest $req)
    {
        try {
            DB::beginTransaction();

            $dados = new Agenda;
            $dados->profissional_id = $req->input('profissional_id');
            $dados->segunda = ($req->input('segunda') == 'on') ? true : false;
            $dados->terca = ($req->input('terca') == 'on') ? true : false;
            $dados->quarta = ($req->input('quarta') == 'on') ? true : false;
            $dados->quinta = ($req->input('quinta') == 'on') ? true : false;
            $dados->sexta = ($req->input('sexta') == 'on') ? true : false;
            $dados->sabado = ($req->input('sabado') == 'on') ? true : false;
            $dados->domingo = ($req->input('domingo') == 'on') ? true : false;
            $dados->inicio_periodo = date('Y-m-d H:i:s', strtotime($req->input('inicio_periodo')));
            $dados->fim_periodo = date('Y-m-d H:i:s', strtotime($req->input('fim_periodo')));
            $dados->tempo_consulta = $req->input('tempo_consulta');
            $dados->inicio_horario_1 = $req->input('inicio_horario_1');
            $dados->fim_horario_1 = $req->input('fim_horario_1');
            $dados->inicio_horario_2 = $req->input('inicio_horario_2');
            $dados->fim_horario_2 = $req->input('fim_horario_2');
            $dados->ativo = 1;

            $dados->save();
            DB::commit();

            return "Cadastrado com sucesso!";

        } catch (Exception $e) {
            DB::rollback();
            return "Ocorreu um erro ao cadastrar.";
        }
    }

    public function show($id)
    {
        //if (Auth::user()->authorizeRoles() == false)
        //    abort(403, 'Você não possui autorização para realizar essa ação.');
        $registro = Agenda::find($id);
        return view('admin.agendas.show', compact('registro'));
    }

    public function edit($id)
    {
        //if (Auth::user()->authorizeRoles() == false)
        //    abort(403, 'Você não possui autorização para realizar essa ação.');
        $registro = Agenda::find($id);
        $profissional_list = Profissional::orderBy('nome')->get();
        return view('admin.agendas.edit', [
            'registro' => $registro,
            'profissional_list' => $profissional_list
        ]);
    }

    public function update(AgendaRequest $req, $id)
    {
        try {
            DB::beginTransaction();

            $dados = Agenda::find($id);
            $dados->profissional_id = $req->input('profissional_id');
            $dados->segunda = ($req->input('segunda') == 'on') ? true : false;
            $dados->terca = ($req->input('terca') == 'on') ? true : false;
            $dados->quarta = ($req->input('quarta') == 'on') ? true : false;
            $dados->quinta = ($req->input('quinta') == 'on') ? true : false;
            $dados->sexta = ($req->input('sexta') == 'on') ? true : false;
            $dados->sabado = ($req->input('sabado') == 'on') ? true : false;
            $dados->domingo = ($req->input('domingo') == 'on') ? true : false;
            $dados->inicio_periodo = date('Y-m-d H:i:s', strtotime($req->input('inicio_periodo')));
            $dados->fim_periodo = date('Y-m-d H:i:s', strtotime($req->input('fim_periodo')));
            $dados->tempo_consulta = $req->input('tempo_consulta');
            $dados->inicio_horario_1 = $req->input('inicio_horario_1');
            $dados->fim_horario_1 = $req->input('fim_horario_1');
            $dados->inicio_horario_2 = $req->input('inicio_horario_2');
            $dados->fim_horario_2 = $req->input('fim_horario_2');

            $dados->update();
            DB::commit();
            return "Alterado com sucesso!";
        } catch (Exception $e) {
            DB::rollback();
            return "Ocorreu um erro ao alterar.";
        }
    }
}
