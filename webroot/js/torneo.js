/* =====================================================================
   Torneo Infantil · Interacciones de la interfaz
   No modifica la lógica de CakePHP: solo mejora la experiencia visual.
   ===================================================================== */
(function () {
    'use strict';

    var reduceMotion = window.matchMedia &&
        window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* -------------------------------------------------------------
       Menú lateral en celular
       ------------------------------------------------------------- */
    var body = document.body;
    var menuBtn = document.getElementById('menuToggle');
    var scrim = document.getElementById('scrim');

    function setNav(open) {
        body.classList.toggle('nav-open', open);
        if (menuBtn) {
            menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
        }
    }

    if (menuBtn) {
        menuBtn.addEventListener('click', function () {
            setNav(!body.classList.contains('nav-open'));
        });
    }
    if (scrim) {
        scrim.addEventListener('click', function () { setNav(false); });
    }
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { setNav(false); }
    });

    /* Borde de la barra superior al hacer scroll */
    var topbar = document.querySelector('.topbar');
    if (topbar) {
        var onScroll = function () {
            topbar.classList.toggle('is-scrolled', window.scrollY > 4);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    /* -------------------------------------------------------------
       Notificaciones (mensajes Flash)
       ------------------------------------------------------------- */
    function closeToast(toast) {
        if (!toast || toast.classList.contains('is-leaving')) { return; }
        toast.classList.add('is-leaving');
        setTimeout(function () {
            if (toast.parentNode) { toast.parentNode.removeChild(toast); }
        }, 360);
    }

    document.querySelectorAll('.toast').forEach(function (toast) {
        var life = parseInt(toast.getAttribute('data-life') || '5000', 10);
        toast.style.setProperty('--life', life + 'ms');
        var timer = setTimeout(function () { closeToast(toast); }, life);

        toast.addEventListener('mouseenter', function () {
            clearTimeout(timer);
            var bar = toast.querySelector('.toast__timer');
            if (bar) { bar.style.animationPlayState = 'paused'; }
        });
        toast.addEventListener('mouseleave', function () {
            var bar = toast.querySelector('.toast__timer');
            if (bar) { bar.style.animationPlayState = 'running'; }
            timer = setTimeout(function () { closeToast(toast); }, 1800);
        });

        var close = toast.querySelector('.toast__close');
        if (close) {
            close.addEventListener('click', function () { closeToast(toast); });
        }
    });

    /* -------------------------------------------------------------
       Confirmación de eliminación
       CakePHP genera:  <form name="post_x" hidden></form>
                        <a data-confirm-message="..." onclick="confirm(...)">
       Interceptamos el clic, mostramos una ventana propia y, si el
       usuario acepta, enviamos el mismo formulario que CakePHP creó.
       ------------------------------------------------------------- */
    function findPostForm(link) {
        var prev = link.previousElementSibling;
        if (prev && prev.tagName === 'FORM') { return prev; }

        var handler = link.getAttribute('onclick') || '';
        var match = handler.match(/document\.(post_[A-Za-z0-9_]+)\./);
        if (match && document.forms[match[1]]) { return document.forms[match[1]]; }

        return null;
    }

    function openConfirm(message, onAccept) {
        var modal = document.createElement('div');
        modal.className = 'modal';
        modal.setAttribute('role', 'dialog');
        modal.setAttribute('aria-modal', 'true');
        modal.setAttribute('aria-labelledby', 'modalTitle');
        modal.innerHTML =
            '<div class="modal__box">' +
                '<div class="modal__card" aria-hidden="true"></div>' +
                '<h2 class="modal__title" id="modalTitle">Confirmar eliminación</h2>' +
                '<p class="modal__text"></p>' +
                '<div class="modal__actions">' +
                    '<button type="button" class="btn btn--ghost" data-act="cancel">Cancelar</button>' +
                    '<button type="button" class="btn btn--danger" data-act="ok">Sí, eliminar</button>' +
                '</div>' +
            '</div>';
        modal.querySelector('.modal__text').textContent =
            message + ' Esta acción no se puede deshacer.';

        var lastFocus = document.activeElement;

        function close() {
            modal.classList.add('is-leaving');
            document.removeEventListener('keydown', onKey);
            setTimeout(function () {
                if (modal.parentNode) { modal.parentNode.removeChild(modal); }
                if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
            }, 180);
        }
        function onKey(e) {
            if (e.key === 'Escape') { close(); }
        }

        modal.addEventListener('click', function (e) {
            if (e.target === modal) { close(); }
            var act = e.target.closest ? e.target.closest('[data-act]') : null;
            if (!act) { return; }
            if (act.getAttribute('data-act') === 'ok') {
                act.disabled = true;
                act.textContent = 'Eliminando…';
                onAccept();
            } else {
                close();
            }
        });
        document.addEventListener('keydown', onKey);
        document.body.appendChild(modal);
        modal.querySelector('[data-act="cancel"]').focus();
    }

    document.addEventListener('click', function (e) {
        var link = e.target.closest ? e.target.closest('a[data-confirm-message]') : null;
        if (!link) { return; }

        var form = findPostForm(link);
        if (!form) { return; } // sin formulario: se deja el comportamiento original

        e.preventDefault();
        e.stopPropagation();

        openConfirm(link.getAttribute('data-confirm-message'), function () {
            if (typeof form.requestSubmit === 'function') {
                form.requestSubmit();
            } else {
                form.submit();
            }
        });
    }, true);

    /* -------------------------------------------------------------
       Contadores animados (marcador del inicio)
       ------------------------------------------------------------- */
    document.querySelectorAll('[data-count]').forEach(function (el) {
        var target = parseInt(el.getAttribute('data-count'), 10) || 0;
        if (reduceMotion || target === 0) { el.textContent = target; return; }

        var duration = 1200;
        var start = null;
        el.textContent = '0';

        function step(ts) {
            if (!start) { start = ts; }
            var p = Math.min((ts - start) / duration, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.round(target * eased);
            if (p < 1) { requestAnimationFrame(step); }
        }
        setTimeout(function () { requestAnimationFrame(step); }, 500);
    });

    /* Largo real de cada línea de cal para la animación de la cancha */
    document.querySelectorAll('.hero__pitch .chalk').forEach(function (path) {
        if (typeof path.getTotalLength === 'function') {
            path.style.setProperty('--len', Math.ceil(path.getTotalLength()));
        }
    });

    /* -------------------------------------------------------------
       Subida de fotografía: vista previa y arrastrar/soltar
       ------------------------------------------------------------- */
    document.querySelectorAll('.dropzone').forEach(function (zone) {
        var input = zone.querySelector('input[type="file"]');
        var preview = zone.querySelector('.dropzone__preview');
        var title = zone.querySelector('.dropzone__text strong');
        var help = zone.querySelector('.dropzone__text span');
        if (!input) { return; }

        var originalPreview = preview ? preview.innerHTML : '';
        var originalTitle = title ? title.textContent : '';
        var originalHelp = help ? help.textContent : '';

        input.addEventListener('change', function () {
            var file = input.files && input.files[0];
            if (!file) {
                zone.classList.remove('has-file');
                if (preview) { preview.innerHTML = originalPreview; }
                if (title) { title.textContent = originalTitle; }
                if (help) { help.textContent = originalHelp; }
                return;
            }
            zone.classList.add('has-file');
            if (title) { title.textContent = file.name; }
            if (help) { help.textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB · haz clic para cambiarla'; }

            if (preview && file.type.indexOf('image/') === 0 && window.FileReader) {
                var reader = new FileReader();
                reader.onload = function (ev) {
                    preview.innerHTML = '';
                    var img = document.createElement('img');
                    img.alt = 'Vista previa';
                    img.src = ev.target.result;
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });

        ['dragenter', 'dragover'].forEach(function (type) {
            zone.addEventListener(type, function () { zone.classList.add('is-dragging'); });
        });
        ['dragleave', 'drop'].forEach(function (type) {
            zone.addEventListener(type, function () { zone.classList.remove('is-dragging'); });
        });
    });
})();
