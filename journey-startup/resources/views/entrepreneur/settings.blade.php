@extends('layouts.entrepreneur')

@section('title', 'Configurações · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Área de trabalho</div><h1>Configurações</h1><p>Gerencie seu perfil, startup, equipe e privacidade.</p></div><div class="actions"><button class="btn primary">Salvar alterações</button></div></div>
<div class="tabs"><div class="tab active">Perfil</div><div class="tab">Startup</div><div class="tab">Equipe</div><div class="tab">Privacidade</div><div class="tab">Cobrança</div></div><div class="grid two"><div class="card"><h2>Perfil</h2><form class="form"><div class="field"><label>Nome</label><input value="Leonardo Geja"/></div><div class="field"><label>E-mail</label><input value="leonardo@example.com"/></div><div class="field"><label>Cargo</label><input value="Founder"/></div></form></div><div class="card"><h2>Startup</h2><form class="form"><div class="field"><label>Nome</label><input value="FinAI"/></div><div class="field"><label>Setor</label><input value="FinTech B2B"/></div><div class="field"><label>Perfil público</label><select><option>Ativado</option><option>Desativado</option></select></div></form></div></div>
@endsection
