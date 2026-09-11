@extends('layouts.mentor')

@section('title', 'Mentorias · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Mentoring</div><h1>Mentorias</h1><p>Agenda, histórico e entregas acordadas em cada sessão.</p></div><div class="actions"><button class="btn primary">Agendar mentoria</button></div></div>
<div class="tabs"><div class="tab active">Próximas</div><div class="tab">Concluído</div><div class="tab">Requests</div></div><div class="grid two"><div class="card tint"><div class="section-head"><div><span class="badge primary">Amanhã</span><h2 style="margin-top:8px">FinAI · Preço</h2><p>Qui · 15:00 · 45 min</p></div></div><div class="tag-row"><span class="badge">H3 Preço</span><span class="badge">5 new entrevistas</span></div><div class="actions" style="margin-top:12px"><button class="btn primary">Abrir reunião</button><button class="btn">Ver pauta</button></div></div><div class="card"><div class="section-head"><div><span class="badge">Sexday</span><h2 style="margin-top:8px">AgriSense IoT · GTM</h2><p>Sex · 10:00 · 45 min</p></div></div><div class="tag-row"><span class="badge">Channel strategy</span></div></div></div>
@endsection
