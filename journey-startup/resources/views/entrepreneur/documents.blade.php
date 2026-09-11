@extends('layouts.entrepreneur')

@section('title', 'Documentos · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Base de Conhecimento</div><h1>Documentos</h1><p>Centralize os materiais que sustentam a história da startup.</p></div><div class="actions"><button class="btn primary">＋ Enviar arquivo document</button></div></div>
<div class="grid four"><div class="card"><div class="metric-label">Pesquisa</div><div class="metric-value">12</div></div><div class="card"><div class="metric-label">Pitch</div><div class="metric-value">4</div></div><div class="card"><div class="metric-label">Entrevistas</div><div class="metric-value">18</div></div><div class="card"><div class="metric-label">MVP</div><div class="metric-value">6</div></div></div>
<table class="table section"><thead><tr><th>Document</th><th>Category</th><th>AI analysis</th><th>Updated</th></tr></thead><tbody><tr><td><strong>Pitch Deck.pdf</strong></td><td>Pitch</td><td><span class="badge success">4 assumptions identified</span></td><td>Hoje</td></tr><tr><td><strong>Entrevistas com Clientes.xlsx</strong></td><td>Pesquisa</td><td><span class="badge info">12 entrevistas linked</span></td><td>Ontem</td></tr><tr><td><strong>Lean Canvas v2.pdf</strong></td><td>Business Model</td><td><span class="badge">Importarared</span></td><td>3 dias atrás</td></tr></tbody></table>
@endsection
