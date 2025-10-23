(function () {
  if (!/\/front\/computer\.form\.php/i.test(location.pathname))
    return;

  function getComputerName() {
    if (window.GLPI_MAJOR >= 11) {
      const el = document.querySelector('#header-friendlyname');
      if (!el) 
          return '';

      const raw = (el.textContent || '').trim();
      // Supprime "- ID <digits>" en fin de chaîne (insensible à la casse sur "ID")
      return raw.replace(/\s+-\s+ID\s+\d+\s*$/i, '');
    } else {
      const header = $('span.status.rounded-1');
      if (!header) 
          return '';

      const fullText = header.text().trim();
      const splitText = fullText.split(' - ');
      return splitText.length > 1 ? splitText.slice(1).join(' - ').trim() : '';
    }
  }

  function buildUrlFromName() {
    const name = getComputerName();
    return 'https://control.itremote.com/remote/openaccess?devicename=' + encodeURIComponent(name || '');
  }

  function createButton() {
    const a = document.createElement('a');
    a.href = buildUrlFromName();
    a.target = '_blank';
    a.rel = 'noopener';
    a.className = 'btn btn-outline-secondary itremote-action-btn';
    a.style.marginRight = '8px';
    a.innerHTML = '<i class="ti ti-screen-share me-2"></i>IT Remote';
    return a;
  }

  function insertLeftOfActions() {
    const actionsBtn = document.querySelector('#single-action');
    if (!actionsBtn) return false;

    // Évite les doublons si on recharge partiellement le DOM
    if (actionsBtn.parentElement && actionsBtn.parentElement.querySelector('.itremote-action-btn'))
      return true;

    const btn = createButton();

    // Si le bouton Actions est dans un conteneur (div, span...), on insère le nôtre juste avant
    const parent = actionsBtn.parentElement || actionsBtn;
    parent.insertBefore(btn, actionsBtn);

    return true;
  }

  function insertInActionBar() {
    const bar = document.querySelector('#single-ma-action-menu');
    if (!bar)
      return false;
    
    if (bar.querySelector('.itremote-action-btn'))
      return true;

    bar.prepend(createButton());
    return true;
  }

  // ---- Mise à jour du lien si le nom est modifié dans le formulaire ----
  function bindNameWatcher() {
    const form = getForm();
    if (!form)
        return;

    // On met à jour le href au blur/change et lors de l’input
    const handler = () => {
      const url = buildUrlFromName();
      const btn = document.querySelector('.itremote-action-btn');
      if (btn) btn.href = url;
    };

    const nameInput = form.querySelector('input[name="name"]');
    if (nameInput) {
      nameInput.addEventListener('input', handler);
      nameInput.addEventListener('change', handler);
      nameInput.addEventListener('blur', handler);
    }
  }

  function getForm() {
    let form =
      document.querySelector('form[action$="/front/computer.form.php"]') ||
      document.querySelector('form[action$="/glpi/front/computer.form.php"]');

    if (!form) {
      form =
        document.querySelector('form[action="front/computer.form.php"]') ||
        document.querySelector('form[action="glpi/front/computer.form.php"]');
    }

    if (!form) {
      form =
        document.querySelector('form#main-form[name="asset_form"]') ||
        document.querySelector('form[name="asset_form"]') ||
        document.querySelector('#main-form');
    }

    if (!form) {
      form = document.querySelector('form');
    }

    return form || null;
  }

  function init() {
    insertLeftOfActions();
    bindNameWatcher();
  }

  // 1ère passe
  if (document.readyState !== 'loading')
    init();
  else
    document.addEventListener('DOMContentLoaded', init);

  // Ré‑applique au besoin lors de rechargements partiels (changements d’onglets, etc.)
  document.addEventListener('glpi.tab.loaded', init, { once: false });

  // Au cas où une navigation interne remplace le contenu sans recharger DOMContentLoaded
  const observer = new MutationObserver((mutations) => {
    // Si un bouton Actions apparait et qu’on n’a pas encore notre bouton, on tente l’insertion
    if (document.querySelector('#single-action') && !document.querySelector('.itremote-action-btn'))
      init();
  });

  observer.observe(document.body, { childList: true, subtree: true });
})();