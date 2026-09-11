<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Foundra')</title>

    {{-- Google Fonts: Sora (headings) + Inter (body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Styles & Scripts with Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="@yield('body-class', '')">
    @yield('body')

    <dialog class="gemini-prompt-dialog" id="gemini-prompt-dialog" aria-labelledby="gemini-prompt-title">
        <form method="dialog" data-gemini-prompt-form>
            <div class="gemini-prompt-dialog-head"><span>✦ Foundra AI</span><button type="button" data-gemini-prompt-cancel aria-label="Fechar">×</button></div>
            <h2 id="gemini-prompt-title">Como você quer orientar esta sugestão?</h2>
            <p>Explique o ângulo, tom ou detalhe que a IA deve priorizar. Ela usará isso junto dos dados já preenchidos.</p>
            <label for="gemini-prompt-input">Sua orientação</label>
            <textarea id="gemini-prompt-input" rows="5" maxlength="1000" placeholder="Ex.: Quero focar em pequenos varejistas que perdem tempo conferindo pagamentos. Use um tom direto e sem promessas exageradas." required></textarea>
            <small class="gemini-prompt-error" data-gemini-prompt-error hidden>Escreva uma orientação para gerar a sugestão.</small>
            <div class="gemini-prompt-dialog-actions"><button class="btn" type="button" data-gemini-prompt-cancel>Cancelar</button><button class="btn primary" type="submit">Gerar sugestão →</button></div>
        </form>
    </dialog>

    @stack('scripts')
</body>
</html>
