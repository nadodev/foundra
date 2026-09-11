@extends('layouts.base')

@section('body')
<div style="min-height:100vh; background:var(--bg); padding: 0 0 80px;">
    <nav style="display:flex; align-items:center; padding:16px 32px; border-bottom:1px solid var(--border); background:var(--surface);">
        <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:8px;text-decoration:none;">
            <img src="/logo.png" alt="Foundra" style="width:96px;height:auto;">
        </a>
        <span style="margin-left:auto; font-size:12px; color:var(--text-3);">ideias que viram startups</span>
    </nav>
    <div class="onboarding">
        @yield('content')
    </div>
</div>
@endsection
