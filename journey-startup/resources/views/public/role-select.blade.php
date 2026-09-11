@extends('layouts.onboarding')

@section('title', 'Escolha seu perfil · Foundra')

@section('content')
<div class="steps"><div class="step current"></div><div class="step"></div><div class="step"></div><div class="step"></div></div>
<div class="page-head" style="margin-bottom:32px;">
    <div>
        <div class="eyebrow">Passo 1 de 4 · Bem-vindo à Foundra</div>
        <h1>Como você vai usar a plataforma?</h1>
        <p>Vamos configurar seu workspace inicial. Você poderá criar e alternar workspaces depois.</p>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn" type="submit">Sair</button>
    </form>
</div>

<div class="grid three">
    <form method="POST" action="{{ route('role.select.update') }}">
        @csrf @method('PUT')
        <input name="type" type="hidden" value="startup"/>
        <button class="choice" type="submit" style="width:100%;text-align:left;">
            <span class="badge primary">Recomendado</span>
            <strong style="margin-top:14px;display:block;font-size:16px;">Empreendedor</strong>
            <p style="margin-top:4px;">Estou desenvolvendo uma ideia ou startup e preciso validar meu mercado.</p>
        </button>
    </form>

    <form method="POST" action="{{ route('role.select.update') }}">
        @csrf @method('PUT')
        <input name="type" type="hidden" value="program"/>
        <button class="choice" type="submit" style="width:100%;text-align:left;">
            <span class="badge secondary">Programa</span>
            <strong style="margin-top:14px;display:block;font-size:16px;">Gestor de Programa</strong>
            <p style="margin-top:4px;">Gerencio uma incubadora, universidade ou programa de inovação.</p>
        </button>
    </form>

    <form method="POST" action="{{ route('role.select.update') }}">
        @csrf @method('PUT')
        <input name="type" type="hidden" value="mentor"/>
        <button class="choice" type="submit" style="width:100%;text-align:left;">
            <span class="badge success">Mentor</span>
            <strong style="margin-top:14px;display:block;font-size:16px;">Mentor</strong>
            <p style="margin-top:4px;">Acompanho startups, ofereço feedback especializado e apoio decisões.</p>
        </button>
    </form>
</div>
@endsection
