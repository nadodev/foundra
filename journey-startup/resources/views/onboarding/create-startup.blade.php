@extends('layouts.onboarding')

@section('title', 'Sua startup · Foundra')

@section('content')
<div class="steps"><div class="step done"></div><div class="step done"></div><div class="step current"></div><div class="step"></div></div>
<div class="page-head"><div><div class="eyebrow">Passo 3 de 4</div><h1>Conte sobre sua startup</h1><p>Quanto mais claro o contexto, mais útil será sua jornada de validação.</p></div></div>

<form class="form wizard-form" method="POST" action="{{ route('startup.store') }}" novalidate>
    @csrf
    <div class="grid two">
        <div class="card wizard-form-card">
            <div class="field">
                <div class="wizard-field-head"><label for="name">Nome provisório</label></div>
                <input id="name" name="name" value="{{ old('name', $startup?->name) }}" placeholder="Ex.: Minha Startup" required>
                @error('name')<small class="error-msg">{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <div class="wizard-field-head"><label for="description">Descreva sua ideia</label><button class="wizard-ai-trigger" type="button" data-gemini-generate data-field="description" data-gemini-url="{{ route('ai.field.generate') }}">✦ Gerar com IA</button></div>
                <textarea id="description" name="description" rows="5" placeholder="O que você quer construir? Conte a ideia com suas próprias palavras." required>{{ old('description', $startup?->description) }}</textarea>
                @error('description')<small class="error-msg">{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <div class="wizard-field-head"><label for="problem">Qual problema você acredita resolver?</label><button class="wizard-ai-trigger" type="button" data-gemini-generate data-field="problem" data-gemini-url="{{ route('ai.field.generate') }}">✦ Gerar com IA</button></div>
                <textarea id="problem" name="problem" rows="5" placeholder="Qual dificuldade ou necessidade existe hoje? Para quem ela acontece?" required>{{ old('problem', $startup?->problem) }}</textarea>
                @error('problem')<small class="error-msg">{{ $message }}</small>@enderror
            </div>
        </div>
        <div class="card wizard-form-card">
            <div class="field">
                <div class="wizard-field-head"><label for="target_customer">Quem vive esse problema?</label><button class="wizard-ai-trigger" type="button" data-gemini-generate data-field="target_customer" data-gemini-url="{{ route('ai.field.generate') }}">✦ Gerar com IA</button></div>
                <textarea id="target_customer" name="target_customer" rows="4" placeholder="Ex.: pequenos varejistas que conciliam vendas manualmente" required>{{ old('target_customer', $startup?->target_customer) }}</textarea>
                @error('target_customer')<small class="error-msg">{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <div class="wizard-field-head"><label for="solution">Como sua solução ajudaria?</label><button class="wizard-ai-trigger" type="button" data-gemini-generate data-field="solution" data-gemini-url="{{ route('ai.field.generate') }}">✦ Gerar com IA</button></div>
                <textarea id="solution" name="solution" rows="5" placeholder="Descreva a mudança que sua solução propõe." required>{{ old('solution', $startup?->solution) }}</textarea>
                @error('solution')<small class="error-msg">{{ $message }}</small>@enderror
            </div>
            <div class="card tint wizard-goal-summary"><div class="metric-label">Seu objetivo atual</div><p>{{ $organization->onboarding_goal }}</p></div>
        </div>
    </div>
    <div class="actions" style="justify-content:flex-end;margin-top:22px"><a class="btn" href="{{ route('onboarding') }}">Voltar</a><button class="btn primary" type="submit">Revisar minha startup →</button></div>
</form>
@endsection
