@extends('layouts.public')

@section('title', 'FinAI · Passaporte da Startup · Foundra')

@section('content')
{{-- Navbar pública --}}
<nav style="border-bottom:1px solid var(--color-border);background:var(--color-surface);">
    <div class="public-nav">
        <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
            <div class="brand-logo" style="width:30px;height:30px;border-radius:7px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px;color:#fff;"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11a2 2 0 012 2v3"/><rect x="9" y="11" width="14" height="10" rx="2"/></svg>
            </div>
            <div>
                <span class="brand-name" style="font-size:15px;">Foundra</span>
                <span class="brand-sub">Passaporte Público</span>
            </div>
        </a>
        <div style="margin-left:auto;display:flex;gap:8px;align-items:center;">
            <a class="btn" href="{{ route('entrepreneur.passport') }}">Voltar ao workspace</a>
            <a class="btn primary" href="{{ route('register') }}">Criar conta grátis</a>
        </div>
    </div>
</nav>

<main class="public-profile">
    <div class="passport">
        {{-- Header do passaporte --}}
        <div class="passport-head">
            <div>
                <span class="badge success">Startup Verificada · critérios da plataforma Foundra</span>
                <h1 style="font-size:44px;margin-top:12px;">FinAI</h1>
                <p style="font-size:15px;margin-top:4px;">Automação simples de conciliação para varejistas.</p>
                <div class="tag-row">
                    <span class="badge neutral">FinTech B2B</span>
                    <span class="badge neutral">Brasil</span>
                    <span class="badge neutral">Startup Garage 2027</span>
                </div>
            </div>
            <div class="seal" style="flex-shrink:0;">74%</div>
        </div>

        {{-- Métricas --}}
        <div class="kpi-row section">
            <div class="card soft">
                <div class="metric-label">Etapa</div>
                <strong style="font-size:14px;display:block;margin-top:4px;">Validação</strong>
            </div>
            <div class="card soft">
                <div class="metric-label">Maturidade</div>
                <strong style="font-size:14px;display:block;margin-top:4px;">74%</strong>
            </div>
            <div class="card soft">
                <div class="metric-label">Entrevistas</div>
                <strong style="font-size:14px;display:block;margin-top:4px;">12</strong>
            </div>
            <div class="card soft">
                <div class="metric-label">Evidências</div>
                <strong style="font-size:14px;display:block;margin-top:4px;">48</strong>
            </div>
        </div>

        {{-- Jornada --}}
        <div class="section">
            <div class="metric-label" style="margin-bottom:8px;">Jornada da startup</div>
            <div class="timeline">
                <div class="stage done"><i></i>Ideia</div>
                <div class="stage done"><i></i>Problema</div>
                <div class="stage done"><i></i>Cliente</div>
                <div class="stage current"><i></i>Validação</div>
                <div class="stage"><i></i>MVP</div>
                <div class="stage"><i></i>Mercado</div>
            </div>
        </div>

        {{-- Highlights --}}
        <div class="section">
            <h2>Highlights da Jornada</h2>
            <div class="list" style="margin-top:12px;">
                <div class="list-item">
                    <div class="item-main">
                        <div class="dot success"></div>
                        <span class="item-title">Problema validado com evidências</span>
                    </div>
                    <span class="badge success">Com evidências</span>
                </div>
                <div class="list-item">
                    <div class="item-main">
                        <div class="dot success"></div>
                        <span class="item-title">12 entrevistas com clientes realizadas</span>
                    </div>
                    <span class="badge success">Registrado</span>
                </div>
                <div class="list-item">
                    <div class="item-main">
                        <div class="dot primary"></div>
                        <span class="item-title">Escopo do MVP definido</span>
                    </div>
                    <span class="badge neutral">Em andamento</span>
                </div>
            </div>
        </div>

        {{-- Aviso legal --}}
        <div class="card tint section">
            <p><strong style="color:var(--color-text-primary);">Startup Verificada</strong> é um reconhecimento emitido pela Foundra com base em critérios internos e nas evidências registradas na plataforma. Não representa certificação governamental ou garantia de investimento.</p>
        </div>
    </div>
</main>
@endsection
