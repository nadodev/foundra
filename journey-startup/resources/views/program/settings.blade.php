@extends('layouts.program')

@section('title', 'Programa Configurações · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Configuração do Programaa</div><h1>Configurações</h1><p>Defina regras do workspace, coortes, visibilidade e acesso.</p></div><div class="actions"><button class="btn primary">Salvar alterações</button></div></div>
<div class="tabs"><div class="tab active">Geral</div><div class="tab">Turmas</div><div class="tab">Permissões</div><div class="tab">Identidade visual</div><div class="tab">Integrações</div></div><div class="grid two"><div class="card"><h2>Programa</h2><form class="form"><div class="field"><label>Nome</label><input value="Startup Garage 2027"/></div><div class="field"><label>Organization</label><input value="Hub Inovação Pro"/></div><div class="field"><label>Turma padrão</label><select><option>Turma Alpha</option></select></div></form></div><div class="card"><h2>Visibility</h2><form class="form"><div class="field"><label>Programaa pode ver a maturidade da startup</label><select><option>Ativado</option></select></div><div class="field"><label>Programaa pode ver evidências privadas</label><select><option>Somente quando compartilhadas</option></select></div><div class="field"><label>Aprovação do mentor necessária para marcos</label><select><option>Opcional</option></select></div></form></div></div>
@endsection
