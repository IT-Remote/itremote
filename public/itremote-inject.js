(function () {
  if (!/\/front\/computer\.form\.php/i.test(location.pathname))
    return;

  const FORM_SELECTORS = [
    'form[action$="/front/computer.form.php"]',
    'form[action$="/glpi/front/computer.form.php"]',
    'form[action="front/computer.form.php"]',
    'form[action="glpi/front/computer.form.php"]',
    'form#main-form[name="asset_form"]',
    'form[name="asset_form"]',
    '#main-form',
    'form'
  ];

  function getComputerName() {
    if (window.GLPI_MAJOR >= 11) {
      const el = document.querySelector('#header-friendlyname');
      if (!el)
        return '';

      // Remove the trailing "- ID <digits>"
      return (el.textContent || '').trim().replace(/\s+-\s+ID\s+\d+\s*$/i, '');
    }

    const header = $('span.status.rounded-1');
    if (!header.length)
      return '';

    const parts = header.text().trim().split(' - ');
    return parts.length > 1 ? parts.slice(1).join(' - ').trim() : '';
  }

  function buildUrlFromName() {
    return 'https://control.itremote.com/remote/openaccess?devicename=' + encodeURIComponent(getComputerName());
  }

  function createButton() {
    const a = document.createElement('a');
    a.href = buildUrlFromName();
    a.target = '_blank';
    a.rel = 'noopener';
    a.className = 'btn btn-outline-secondary itremote-action-btn me-2';
    a.innerHTML = '<i class="ti ti-screen-share me-2"></i>IT Remote';
    return a;
  }

  function insertLeftOfActions() {
    const actionsBtn = document.querySelector('#single-action');
    if (!actionsBtn)
      return;

    // Avoid duplicates on partial DOM reloads
    const parent = actionsBtn.parentElement || actionsBtn;
    if (parent.querySelector('.itremote-action-btn'))
      return;

    parent.insertBefore(createButton(), actionsBtn);
  }

  // Keep the link in sync when the name is edited in the form
  function bindNameWatcher() {
    const form = FORM_SELECTORS.map(s => document.querySelector(s)).find(Boolean);
    const nameInput = form && form.querySelector('input[name="name"]');
    if (!nameInput)
      return;

    const handler = () => {
      const btn = document.querySelector('.itremote-action-btn');
      if (btn)
        btn.href = buildUrlFromName();
    };

    ['input', 'change', 'blur'].forEach(evt => nameInput.addEventListener(evt, handler));
  }

  function init() {
    insertLeftOfActions();
    bindNameWatcher();
  }

  if (document.readyState !== 'loading')
    init();
  else
    document.addEventListener('DOMContentLoaded', init);

  // Partial reloads (tab changes, internal navigation)
  document.addEventListener('glpi.tab.loaded', init);

  new MutationObserver(() => {
    if (document.querySelector('#single-action') && !document.querySelector('.itremote-action-btn'))
      init();
  }).observe(document.body, { childList: true, subtree: true });
})();
