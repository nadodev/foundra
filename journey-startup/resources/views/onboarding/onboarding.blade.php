@extends('layouts.onboarding')

@section('title', 'Seu momento · Foundra')

@section('content')
    <div class="steps">
        <div class="step done"></div>
        <div class="step current"></div>
        <div class="step"></div>
        <div class="step"></div>
    </div>
    <div class="page-head">
        <div>
            <div class="eyebrow">Passo 2 de 4</div>
            <h1>Em que momento você está?</h1>
            <p>Usaremos isso para organizar o ponto de partida do seu workspace.</p>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger wizard-validation-alert" role="alert" aria-live="assertive"><span class="alert-icon"
                aria-hidden="true">!</span>
            <div class="alert-body">
                <div class="alert-title">Falta uma informação para continuar</div>
                <div class="alert-msg">{{ $errors->first() }}</div>
            </div>
        </div>
    @endif
    <form class="form wizard-form" method="POST" action="{{ route('onboarding.update') }}" novalidate>
        @csrf @method('PUT')
        <div class="big-choice">
            @foreach (['idea' => ['Começando uma ideia', 'Quero descobrir se existe um problema e um público real.'], 'program' => ['Participando de um programa', 'Quero estruturar validação, entrevistas, Canvas e MVP.'], 'post_program' => ['Seguindo após um programa', 'Já tenho materiais e quero continuar a evolução da startup.'], 'mvp' => ['Já tenho MVP ou clientes', 'Quero entender riscos, tração e os próximos passos.']] as $value => [$title, $description])
                <div className="flex gap-2">
                    <label class="choice" style="cursor:pointer"><input name="onboarding_stage" type="radio"
                            value="{{ $value }}" style="position:absolute;opacity:0"
                            @checked(old('onboarding_stage', $organization->onboarding_stage) === $value)><span
                            class="badge {{ $value === 'idea' ? 'primary' : ($value === 'mvp' ? 'success' : '') }}">{{ $value === 'idea' ? 'Recomendado' : 'Seu momento' }}</span><strong
                            style="margin-top:12px">{{ $title }}</strong>
                        <p>{{ $description }}</p>
                    </label>
                </div>
            @endforeach
        </div>
        @error('onboarding_stage')
            <small class="error-msg">{{ $message }}</small>
        @enderror
        <div class="card wizard-goal-card">
            <div class="field">
                <div class="wizard-field-head"><label for="onboarding_goal">O que você quer alcançar agora?</label><button
                        class="wizard-ai-trigger" type="button" data-gemini-generate data-field="onboarding_goal"
                        data-gemini-url="{{ route('ai.field.generate') }}">✦ Gerar com IA</button></div>
                <p class="wizard-field-hint">Escreva um objetivo concreto. A Foundra vai usá-lo para organizar seus próximos
                    passos.</p>
                <textarea id="onboarding_goal" name="onboarding_goal" rows="4" maxlength="1000"
                    placeholder="Ex.: validar se pequenos varejistas pagariam para reduzir o tempo de conciliação de vendas" required>{{ old('onboarding_goal', $organization->onboarding_goal) }}</textarea>
                @error('onboarding_goal')
                    <small class="error-msg">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="actions" style="justify-content:flex-end;margin-top:22px"><a class="btn"
                href="{{ route('role.select') }}">Voltar</a><button class="btn primary" type="submit">Continuar →</button>
        </div>
    </form>
@endsection
