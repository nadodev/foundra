@extends('layouts.entrepreneur')

@section('title', 'Perfil e configurações · Foundra')

@section('content')
@php($activeTab = $errors->getBag('startup')->any() ? 'startup' : 'profile')

<div class="page-head"><div><div class="eyebrow">Área de trabalho</div><h1>Configurações</h1><p>Gerencie seu perfil e os dados da sua startup.</p></div></div>
@if (session('status'))<div class="alert alert-success" role="status"><span class="alert-icon" aria-hidden="true">✓</span><div class="alert-body"><div class="alert-title">Alterações salvas</div><div class="alert-msg">{{ session('status') }}</div></div></div>@endif

<div class="tabs" data-foundra-tabs>
    <div role="tablist" aria-label="Configurações">
        <button class="tab" type="button" role="tab" id="profile-tab" aria-controls="perfil" aria-selected="{{ $activeTab === 'profile' ? 'true' : 'false' }}" data-foundra-tab="perfil">Perfil</button>
        <button class="tab" type="button" role="tab" id="startup-tab" aria-controls="startup" aria-selected="{{ $activeTab === 'startup' ? 'true' : 'false' }}" data-foundra-tab="startup">Startup</button>
    </div>
</div>

<section id="perfil" class="card" role="tabpanel" aria-labelledby="profile-tab" data-foundra-panel-tab @if ($activeTab !== 'profile') hidden @endif>
    <div class="section-head"><div><h2>Perfil</h2><p>Estes dados identificam sua conta na Foundra.</p></div></div>
    <form class="form" method="POST" action="{{ route('entrepreneur.settings.profile.update') }}" novalidate>
        @csrf @method('PUT')
        <div class="field"><label for="profile_name">Nome</label><input id="profile_name" name="name" value="{{ old('name', auth()->user()->name) }}" autocomplete="name" required>@error('name', 'profile')<small class="error-msg">{{ $message }}</small>@enderror</div>
        <div class="field"><label for="profile_email">E-mail</label><input id="profile_email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" autocomplete="email" required>@error('email', 'profile')<small class="error-msg">{{ $message }}</small>@enderror</div>
        <div class="field"><label for="job_title">Cargo</label><input id="job_title" name="job_title" value="{{ old('job_title', auth()->user()->job_title) }}" placeholder="Ex.: Fundador(a)" autocomplete="organization-title">@error('job_title', 'profile')<small class="error-msg">{{ $message }}</small>@enderror</div>
        <div class="actions" style="justify-content:flex-end;margin-top:4px"><button class="btn primary" type="submit">Salvar perfil</button></div>
    </form>
</section>

<section id="startup" class="card" role="tabpanel" aria-labelledby="startup-tab" data-foundra-panel-tab @if ($activeTab !== 'startup') hidden @endif>
    <div class="section-head"><div><h2>Startup</h2><p>Informações usadas no seu workspace.</p></div></div>
    @if ($startup)
        <form class="form" method="POST" action="{{ route('entrepreneur.settings.startup.update') }}" novalidate>
            @csrf @method('PUT')
            <div class="field"><label for="startup_name">Nome</label><input id="startup_name" name="name" value="{{ old('name', $startup->name) }}" required>@error('name', 'startup')<small class="error-msg">{{ $message }}</small>@enderror</div>
            <div class="field"><label for="sector">Setor</label><input id="sector" name="sector" value="{{ old('sector', $startup->sector) }}" placeholder="Ex.: Fintech B2B">@error('sector', 'startup')<small class="error-msg">{{ $message }}</small>@enderror</div>
            <div class="field"><label>Perfil público</label><input type="hidden" name="is_public" value="0"><label class="settings-switch" for="is_public"><input id="is_public" name="is_public" type="checkbox" value="1" @checked(old('is_public', $startup->is_public))><span aria-hidden="true"></span><em>Permitir que esta startup apareça no perfil público.</em></label>@error('is_public', 'startup')<small class="error-msg">{{ $message }}</small>@enderror</div>
            <div class="actions" style="justify-content:flex-end;margin-top:4px"><button class="btn primary" type="submit">Salvar startup</button></div>
        </form>
    @else
        <div class="alert alert-warning"><span class="alert-icon" aria-hidden="true">!</span><div class="alert-body"><div class="alert-title">Sua startup ainda não foi cadastrada</div><div class="alert-msg">Conclua o wizard para adicionar os dados da startup aqui.</div></div></div>
        <a class="btn primary" style="margin-top:16px" href="{{ route('startup.create') }}">Cadastrar startup</a>
    @endif
</section>
@endsection
