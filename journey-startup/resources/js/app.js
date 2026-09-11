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

  const geminiDialog = document.querySelector('#gemini-prompt-dialog');
  const geminiPromptForm = document.querySelector('[data-gemini-prompt-form]');
  const geminiPromptInput = document.querySelector('#gemini-prompt-input');
  const geminiPromptError = document.querySelector('[data-gemini-prompt-error]');
  let pendingGeminiButton = null;

  const generateWithGemini = async (button, instruction) => {
    const form = button.closest('form');
    const field = button.dataset.field;
    const target = form?.querySelector(`[name="${field}"]`);
    if (!form || !field || !target) return;

    const originalLabel = button.dataset.geminiLabel ?? button.textContent;
    button.dataset.geminiLabel = originalLabel;
    const feedback = button.closest('.field')?.querySelector('.wizard-ai-message') ?? document.createElement('small');
    feedback.className = 'wizard-ai-message';
    button.closest('.field')?.append(feedback);
    feedback.textContent = 'A Foundra AI está preparando uma sugestão...';
    feedback.dataset.state = 'loading';
    button.disabled = true;
    button.textContent = 'Gerando...';
    form.dataset.aiGenerating = 'true';
    let cooldownSeconds = 0;

    try {
      const values = Object.fromEntries(new FormData(form).entries());
      delete values._method;
      values.field = field;
      values.instruction = instruction;
      const response = await fetch(button.dataset.geminiUrl, {
        method: 'POST', credentials: 'same-origin',
        headers: { Accept: 'application/json', 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '' },
        body: JSON.stringify(values),
      });
      const payload = await response.json();
      if (!response.ok || !payload.text) {
        const error = new Error(payload.message || 'Não foi possível gerar uma sugestão.');
        error.retryAfter = payload.retry_after || response.headers.get('Retry-After');
        throw error;
      }

      target.value = payload.text;
      target.dispatchEvent(new Event('input', { bubbles: true }));
      target.focus();
      feedback.textContent = 'Sugestão gerada. Revise e ajuste com a sua realidade.';
      feedback.dataset.state = 'success';
      cooldownSeconds = Number(payload.cooldown_seconds) || 300;
    } catch (error) {
      feedback.textContent = `${error.message || 'Não foi possível gerar uma sugestão agora.'} Você poderá tentar novamente em instantes.`;
      feedback.dataset.state = 'error';
      cooldownSeconds = Number(error.retryAfter) || 20;
    } finally {
      delete form.dataset.aiGenerating;

      if (!cooldownSeconds) {
        button.disabled = false;
        button.textContent = originalLabel;
        return;
      }

      let remaining = cooldownSeconds;
      const formatRemaining = seconds => `${Math.floor(seconds / 60)}:${String(seconds % 60).padStart(2, '0')}`;
      button.disabled = true;
      button.textContent = `Disponível em ${formatRemaining(remaining)}`;
      const countdown = window.setInterval(() => {
        remaining -= 1;
        button.textContent = remaining > 0 ? `Disponível em ${formatRemaining(remaining)}` : 'Tentar novamente';

        if (remaining <= 0) {
          window.clearInterval(countdown);
          button.disabled = false;
        }
      }, 1000);
    }
  };

  document.querySelectorAll('[data-gemini-generate]').forEach(button => {
    button.addEventListener('click', event => {
      event.preventDefault();
      event.stopPropagation();
      pendingGeminiButton = button;
      geminiPromptInput.value = '';
      geminiPromptError.hidden = true;
      geminiDialog.showModal();
      geminiPromptInput.focus();
    });
  });

  geminiPromptForm?.addEventListener('submit', event => {
    event.preventDefault();
    const instruction = geminiPromptInput.value.trim();
    if (!instruction) {
      geminiPromptError.hidden = false;
      geminiPromptInput.focus();
      return;
    }
    const button = pendingGeminiButton;
    geminiDialog.close();
    pendingGeminiButton = null;
    if (button) generateWithGemini(button, instruction);
  });

  document.querySelectorAll('[data-gemini-prompt-cancel]').forEach(button => button.addEventListener('click', () => geminiDialog.close()));

  document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', event => {
      if (form.dataset.aiGenerating === 'true') event.preventDefault();
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

    const selectedTab = tabButtons.find(button => button.getAttribute('aria-selected') === 'true') ?? tabButtons[0];
    selectTab(selectedTab);
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
