@extends('layouts.entrepreneur')

@section('title', 'Jornada · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Startup trajectory</div><h1>Jornada</h1><p>Veja como a startup evoluiu e o que precisa acontecer antes do próximo estágio.</p></div><div class="actions"><button class="btn">Ver histórico</button></div></div>
<div class="split wide"><div class="list">
<div class="card success"><div class="section-head"><div><span class="badge success">Concluído</span><h2 style="margin-top:8px">01 · Idea</h2></div><strong>100%</strong></div><p>Problemaa, cliente e solução inicial estruturados.</p></div>
<div class="card success"><div class="section-head"><div><span class="badge success">Concluído</span><h2 style="margin-top:8px">02 · Descoberta do Problemaa</h2></div><strong>100%</strong></div><div class="tag-row"><span class="badge success">✓ Problema statement</span><span class="badge success">✓ Initial ICP</span><span class="badge success">✓ 3 critical assumptions</span></div></div>
<div class="card tint"><div class="section-head"><div><span class="badge primary">Você está aqui</span><h2 style="margin-top:8px">03 · Descoberta de Clientes</h2></div><strong>67%</strong></div><div class="progress"><span style="width:67%"></span></div><div class="list" style="margin-top:10px"><div class="list-item"><span>✓ ICP inicial definido</span><span class="badge success">Concluído</span></div><div class="list-item"><span>✓ 5 entrevistas</span><span class="badge success">Concluído</span></div><div class="list-item"><span>○ 10 entrevistas</span><span class="badge">8/10</span></div><div class="list-item"><span>○ Padrão de dor identificado</span><span class="badge">Em andamento</span></div><div class="list-item"><span>○ Urgência validada</span><span class="badge warn">Precisa de evidências</span></div></div><div class="actions" style="margin-top:10px"><a class="btn primary" href="{{ route('entrepreneur.interviews') }}">Continuar etapa</a></div></div>
<div class="card"><div class="section-head"><div><span class="badge">Próximo</span><h2 style="margin-top:8px">04 · Validação</h2></div><strong>32%</strong></div><p>Teste hipóteses críticas, principalmente disposição a pagar.</p></div>
<div class="card"><h2>05 · Business Model</h2><p>Estruture um modelo baseado no que foi aprendido.</p></div>
<div class="card"><h2>06 · MVP</h2><p>Construa apenas o necessário para testar a próxima hipótese.</p></div>
<div class="card"><h2>07 · Mercado</h2><p>Primeiros usuários, clientes e métricas reais.</p></div>
<div class="card"><h2>08 · Tração</h2><p>Retenção, receita e crescimento.</p></div>
</div><div><div class="card tint" style="position:sticky;top:88px"><div class="metric-label">Foco Atual</div><h2>Continuar conversando com clientes.</h2><p>Você ainda não possui evidência suficiente sobre urgência e preço.</p><div class="section"><div class="metric-label">Próximo passo recomendado</div><h3>Realizar mais 2 entrevistas com gestores financeiros.</h3><p>Procure quem já paga por alguma alternativa.</p></div><a class="btn primary" href="{{ route('entrepreneur.interviews') }}" style="margin-top:14px">Planejar entrevistas</a></div></div></div>
@endsection
