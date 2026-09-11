@extends('layouts.base')

@section('body')
<div class="shell">
    <aside class="sidebar" id="sidebar">
        <a class="brand" href="{{ route('program.index') }}" style="flex-direction:column;align-items:flex-start;gap:4px;padding-bottom:14px;">
            <img src="/logo.png" alt="Foundra" style="width:108px;height:auto;">
            <span style="font-size:9.5px;font-weight:600;color:var(--text-3);letter-spacing:0.04em;padding-left:2px;">Área do Programa</span>
        </a>

        <div class="workspace">
            <small>Programa</small>
            <strong>Startup Garage 2027</strong>
            <div style="margin-top:5px"><span class="badge primary">Turma Alpha</span></div>
        </div>

        <div class="nav-section">Programa</div>
        <nav class="nav">
            <a class="{{ request()->routeIs('program.index') ? 'active' : '' }}" href="{{ route('program.index') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></span>Visão Geral
            </a>
            <a class="{{ request()->routeIs('program.startups*') || request()->routeIs('program.startup.*') ? 'active' : '' }}" href="{{ route('program.startups') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></span>Startups
            </a>
            <a class="{{ request()->routeIs('program.cohort') ? 'active' : '' }}" href="{{ route('program.cohort') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg></span>Turmas
            </a>
            <a class="{{ request()->routeIs('program.mentors') ? 'active' : '' }}" href="{{ route('program.mentors') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a4 4 0 014-4h4a4 4 0 014 4v2"/></svg></span>Mentores
            </a>
            <a class="{{ request()->routeIs('program.reports') ? 'active' : '' }}" href="{{ route('program.reports') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></span>Relatórios
            </a>
            <a class="{{ request()->routeIs('program.notifications') ? 'active' : '' }}" href="{{ route('program.notifications') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg></span>Notificações
            </a>
            <a class="{{ request()->routeIs('program.settings') ? 'active' : '' }}" href="{{ route('program.settings') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/></svg></span>Configurações
            </a>
        </nav>

        <div class="nav-section">Alternar visão</div>
        <nav class="nav">
            <a href="{{ route('entrepreneur.overview') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg></span>Área do Empreendedor
            </a>
            <a href="{{ route('mentor.index') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a4 4 0 014-4h4a4 4 0 014 4v2"/></svg></span>Área do Mentor
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-card">
                <div class="avatar">MS</div>
                <div>
                    <strong>Mariana Souza</strong>
                    <small>Gestora do Programa</small>
                </div>
            </div>
        </div>
    </aside>

    <header class="topbar">
        <div class="search" role="search">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <span>Buscar startups...</span>
        </div>
        <div class="top-actions">
            <span class="badge success">24 startups</span>
            <button class="btn" data-demo-toast="Convite enviado com sucesso!">Convidar startup</button>
            <a class="btn primary" href="{{ route('program.reports') }}">Gerar relatório</a>
        </div>
    </header>

    <main class="main">
        <div class="content">
            @yield('content')
        </div>
    </main>
</div>
@endsection
