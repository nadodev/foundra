@extends('layouts.entrepreneur')

@section('title', 'Passaporte da Startup · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Jornada verificável</div><h1>Passaporte da Startup</h1><p>O histórico verificável da evolução da startup.</p></div><div class="actions"><a class="btn" href="{{ route('passport.public') }}">Ver perfil público</a><button class="btn primary">Compartilhar Passaporte</button></div></div>
<div class="passport"><div class="passport-head"><div><span class="badge primary">Passaporte da Startup</span><h1 style="margin-top:12px;font-size:42px">FinAI</h1><p>Automação simples de conciliação para varejistas.</p><div class="tag-row"><span class="badge">FinTech B2B</span><span class="badge">Startup Garage</span><span class="badge success">Validação</span></div></div><div class="seal">74%</div></div>
<div class="grid four section"><div><div class="metric-label">Criada em</div><strong>12 Mar 2027</strong></div><div><div class="metric-label">Etapa Atual</div><strong>Validação</strong></div><div><div class="metric-label">Evidência</div><strong>48 registros</strong></div><div><div class="metric-label">Entrevistas</div><strong>12 completed</strong></div></div>
<div class="section"><div class="metric-label">Linha do Tempo da Jornada</div><div class="timeline"><div class="stage done"><i></i>Idea</div><div class="stage done"><i></i>Problema</div><div class="stage done"><i></i>Cliente</div><div class="stage current"><i></i>Validação</div><div class="stage"><i></i>MVP</div><div class="stage"><i></i>Mercado</div></div></div>
<div class="section"><div class="section-head"><h2>Milestones</h2><span class="badge success">5 earned</span></div><div class="grid four"><div class="card success"><strong>Primeira Entrevista</strong><p>18 Mar 2027</p></div><div class="card success"><strong>10 Entrevistas</strong><p>08 Apr 2027</p></div><div class="card success"><strong>Problemaa Validado</strong><p>10 Apr 2027</p></div><div class="card"><strong>Primeiro Cliente</strong><p>Not achieved yet</p></div></div></div>
<div class="section"><div class="metric-label">Níveis de verificação</div><div class="tag-row"><span class="badge">Informação declarada</span><span class="badge success">Com evidências</span><span class="badge info">Verificado externamente</span></div></div></div>
@endsection
