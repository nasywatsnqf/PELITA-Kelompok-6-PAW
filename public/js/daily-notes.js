document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('noteForm');
    if (!form) return;

    const body = document.getElementById('body');
    const content = document.getElementById('contentInput');
    const title = document.getElementById('title');
    const catInput = document.getElementById('categoryInput');
    const emoInput = document.getElementById('emotionInput');
    const useDraft = form.dataset.draft === '1';
    const DRAFT = 'pelita-draft-notes';

    const hhmm = () => new Date()
        .toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', hour12: false })
        .replace('.', ':');

    //Draf lokal (autosave di browser)
    const saveDraft = () => {
        if (!useDraft) return;
        try {
            localStorage.setItem(DRAFT, JSON.stringify({
                title: title.value, html: body.innerHTML, cat: catInput.value, emo: emoInput.value,
            }));
        } catch (e) { }
    };
    const clearDraft = () => { try { localStorage.removeItem(DRAFT); } catch (e) { } };

    // Pilih kategori / emosi
    const mark = (groupId, value) => {
        [...document.getElementById(groupId).children].forEach((b) =>
            b.classList.toggle('on', b.dataset.v === value));
    };
    const pick = (groupId, input) => {
        document.getElementById(groupId).addEventListener('click', (e) => {
            const btn = e.target.closest('button');
            if (!btn) return;
            input.value = btn.dataset.v;
            mark(groupId, btn.dataset.v);
            saveDraft();
        });
    };
    pick('cat', catInput);
    pick('emo', emoInput);

    // Pulihkan draf (kalau form masih kosong) 
    if (useDraft && title.value === '' && body.textContent.trim() === '') {
        try {
            const d = JSON.parse(localStorage.getItem(DRAFT) || 'null');
            if (d) {
                title.value = d.title || '';
                body.innerHTML = d.html || '';
                if (d.cat) { catInput.value = d.cat; mark('cat', d.cat); }
                if (d.emo) { emoInput.value = d.emo; mark('emo', d.emo); }
            }
        } catch (e) { }
    }
    title.addEventListener('input', saveDraft);
    body.addEventListener('input', saveDraft);

    // Toolbar editor 
    const cmdBtns = document.querySelectorAll('[data-cmd]');
    const refreshToolbar = () => cmdBtns.forEach((b) => {
        let on = false;
        try { on = document.queryCommandState(b.dataset.cmd); } catch (e) {}
        b.classList.toggle('active', on);
        b.setAttribute('aria-pressed', on);
    });
    cmdBtns.forEach((b) => {
        b.addEventListener('mousedown', (e) => e.preventDefault());
        b.addEventListener('click', () => {
            body.focus();
            document.execCommand(b.dataset.cmd);
            refreshToolbar();
            saveDraft();
        });    
    });
    document.addEventListener('selectionchange', () => {
        if (document.activeElement === body) refreshToolbar();
    });

    // Cap waktu
    const stampTxt = document.getElementById('stampTxt');
    const tick = () => { stampTxt.textContent = `Sisipkan Cap Waktu [+ ${hhmm()}]`; };
    tick(); setInterval(tick, 1000);
    document.getElementById('stamp').addEventListener('click', () => {
        const t = new Date().toLocaleTimeString('id-ID', { hour12: false }).replace(/\./g, ':');
        body.focus();
        document.execCommand('insertText', false, `[${t}] `);
        saveDraft();
    });

    // Lampiran 
    document.getElementById('attach').addEventListener('click', () => {
        alert('Fitur lampiran berkas/foto akan ditambahkan pada tahap berikutnya.');
    });

    // Batal 
    const cancel = document.getElementById('cancelBtn');
    if (cancel) cancel.addEventListener('click', () => {
        title.value = ''; body.innerHTML = ''; clearDraft();
    });

    // Submit
    form.addEventListener('submit', () => { content.value = body.innerHTML; clearDraft(); });
});