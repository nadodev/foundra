@extends('layouts.mentor')

@section('title', 'Perfil · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Perfil do Mentor</div><h1>Ana Costa</h1><p>Configure especialidades, disponibilidade e visibilidade no ecossistema.</p></div><div class="actions"><button class="btn primary">Salvar alterações</button></div></div>
<div class="grid two"><div class="card"><h2>Perfil</h2><form class="form"><div class="field"><label>Nome</label><input value="Ana Costa"/></div><div class="field"><label>Especialidade</label><input value="Pricing &amp; Monetization for B2B SaaS"/></div><div class="field"><label>Biografia</label><textarea>Ex-VP de Produto e mentora em modelos B2B, monetização e customer discovery.</textarea></div></form></div><div class="card"><h2>Disponibilidade</h2><form class="form"><div class="field"><label>Horas semanais</label><input value="6"/></div><div class="field"><label>Etapas preferidas</label><select><option>Validação, MVP</option></select></div><div class="field"><label>Status</label><select><option>Disponível</option></select></div></form></div></div>
@endsection
