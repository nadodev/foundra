@extends('layouts.program')

@section('title', 'Notificações · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Atividade do Programaa</div><h1>Notificações</h1><p>Riscos, entregas, mentorias e marcos relevantes da coorte.</p></div><div class="actions"><button class="btn">Mark all as read</button></div></div>
<div class="card"><div class="list"><div class="list-item"><div class="item-main"><div class="dot danger"></div><div><div class="item-title">EduPulse inactive for 7 days</div><div class="item-meta">Turma Alpha · Risco alert</div></div></div><span class="badge danger">Risco</span></div><div class="list-item"><div class="item-main"><div class="dot primary"></div><div><div class="item-title">FinAI requested mentor review</div><div class="item-meta">Preço hypothesis</div></div></div><span class="badge primary">Mentor</span></div><div class="list-item"><div class="item-main"><div class="dot success"></div><div><div class="item-title">AgriSense reached MVP Pilot</div><div class="item-meta">Milestone achieved</div></div></div><span class="badge success">Milestone</span></div></div></div>
@endsection
