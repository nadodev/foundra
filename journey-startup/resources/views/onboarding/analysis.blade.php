@extends('layouts.onboarding')

@section('title', 'Revisão inicial · Foundra')

@section('content')
<div class="steps"><div class="step done"></div><div class="step done"></div><div class="step done"></div><div class="step current"></div></div><div class="page-head"><div><div class="eyebrow">Passo 4 de 4</div><h1>Revise o ponto de partida</h1><p>Este resumo usa exatamente o que você informou. Você poderá editar tudo depois.</p></div><span class="badge success">Pronto para validar</span></div>
@if ($startup->ai_analysis)
    <section class="card tint ai-startup-analysis"><div class="section-head"><div><div class="eyebrow">ANÁLISE FOUNDRA AI</div><h2>Uma primeira leitura para sua apresentação</h2></div><span class="badge primary">✦ Gemini</span></div><div class="ai-startup-analysis-text">{!! nl2br(e($startup->ai_analysis)) !!}</div><p class="ai-analysis-note">Use esta análise como ponto de partida. Revise cada hipótese antes de apresentá-la como fato.</p></section>
@else
    <div class="alert alert-warning"><span class="alert-icon" aria-hidden="true">!</span><div class="alert-body"><div class="alert-title">Análise por IA indisponível</div><div class="alert-msg">Adicione sua GEMINI_API_KEY ao .env e salve os dados da startup novamente para gerar a análise.</div></div></div>
@endif
<div class="grid two" style="margin-top:16px"><div class="card"><div class="metric-label">Startup</div><h2>{{ $startup->name }}</h2><p>{{ $startup->description }}</p></div><div class="card"><div class="metric-label">Público inicial</div><h2>{{ $startup->target_customer }}</h2><p>Este é o grupo que ajudará a confirmar ou desafiar suas hipóteses.</p></div><div class="card"><div class="metric-label">Problema a investigar</div><h2>{{ $startup->problem }}</h2></div><div class="card"><div class="metric-label">Solução proposta</div><h2>{{ $startup->solution }}</h2></div></div><div class="actions" style="justify-content:flex-end;margin-top:22px"><a class="btn" href="{{ route('startup.create') }}">Editar informações</a><a class="btn primary" href="{{ route('entrepreneur.overview') }}">Concluir onboarding →</a></div>
@endsection
