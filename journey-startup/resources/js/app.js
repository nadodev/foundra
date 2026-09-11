document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-toggle]').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.getAttribute('data-toggle');
      const el = document.getElementById(id);
      if (el) el.hidden = !el.hidden;
    });
  });

  document.querySelectorAll('[data-foundra-header]').forEach(header => {
    const updateHeader = () => header.classList.toggle('is-scrolled', window.scrollY > 24);

    window.addEventListener('scroll', updateHeader, { passive: true });
    updateHeader();
  });

  document.querySelectorAll('.choice').forEach(c => {
    c.addEventListener('click', () => {
      c.parentElement.querySelectorAll('.choice').forEach(x => x.style.outline = 'none');
      c.style.outline = '3px solid #ddd9ff';
    });
  });

  document.querySelectorAll('[data-demo-toast]').forEach(btn => {
    btn.addEventListener('click', () => {
      const toast = document.createElement('div');
      toast.textContent = btn.getAttribute('data-demo-toast') || 'Ação simulada no protótipo.';
      toast.style.cssText = 'position:fixed;right:20px;bottom:20px;background:#111827;color:white;padding:12px 16px;border-radius:10px;font:600 12px Inter,system-ui;z-index:9999;box-shadow:0 12px 30px rgba(0,0,0,.18)';
      document.body.appendChild(toast);
      setTimeout(() => toast.remove(), 2200);
    });
  });

  document.querySelectorAll('[data-foundra-tabs]').forEach(tabs => {
    const tabButtons = [...tabs.querySelectorAll('[data-foundra-tab]')];
    const panels = [...tabs.querySelectorAll('[data-foundra-panel-tab]')];

    const selectTab = button => {
      tabButtons.forEach(tabButton => {
        const isActive = tabButton === button;
        tabButton.setAttribute('aria-selected', String(isActive));
        document.getElementById(tabButton.dataset.foundraTab).hidden = !isActive;
      });
    };

    tabButtons.forEach((button, index) => {
      button.addEventListener('click', () => selectTab(button));
      button.addEventListener('keydown', event => {
        if (!['ArrowDown', 'ArrowUp', 'Home', 'End'].includes(event.key)) return;

        event.preventDefault();
        const nextIndex = event.key === 'Home' ? 0 : event.key === 'End' ? tabButtons.length - 1 : (index + (event.key === 'ArrowDown' ? 1 : -1) + tabButtons.length) % tabButtons.length;
        tabButtons[nextIndex].focus();
        selectTab(tabButtons[nextIndex]);
      });
    });

    panels.forEach(panel => panel.hidden = panel.id !== tabButtons[0].dataset.foundraTab);
  });

  document.querySelectorAll('[data-foundra-story]').forEach(story => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const panel = story.querySelector('[data-foundra-panel]');
    const content = story.querySelector('[data-foundra-story-content]');
    let targetProgress = 0;
    let progress = 0;

    const clamp = (value, min, max) => Math.min(Math.max(value, min), max);
    const range = (value, start, end) => clamp((value - start) / (end - start), 0, 1);

    const updateTarget = () => {
      const rect = story.getBoundingClientRect();
      targetProgress = clamp(-rect.top / (story.offsetHeight - window.innerHeight), 0, 1);
    };

    const animate = () => {
      progress += (targetProgress - progress) * 0.08;
      const expansion = range(progress, 0, 0.18);
      const contentProgress = range(progress, 0.08, 0.3);
      const opacity = contentProgress < 0.2 ? contentProgress / 0.2 : 1;

      panel.style.width = `${88 + 12 * expansion}vw`;
      panel.style.height = `${72 + 28 * expansion}vh`;
      panel.style.borderRadius = `${28 * (1 - expansion)}px`;
      content.style.transform = `translate3d(0, ${32 - 32 * contentProgress}px, 0)`;
      content.style.opacity = String(clamp(opacity, 0, 1));

      requestAnimationFrame(animate);
    };

    window.addEventListener('scroll', updateTarget, { passive: true });
    window.addEventListener('resize', updateTarget);
    updateTarget();
    animate();
  });
});
