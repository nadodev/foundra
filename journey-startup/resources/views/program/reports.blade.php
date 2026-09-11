@extends('layouts.program')

@section('title', 'Relatórios · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Relatórioing</div><h1>Relatórios</h1><p>Gere visões objetivas para coordenação, parceiros e comitês.</p></div><div class="actions"><button class="btn primary">Gerar novo relatório</button></div></div>
<div class="grid three"><div class="card"><span class="badge primary">Turma</span><h2 style="margin-top:12px">Progresso Semanal</h2><p>Estágio, riscos, atividade e próximos marcos.</p><button class="btn" style="margin-top:12px">Gerar</button></div><div class="card"><span class="badge success">Evidência</span><h2 style="margin-top:12px">Resumo da Validação</h2><p>Hipóteses testadas, validadas, rejeitadas e principais aprendizados.</p><button class="btn" style="margin-top:12px">Gerar</button></div><div class="card"><span class="badge">Demo Day</span><h2 style="margin-top:12px">Relatório de Maturidade</h2><p>Startups prontas, riscos abertos e necessidades de mentoria.</p><button class="btn" style="margin-top:12px">Gerar</button></div></div>
<div class="card section"><h2>Relatórios recentes</h2><table class="table"><thead><tr><th>Relatório</th><th>Period</th><th>Criado por</th><th>Status</th></tr></thead><tbody><tr><td>Progresso Semanal #08</td><td>Semana 8</td><td>Mariana Souza</td><td><span class="badge success">Pronto</span></td></tr><tr><td>Resumo da Validação</td><td>Semana 7</td><td>Jornada AI</td><td><span class="badge success">Pronto</span></td></tr></tbody></table></div>
@endsection
