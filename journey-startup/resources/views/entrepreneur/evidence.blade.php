@extends('layouts.entrepreneur')

@section('title', 'Biblioteca de Evidências · Startup Journey')

@section('content')
<div class="page-head"><div><div class="eyebrow">Evidência library</div><h1>Biblioteca de Evidências</h1><p>O histórico de fatos, sinais, entrevistas e experimentos ligados às hipóteses.</p></div><div class="actions"><button class="btn">Exportararar</button><button class="btn primary">＋ Adicionar evidências</button></div></div>
<div class="tabs"><div class="tab active">All</div><div class="tab">Entrevistas</div><div class="tab">Pesquisa de Mercado</div><div class="tab">Concorrentes</div><div class="tab">Experimentos</div><div class="tab">Documentos</div></div>
<table class="table"><thead><tr><th>Evidência</th><th>Fonte</th><th>Hipótese</th><th>Ponto forte</th><th>Verification</th><th>Data</th></tr></thead><tbody>
<tr><td><strong>8/12 lojistas relatam conciliação manual</strong><div class="item-meta">Padrão recorrente nas entrevistas.</div></td><td>Entrevistas com Clientes</td><td>H1 · Problema</td><td><span class="badge success">Forte</span></td><td><span class="badge success">Com evidências</span></td><td>12 Apr</td></tr>
<tr><td><strong>27 avaliações citam implantação complexa</strong><div class="item-meta">Reclamações de concorrentes.</div></td><td>Pesquisa de Mercado</td><td>H4 · Alternatives</td><td><span class="badge info">Médio</span></td><td><span class="badge">Fonte registrada</span></td><td>10 Apr</td></tr>
<tr><td><strong>3 clientes resistiram ao preço de R$600</strong></td><td>Entrevistas</td><td>H3 · Preço</td><td><span class="badge danger">Contraditória</span></td><td><span class="badge success">Com evidências</span></td><td>09 Apr</td></tr>
<tr><td><strong>Relatório setorial indica perdas por taxas</strong></td><td>Setor Relatório</td><td>H2 · Pain</td><td><span class="badge success">Forte</span></td><td><span class="badge info">Fonte externa</span></td><td>08 Apr</td></tr>
</tbody></table>
@endsection
