@extends('layouts.program')

@section('title', 'Startups · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Portfolio</div><h1>Startups</h1><p>Encontre rapidamente estágio, risco e última atividade de cada equipe.</p></div><div class="actions"><button class="btn">Filtrar</button><button class="btn primary">Exportararar portfólio</button></div></div>
<div class="card"><div style="display:flex;gap:8px"><div class="search" style="max-width:none;flex:1;background:white;border-color:var(--border)">⌕ Buscar startup, empreendedor ou segmento...</div><button class="btn">Etapa</button><button class="btn">Risco</button><button class="btn">Mentor</button></div></div>
<table class="table section"><thead><tr><th>Startup</th><th>Etapa</th><th>Maturidade</th><th>Última atividade</th><th>Mentor</th><th>Risco</th><th></th></tr></thead><tbody>
<tr><td><strong>FinAI</strong><div class="item-meta">FinTech B2B</div></td><td>Validação</td><td><strong>62%</strong></td><td>Hoje</td><td>Ana Costa</td><td><span class="badge danger">Preço</span></td><td><a class="btn" href="{{ route('program.startup.detail') }}">Ver</a></td></tr>
<tr><td><strong>AgriSense IoT</strong><div class="item-meta">AgriTech</div></td><td>MVP Pilot</td><td><strong>86%</strong></td><td>Hoje</td><td>Marcelo Paiva</td><td><span class="badge success">Baixo</span></td><td><a class="btn" href="{{ route('program.startup.detail') }}">Ver</a></td></tr>
<tr><td><strong>HealthFlow AI</strong><div class="item-meta">HealthTech</div></td><td>Descoberta</td><td><strong>58%</strong></td><td>2 dias atrás</td><td>Camila Valente</td><td><span class="badge warn">Cliente</span></td><td><a class="btn" href="{{ route('program.startup.detail') }}">Ver</a></td></tr>
<tr><td><strong>EduPulse</strong><div class="item-meta">EdTech</div></td><td>Idea</td><td><strong>38%</strong></td><td>4 dias atrás</td><td>—</td><td><span class="badge danger">Evidência</span></td><td><a class="btn" href="{{ route('program.startup.detail') }}">Ver</a></td></tr>
</tbody></table>
@endsection
