@extends('layouts.entrepreneur')

@section('title', 'Visão geral · Foundra')

@section('content')
@php
    $stageLabels = ['idea' => 'Ideia', 'program' => 'Programa', 'post_program' => 'Pós-programa', 'mvp' => 'MVP'];
    $stage = $stageLabels[$organization->onboarding_stage] ?? 'Em configuração';
@endphp

<div class="dashboard-overview">
<div class="page-head overview-hero">
    <div>
        <div class="eyebrow">Workspace de {{ auth()->user()->name }}</div>
        <h1>{{ $startup?->name ?? 'Vamos cadastrar sua startup?' }}</h1>
        <p>{{ $startup?->description ?? 'Complete o cadastro da ideia para transformar esta área em sua base de aprendizado.' }}</p>
    </div>
    <div class="actions">
        @if ($startup)
            <a class="btn" href="{{ route('entrepreneur.settings') }}#startup">Editar startup</a>
            <a class="btn primary" href="{{ route('entrepreneur.validation') }}">Criar experimento</a>
        @else
            <a class="btn primary" href="{{ route('startup.create') }}">Cadastrar minha ideia →</a>
        @endif
    </div>
</div>

@if ($startup)
    <section class="card tint overview-focus">
        <div class="section-head">
            <div>
                <div class="metric-label">Foco atual</div>
                <h2>{{ $organization->onboarding_goal ?: 'Defina o objetivo atual da sua jornada.' }}</h2>
                <p>Este é o objetivo informado no seu onboarding. Use-o para decidir o próximo experimento.</p>
            </div>
            <span class="badge primary">{{ $stage }}</span>
        </div>
        <div class="actions" style="margin-top:14px">
            <a class="btn primary" href="{{ route('entrepreneur.validation') }}">Planejar próximo teste</a>
            <a class="btn" href="{{ route('entrepreneur.settings') }}#startup">Atualizar informações</a>
        </div>
    </section>

    @if ($startup->ai_analysis)
        <section class="card overview-ai-summary">
            <div class="section-head"><div><div class="metric-label">Análise Foundra AI</div><h2>Uma leitura pronta para sua próxima conversa</h2></div><span class="badge primary">✦ Gemini</span></div>
            <div class="overview-ai-summary-text">{!! nl2br(e($startup->ai_analysis)) !!}</div>
            <a class="btn" style="margin-top:16px" href="{{ route('startup.analysis') }}">Ver análise completa</a>
        </section>
    @endif

    <section class="grid three section overview-insights">
        <article class="card"><span class="overview-card-index">01</span><div class="metric-label">Problema a investigar</div><h2>{{ $startup->problem }}</h2></article>
        <article class="card"><span class="overview-card-index">02</span><div class="metric-label">Público inicial</div><h2>{{ $startup->target_customer }}</h2></article>
        <article class="card"><span class="overview-card-index">03</span><div class="metric-label">Solução proposta</div><h2>{{ $startup->solution }}</h2></article>
    </section>

    <section class="grid two section">
        <article class="card">
            <div class="section-head"><div><div class="metric-label">Próximo passo sugerido</div><h2>Converse com {{ $startup->target_customer }}</h2></div><span class="badge warn">A validar</span></div>
            <p>Registre entrevistas para descobrir se o problema acontece com frequência e se a solução proposta é relevante.</p>
            <a class="btn primary" style="margin-top:16px" href="{{ route('entrepreneur.interviews.new') }}">Registrar entrevista</a>
        </article>
        <article class="card">
            <div class="section-head"><div><div class="metric-label">Perfil da startup</div><h2>{{ $startup->sector ?: 'Setor ainda não informado' }}</h2></div><span class="badge {{ $startup->is_public ? 'success' : '' }}">{{ $startup->is_public ? 'Perfil público' : 'Perfil privado' }}</span></div>
            <p>Os detalhes do seu workspace são mantidos no seu perfil de startup.</p>
            <a class="btn" style="margin-top:16px" href="{{ route('entrepreneur.settings') }}#startup">Gerenciar perfil</a>
        </article>
    </section>
@else
    <section class="card tint">
        <div class="section-head"><div><div class="metric-label">Seu próximo passo</div><h2>Descreva a ideia que você quer investigar.</h2><p>Com o problema, público e solução registrados, a Foundra organiza uma direção inicial para sua jornada.</p></div><span class="badge warn">Cadastro pendente</span></div>
        <a class="btn primary" style="margin-top:16px" href="{{ route('startup.create') }}">Cadastrar minha ideia →</a>
    </section>
@endif
</div>
@endsection
