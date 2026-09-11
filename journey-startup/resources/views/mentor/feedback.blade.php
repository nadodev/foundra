@extends('layouts.mentor')

@section('title', 'Feedback · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Fila de Feedback</div><h1>Feedback</h1><p>Itens que aguardam sua leitura, comentário ou recomendação.</p></div><div class="actions"></div></div>
<div class="card"><div class="list"><div class="list-item"><div><div class="item-title">FinAI · Preço hypothesis update</div><div class="item-meta">3 new entrevistas linked</div></div><div class="actions"><span class="badge danger">Crítica</span><a class="btn" href="{{ route('mentor.startup.detail') }}">Revisar</a></div></div><div class="list-item"><div><div class="item-title">HealthFlow AI · ICP change</div><div class="item-meta">Público alterado after 6 entrevistas</div></div><div class="actions"><span class="badge warn">Médio</span><button class="btn">Revisar</button></div></div></div></div>
@endsection
