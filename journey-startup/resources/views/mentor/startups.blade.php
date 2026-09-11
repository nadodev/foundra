@extends('layouts.mentor')

@section('title', 'Minhas Startups · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Portfolio</div><h1>Minhas Startups</h1><p>Startups em que você possui vínculo ativo de mentoria.</p></div><div class="actions"></div></div>
<div class="grid two"><div class="card"><div class="section-head"><div><h2>FinAI</h2><p>Validação · Maturidade 62%</p></div><span class="badge danger">Preço</span></div><p>Próximo foco: transformar entrevistas de preço em decisão.</p><a class="btn" href="{{ route('mentor.startup.detail') }}" style="margin-top:12px">Abrir startup</a></div><div class="card"><div class="section-head"><div><h2>AgriSense IoT</h2><p>MVP · Maturidade 86%</p></div><span class="badge warn">GTM</span></div><p>Próximo foco: definir canal de aquisição para piloto.</p><a class="btn" href="{{ route('mentor.startup.detail') }}" style="margin-top:12px">Abrir startup</a></div></div>
@endsection
