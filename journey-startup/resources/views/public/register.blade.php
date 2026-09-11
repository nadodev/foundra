@extends('layouts.public')

@section('title', 'Criar conta · Foundra')

@section('content')
<div class="auth">
    <section class="auth-side">
        <a href="{{ route('home') }}" style="display:flex;align-items:center;text-decoration:none;">
            <img src="/logo.png" alt="Foundra" style="width:100px;height:auto;filter:brightness(0) invert(1);">
        </a>
        <div>
            <span class="badge" style="background:rgba(253,92,45,0.2);color:#FF9475;border-color:rgba(253,92,45,0.3);">Comece sua jornada</span>
            <h1 style="font-size:40px;margin-top:18px;color:white;line-height:1.1;">Ideias que viram startups baseadas em evidências.</h1>
            <p>Crie seu workspace e transforme cada decisão em aprendizado real.</p>
            <div class="timeline" style="margin-top:36px;">
                <div class="stage done"><i></i>Ideia</div>
                <div class="stage done"><i></i>Descoberta</div>
                <div class="stage current"><i></i>Validação</div>
                <div class="stage"><i></i>MVP</div>
            </div>
        </div>
        <small style="color:rgba(255,255,255,0.35);">Teste grátis por 14 dias · Sem cartão de crédito</small>
    </section>

    <section class="auth-main">
        <div class="auth-box">
            <a class="auth-mobile-brand" href="{{ route('home') }}"><img src="/logo.png" alt="Foundra"></a>
            <div class="eyebrow">Crie sua conta</div>
            <h1>Começar na Foundra</h1>
            <p style="margin-top:6px;">Seu primeiro workspace será criado automaticamente.</p>

            <form class="form" method="POST" action="{{ route('register') }}" style="margin-top:24px;" novalidate>
                @csrf
                <div class="field">
                    <label for="name">Nome completo</label>
                    <input id="name" class="input" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Seu nome" required autofocus/>
                    @error('name')<small class="error-msg">{{ $message }}</small>@enderror
                </div>
                <div class="field">
                    <label for="email">E-mail</label>
                    <input id="email" class="input" name="email" type="email" value="{{ old('email') }}" autocomplete="email" placeholder="voce@exemplo.com" required/>
                    @error('email')<small class="error-msg">{{ $message }}</small>@enderror
                </div>
                <div class="field">
                    <label for="password">Senha</label>
                    <input id="password" class="input" name="password" type="password" placeholder="Min. 8 caracteres" autocomplete="new-password" required/>
                    @error('password')<small class="error-msg">{{ $message }}</small>@enderror
                </div>
                <div class="field">
                    <label for="password_confirmation">Confirme sua senha</label>
                    <input id="password_confirmation" class="input" name="password_confirmation" type="password" placeholder="Repita a senha" autocomplete="new-password" required/>
                    @error('password_confirmation')<small class="error-msg">{{ $message }}</small>@enderror
                </div>
                <button class="btn btn-primary" type="submit" style="width:100%;justify-content:center;height:42px;font-size:14px;">Criar conta grátis →</button>
            </form>

            <p style="margin-top:20px;font-size:12.5px;color:var(--text-3);">
                Já possui conta?
                <a href="{{ route('login') }}" style="color:var(--primary);font-weight:700;">Entrar</a>
            </p>
        </div>
    </section>
</div>
@endsection
