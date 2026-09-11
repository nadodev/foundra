
document.querySelectorAll('[data-toggle]').forEach(btn=>{
  btn.addEventListener('click',()=>{
    const id=btn.getAttribute('data-toggle');
    const el=document.getElementById(id);
    if(el) el.hidden=!el.hidden;
  });
});
document.querySelectorAll('.choice').forEach(c=>{
  c.addEventListener('click',()=>{
    c.parentElement.querySelectorAll('.choice').forEach(x=>x.style.outline='none');
    c.style.outline='3px solid #ddd9ff';
  });
});
document.querySelectorAll('[data-demo-toast]').forEach(btn=>{
  btn.addEventListener('click',()=>{
    const toast=document.createElement('div');
    toast.textContent=btn.getAttribute('data-demo-toast') || 'Ação simulada no protótipo.';
    toast.style.cssText='position:fixed;right:20px;bottom:20px;background:#111827;color:white;padding:12px 16px;border-radius:10px;font:600 12px Inter,system-ui;z-index:9999;box-shadow:0 12px 30px rgba(0,0,0,.18)';
    document.body.appendChild(toast); setTimeout(()=>toast.remove(),2200);
  })
});
