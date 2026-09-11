@extends('layouts.entrepreneur')

@section('title', 'Experimentos · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Validação</div><h1>Experimentos</h1><p>Planeje testes que possam confirmar ou refutar hipóteses com o menor custo possível.</p></div><div class="actions"><button class="btn primary">＋ Novo experimento</button></div></div>
<div class="grid three"><div class="card tint"><span class="badge primary">Em andamento</span><h2 style="margin-top:10px">Teste de sensibilidade a preço</h2><p>Testar R$299, R$499 e R$699 com 10 potenciais compradores.</p><div class="list" style="margin-top:10px"><div class="list-item"><span>Hipótese</span><strong>H3 Preço</strong></div><div class="list-item"><span>Progresso</span><strong>4/10</strong></div><div class="list-item"><span>Critério de sucesso</span><strong>3 paid commitments</strong></div></div></div><div class="card"><span class="badge success">Concluído</span><h2 style="margin-top:10px">Rodada de entrevistas sobre o problema</h2><p>10 entrevistas sobre rotina de conciliação.</p><div class="tag-row"><span class="badge success">8 confirmed pain</span></div></div><div class="card"><span class="badge">Rascunho</span><h2 style="margin-top:10px">Teste de interesse com landing page</h2><p>Medir interesse antes de ampliar o MVP.</p></div></div>
@endsection
