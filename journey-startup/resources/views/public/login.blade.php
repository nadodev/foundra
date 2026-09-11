@extends('layouts.public')

@section('title', 'Entrar · Foundra')

@section('content')
<div class="auth">
    <section class="auth-side">
        <a href="{{ route('home') }}" style="display:flex;align-items:center;text-decoration:none;">
            <img src="/logo.png" alt="Foundra" style="width:100px;height:auto;filter:brightness(0) invert(1);">
        </a>
        <div>
            <span class="badge" style="background:rgba(253,92,45,0.2);color:#FF9475;border-color:rgba(253,92,45,0.3);">Continuar sua jornada</span>
            <h1 style="font-size:40px;margin-top:18px;color:white;line-height:1.1;">Sua startup aprende a cada evidência.</h1>
            <p>Retome hipóteses, pesquisas, entrevistas e próximos passos de onde parou.</p>
            <div class="timeline" style="margin-top:36px;">
                <div class="stage done"><i></i>Ideia</div>
                <div class="stage done"><i></i>Descoberta</div>
                <div class="stage current"><i></i>Validação</div>
                <div class="stage"><i></i>MVP</div>
            </div>
        </div>
        <small style="color:rgba(255,255,255,0.35);">Foundra · Plataforma de Validação</small>
    </section>

    <section class="auth-main">
        <div class="auth-box">
            <a class="auth-mobile-brand" href="{{ route('home') }}"><img src="/logo.png" alt="Foundra"></a>
            <div class="eyebrow">Bem-vindo de volta</div>
            <h1>Entrar</h1>
            <p style="margin-top:6px;">Acesse sua conta e continue a validação da sua startup.</p>

            <form class="form" style="margin-top:24px;" action="{{ route('login') }}" method="POST" novalidate>
                @csrf
                <div class="field">
                    <label for="email">E-mail</label>
                    <input id="email" class="input" name="email" type="email" value="{{ old('email') }}" autocomplete="email" placeholder="voce@exemplo.com" required autofocus />
                    @error('email')<small class="error-msg">{{ $message }}</small>@enderror
                </div>
                <div class="field">
                    <label for="password">Senha</label>
                    <input id="password" class="input" name="password" type="password" autocomplete="current-password" placeholder="••••••••" required />
                    @error('password')<small class="error-msg">{{ $message }}</small>@enderror
                </div>
                <label style="display:flex;align-items:center;gap:8px;color:var(--text-2);font-size:12px;"><input name="remember" type="checkbox" value="1" /> Manter conectado</label>
                <button class="btn btn-primary" type="submit" style="width:100%;justify-content:center;height:42px;font-size:14px;">Entrar →</button>
            </form>

            <div class="divider">ou</div>
            <button class="btn" style="width:100%;justify-content:center;">Continuar com Google</button>

            <p style="margin-top:20px;font-size:12.5px;color:var(--text-3);">
                Ainda não possui conta?
                <a href="{{ route('register') }}" style="color:var(--primary);font-weight:700;">Criar conta grátis</a>
            </p>
        </div>
    </section>
</div>
@endsection
