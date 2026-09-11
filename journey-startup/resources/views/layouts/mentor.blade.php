@extends('layouts.base')

@section('body')
<div class="shell">
    <aside class="sidebar" id="sidebar">
        <a class="brand" href="{{ route('mentor.index') }}" style="flex-direction:column;align-items:flex-start;gap:4px;padding-bottom:14px;">
            <img src="/logo.png" alt="Foundra" style="width:108px;height:auto;">
            <span style="font-size:9.5px;font-weight:600;color:var(--text-3);letter-spacing:0.04em;padding-left:2px;">Área do Mentor</span>
        </a>

        <div class="workspace">
            <small>Mentor</small>
            <strong>Ana Costa</strong>
            <div style="margin-top:5px"><span class="badge primary">Preço &amp; B2B SaaS</span></div>
        </div>

        <div class="nav-section">Mentor</div>
        <nav class="nav">
            <a class="{{ request()->routeIs('mentor.index') ? 'active' : '' }}" href="{{ route('mentor.index') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></span>Painel
            </a>
            <a class="{{ request()->routeIs('mentor.startups') || request()->routeIs('mentor.startup.*') ? 'active' : '' }}" href="{{ route('mentor.startups') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></span>Minhas Startups
            </a>
            <a class="{{ request()->routeIs('mentor.sessions') ? 'active' : '' }}" href="{{ route('mentor.sessions') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>Mentorias
            </a>
            <a class="{{ request()->routeIs('mentor.feedback') ? 'active' : '' }}" href="{{ route('mentor.feedback') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></span>Feedback
            </a>
            <a class="{{ request()->routeIs('mentor.profile') ? 'active' : '' }}" href="{{ route('mentor.profile') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>Perfil
            </a>
        </nav>

        <div class="nav-section">Alternar visão</div>
        <nav class="nav">
            <a href="{{ route('entrepreneur.overview') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg></span>Área do Empreendedor
            </a>
            <a href="{{ route('program.index') }}">
                <span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></span>Área do Programa
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-card">
                <div class="avatar">AC</div>
                <div>
                    <strong>Ana Costa</strong>
                    <small>Mentor principal</small>
                </div>
            </div>
        </div>
    </aside>

    <header class="topbar">
        <div class="search" role="search">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <span>Buscar startup ou hipótese...</span>
        </div>
        <div class="top-actions">
            <span class="badge success">4 startups ativas</span>
            <a class="btn primary" href="{{ route('mentor.sessions') }}">Agendar mentoria</a>
        </div>
    </header>

    <main class="main">
        <div class="content">
            @yield('content')
        </div>
    </main>
</div>
@endsection
