@extends('layouts.base')

@section('body')
<div class="shell">
    {{-- ====================================================
         SIDEBAR — Área do Empreendedor
    ==================================================== --}}
    <aside class="sidebar" id="sidebar">
        {{-- Logo Foundra --}}
        <a class="brand" href="{{ route('entrepreneur.overview') }}" style="flex-direction:column;align-items:flex-start;gap:4px;padding-bottom:14px;">
            <img src="/logo.png" alt="Foundra" style="width:108px;height:auto;">
            <span style="font-size:9.5px;font-weight:600;color:var(--text-3);letter-spacing:0.04em;padding-left:2px;">Área do Empreendedor</span>
        </a>

        {{-- Workspace ativo --}}
        <div class="workspace">
            <small>Startup ativa</small>
            <strong>FinAI</strong>
            <div style="margin-top:5px"><span class="badge primary">Validação</span></div>
        </div>

        {{-- Navegação principal --}}
        <div class="nav-section">Área de trabalho</div>
        <nav class="nav">
            <a class="{{ request()->routeIs('entrepreneur.overview') ? 'active' : '' }}" href="{{ route('entrepreneur.overview') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </span>Visão Geral
            </a>
            <a class="{{ request()->routeIs('entrepreneur.journey') ? 'active' : '' }}" href="{{ route('entrepreneur.journey') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
                </span>Jornada
            </a>
            <a class="{{ request()->routeIs('entrepreneur.validation') ? 'active' : '' }}" href="{{ route('entrepreneur.validation') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
                </span>Validação
            </a>
            <a class="{{ request()->routeIs('entrepreneur.research') ? 'active' : '' }}" href="{{ route('entrepreneur.research') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                </span>Pesquisa
            </a>
            <a class="{{ request()->routeIs('entrepreneur.interviews*') ? 'active' : '' }}" href="{{ route('entrepreneur.interviews') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                </span>Entrevistas
            </a>
            <a class="{{ request()->routeIs('entrepreneur.competitors') ? 'active' : '' }}" href="{{ route('entrepreneur.competitors') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>
                </span>Concorrentes
            </a>
            <a class="{{ request()->routeIs('entrepreneur.business-model') ? 'active' : '' }}" href="{{ route('entrepreneur.business-model') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                </span>Business Model
            </a>
            <a class="{{ request()->routeIs('entrepreneur.mvp') ? 'active' : '' }}" href="{{ route('entrepreneur.mvp') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </span>MVP
            </a>
            <a class="{{ request()->routeIs('entrepreneur.pitch*') ? 'active' : '' }}" href="{{ route('entrepreneur.pitch') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                </span>Pitch
            </a>
            <a class="{{ request()->routeIs('entrepreneur.readiness') ? 'active' : '' }}" href="{{ route('entrepreneur.readiness') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                </span>Maturidade
            </a>
            <a class="{{ request()->routeIs('entrepreneur.passport') ? 'active' : '' }}" href="{{ route('entrepreneur.passport') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg>
                </span>Passaporte
            </a>
        </nav>

        {{-- Advisory --}}
        <div class="nav-section">Advisory</div>
        <nav class="nav">
            <a class="{{ request()->routeIs('entrepreneur.mentors') ? 'active' : '' }}" href="{{ route('entrepreneur.mentors') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a4 4 0 014-4h4a4 4 0 014 4v2"/></svg>
                </span>Mentores
            </a>
            <a class="{{ request()->routeIs('entrepreneur.documents') ? 'active' : '' }}" href="{{ route('entrepreneur.documents') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </span>Documentos
            </a>
            <a class="{{ request()->routeIs('program.*') ? 'active' : '' }}" href="{{ route('program.index') }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                </span>Área do Programa
            </a>
        </nav>

        {{-- Footer --}}
        <div class="sidebar-footer">
            <nav class="nav">
                <a class="{{ request()->routeIs('entrepreneur.notifications') ? 'active' : '' }}" href="{{ route('entrepreneur.notifications') }}">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
                    </span>Notificações
                </a>
                <a class="{{ request()->routeIs('entrepreneur.journey-ai') ? 'active' : '' }}" href="{{ route('entrepreneur.journey-ai') }}">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                    </span>Jornada AI
                </a>
                <a class="{{ request()->routeIs('entrepreneur.settings') ? 'active' : '' }}" href="{{ route('entrepreneur.settings') }}">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
                    </span>Configurações
                </a>
            </nav>
            <div class="user-card">
                <div class="avatar">LG</div>
                <div>
                    <strong>Leonardo</strong>
                    <small>Empreendedor · Turma 2027</small>
                </div>
            </div>
        </div>
    </aside>

    {{-- ====================================================
         TOPBAR
    ==================================================== --}}
    <header class="topbar">
        <div class="search" role="search">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <span>Buscar hipóteses, evidências, anotações...</span>
        </div>
        <div class="top-actions">
            <a href="{{ route('entrepreneur.readiness') }}" class="badge success" style="cursor:pointer">
                Maturidade: 62%
            </a>
            <button class="btn hide-sm" data-demo-toast="Convite simulado.">Convidar membro</button>
            <a class="btn primary" href="{{ route('entrepreneur.journey-ai') }}">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                Perguntar à IA
            </a>
        </div>
    </header>

    {{-- ====================================================
         MAIN CONTENT
    ==================================================== --}}
    <main class="main">
        <div class="content">
            @yield('content')
        </div>
    </main>
</div>
@endsection
