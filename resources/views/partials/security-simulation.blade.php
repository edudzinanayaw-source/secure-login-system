<section class="sl-security-sim" aria-labelledby="sl-security-title" data-security-sim>
    <div class="sl-sim-shell">
        <header class="sl-sim-heading">
            <div>
                <div class="sl-sim-eyebrow"><span class="sl-sim-live-dot"></span> SECURITY OVERVIEW</div>
                <h2 id="sl-security-title">HOW WE PROTECT YOUR ACCOUNT</h2>
                <p>Explore the checks behind a protected sign-in, from credential verification to role-based access.</p>
            </div>
            <div class="sl-sim-local"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 19 6v5c0 4.7-2.9 8-7 10-4.1-2-7-5.3-7-10V6l7-3Z"/><path d="m9 12 2 2 4-4"/></svg> Interactive product tour</div>
        </header>

        <div class="sl-sim-layout">
            <nav class="sl-sim-stages" aria-label="Security simulation stages">
                <button class="sl-sim-stage is-active" type="button" data-stage="0" data-title="User authentication" data-description="Laravel Fortify receives the sign-in request. This app's custom user provider applies the configured pepper and verifies the submitted password against the stored password hash." aria-pressed="true">
                    <span class="sl-sim-stage-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M5 21v-2a7 7 0 0 1 14 0v2M19 8h3m-1.5-1.5v3"/></svg></span><span class="sl-sim-stage-copy"><small>01 · SIGN-IN</small><strong>User authentication</strong></span><span class="sl-sim-stage-check">01</span>
                </button>
                <button class="sl-sim-stage" type="button" data-stage="1" data-title="Application pepper" data-description="Before hashing during account creation, the app transforms the password with HMAC-SHA-256 and the server-side PASSWORD_PEPPER configuration. The custom sign-in provider applies the same transformation before verification. The secret value is never shown here." aria-pressed="false">
                    <span class="sl-sim-stage-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4.5 6v5.2c0 4.5 2.7 7.7 7.5 9.8 4.8-2.1 7.5-5.3 7.5-9.8V6L12 3Z"/><path d="M9 12h6m-3-3v6"/></svg></span><span class="sl-sim-stage-copy"><small>02 · SERVER SECRET</small><strong>Application pepper</strong></span><span class="sl-sim-stage-check">02</span>
                </button>
                <button class="sl-sim-stage" type="button" data-stage="2" data-title="Password hashing" data-description="The app uses Laravel's configured password hasher to create a one-way password hash for a new account. On sign-in, the hasher checks the transformed candidate against the stored hash; the original password is not stored." aria-pressed="false">
                    <span class="sl-sim-stage-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 1 1 8 0v3m-4 4v3"/></svg></span><span class="sl-sim-stage-copy"><small>03 · ONE-WAY STORAGE</small><strong>Password hashing</strong></span><span class="sl-sim-stage-check">03</span>
                </button>
                <button class="sl-sim-stage" type="button" data-stage="3" data-title="Unique password salt" data-description="The app's bcrypt password hash contains a randomly generated salt within its encoded value. That per-hash salt means matching passwords do not produce identical stored hashes. The salt is handled by the password hasher and is not displayed." aria-pressed="false">
                    <span class="sl-sim-stage-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v18m-6-3 12-12M6 6l12 12M3 12h18"/><circle cx="12" cy="12" r="8"/></svg></span><span class="sl-sim-stage-copy"><small>04 · PER-HASH RANDOMNESS</small><strong>Unique password salt</strong></span><span class="sl-sim-stage-check">04</span>
                </button>
                <button class="sl-sim-stage" type="button" data-stage="4" data-title="Two-factor authentication" data-description="Fortify can challenge an account with a time-based authenticator code or recovery code after password verification. The app redirects new accounts to 2FA setup and requires confirmed 2FA before protected dashboard and ticket routes." aria-pressed="false">
                    <span class="sl-sim-stage-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="6" y="3" width="12" height="18" rx="2"/><path d="M9 7h6m-6 4h6m-6 4h3m1 4h.01"/></svg></span><span class="sl-sim-stage-copy"><small>05 · SECOND FACTOR</small><strong>Two-factor authentication</strong></span><span class="sl-sim-stage-check">05</span>
                </button>
                <button class="sl-sim-stage" type="button" data-stage="5" data-title="Role-based access control" data-description="After authentication and the required 2FA check, role middleware compares the signed-in user's role with the route requirement. Admin and standard-user routes are gated separately; the role check does not grant access by itself." aria-pressed="false">
                    <span class="sl-sim-stage-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20v-2a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v2M9 10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm8-4h5m-2.5-2.5v5M17 14h3a2 2 0 0 1 2 2v4h-5"/></svg></span><span class="sl-sim-stage-copy"><small>06 · AUTHORIZED ROUTES</small><strong>Role-based access</strong></span><span class="sl-sim-stage-check">06</span>
                </button>
            </nav>

            <div class="sl-sim-demo" aria-label="Interactive security flow demonstration">
                <div class="sl-sim-demo-top"><div class="sl-sim-window-dots" aria-hidden="true"><i></i><i></i><i></i></div><span>SECURELOGIN <span>/</span> SIGN-IN FLOW</span><span class="sl-sim-demo-state"><i></i> DEMO MODE</span></div>
                <div class="sl-sim-demo-body">
                    <div class="sl-sim-demo-label"><span>STAGE <b data-stage-count>01</b> / 06</span><span>NO CREDENTIALS CAPTURED</span></div>
                    <div class="sl-sim-flow" data-flow-stage="0">
                        <div class="sl-sim-node sl-sim-node-user"><span class="sl-sim-node-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M5 21v-2a7 7 0 0 1 14 0v2"/></svg></span><span><small>DEMO ACCOUNT</small><strong>visitor@example.test</strong></span><span class="sl-sim-node-tag">SAMPLE</span></div>
                        <div class="sl-sim-connector"><span></span><small data-flow-caption>Sign-in request</small><span></span></div>
                        <div class="sl-sim-node sl-sim-node-server"><span class="sl-sim-node-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="6" rx="2"/><rect x="3" y="14" width="18" height="6" rx="2"/><path d="M7 7h.01M7 17h.01m4-10h6m-6 10h6"/></svg></span><span><small data-server-caption>APPLICATION · FORTIFY</small><strong data-server-value>Verify credentials</strong></span><span class="sl-sim-node-status" data-server-status>READY</span></div>
                        <div class="sl-sim-layer-row"><div class="sl-sim-layer"><span class="sl-sim-layer-icon">HMAC</span><span><small>PEPPER</small><strong>Server-side transform</strong></span><span class="sl-sim-layer-lock">LOCKED</span></div><div class="sl-sim-layer"><span class="sl-sim-layer-icon">BC</span><span><small>BCRYPT</small><strong>Hash + embedded salt</strong></span><span class="sl-sim-layer-lock">LOCKED</span></div></div>
                        <div class="sl-sim-access"><span class="sl-sim-access-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z"/></svg></span><span><small>PROTECTED WORKSPACE</small><strong data-access-value>Awaiting verification</strong></span><span class="sl-sim-access-arrow">→</span></div>
                    </div>
                    <div class="sl-sim-stage-info" aria-live="polite" aria-atomic="true"><span class="sl-sim-info-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v5m0-8h.01"/></svg></span><div><h3 data-info-title>User authentication</h3><p data-info-description>Laravel Fortify receives the sign-in request. This app's custom user provider applies the configured pepper and verifies the submitted password against the stored password hash.</p></div></div>
                    <div class="sl-sim-controls"><button class="sl-sim-control sl-sim-prev" type="button" data-prev disabled><span aria-hidden="true">←</span> Previous</button><div class="sl-sim-progress" role="progressbar" aria-label="Simulation progress" aria-valuemin="1" aria-valuemax="6" aria-valuenow="1"><span data-progress></span></div><button class="sl-sim-control sl-sim-play" type="button" data-play><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m8 5 11 7-11 7z"/></svg><span data-play-label>Run simulation</span></button><button class="sl-sim-control sl-sim-next" type="button" data-next>Next stage <span aria-hidden="true">→</span></button></div>
                </div>
                <footer class="sl-sim-demo-foot"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg> Illustrative flow only · No real password, hash, salt, pepper, or 2FA secret is used or shown.</footer>
            </div>
        </div>
        <p class="sl-sim-note">This tour illustrates registration password storage, sign-in verification, and protected-route checks. Password reset and password-change flows are outside this demonstration; it does not authenticate a user.</p>
    </div>
</section>

<style>
.sl-security-sim{--sim-ink:#17243b;--sim-muted:#71809a;--sim-line:#e3e9f2;--sim-blue:#4a6fe4;--sim-navy:#101d35;padding:76px 24px 58px;background:radial-gradient(ellipse at 82% 0%,#e9efff 0,transparent 33%),linear-gradient(180deg,#f7f9fc,#fff);color:var(--sim-ink);font-family:Inter,'DM Sans',ui-sans-serif,system-ui,sans-serif;border-top:1px solid #e8edf5}
.sl-sim-shell{max-width:1160px;margin:auto}.sl-sim-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:24px;margin-bottom:27px}.sl-sim-eyebrow{display:flex;align-items:center;gap:9px;color:#5470b4;font-size:10px;font-weight:800;letter-spacing:1.6px}.sl-sim-live-dot,.sl-sim-demo-state i{width:7px;height:7px;border-radius:50%;background:#48a982;box-shadow:0 0 0 4px #48a98218}.sl-sim-heading h2{margin:11px 0 8px;color:#17243b;font-size:clamp(22px,3vw,30px);font-weight:750;letter-spacing:-1px}.sl-sim-heading p{margin:0;color:var(--sim-muted);font-size:13px}.sl-sim-local{display:inline-flex;align-items:center;gap:8px;flex:none;padding:9px 12px;border:1px solid #dce5fb;border-radius:9px;background:#fff;color:#4b628e;font-size:10px;font-weight:650}.sl-sim-local svg{width:16px;stroke:#5576d2;fill:none;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}
.sl-sim-layout{display:grid;grid-template-columns:minmax(260px,.76fr) minmax(0,1.5fr);gap:18px;align-items:stretch}.sl-sim-stages{display:flex;flex-direction:column;gap:7px;padding:8px;border:1px solid var(--sim-line);border-radius:14px;background:#fff;box-shadow:0 10px 28px #152b4b08}.sl-sim-stage{display:flex;align-items:center;gap:11px;width:100%;min-height:61px;padding:8px 10px;border:1px solid transparent;border-radius:10px;background:transparent;color:var(--sim-ink);text-align:left;box-shadow:none;cursor:pointer;transition:background .2s,border-color .2s,transform .2s}.sl-sim-stage:hover{background:#f7f9fd;border-color:#edf1f7;color:var(--sim-ink);transform:translateX(2px);box-shadow:none}.sl-sim-stage.is-active{border-color:#dce5ff;background:linear-gradient(100deg,#f1f5ff,#fff);box-shadow:inset 2px 0 #4a6fe4}.sl-sim-stage-icon{display:grid;place-items:center;flex:none;width:35px;height:35px;border:1px solid #e4eaf5;border-radius:10px;background:#f7f9fd;color:#607391}.sl-sim-stage-icon svg,.sl-sim-node-icon svg,.sl-sim-access-icon svg{width:18px;height:18px;fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}.sl-sim-stage.is-active .sl-sim-stage-icon{background:#e9efff;border-color:#dae4ff;color:#3f63cc}.sl-sim-stage-copy{display:flex;min-width:0;flex:1;flex-direction:column;gap:2px}.sl-sim-stage-copy small{color:#91a0b7;font-size:8px;font-weight:750;letter-spacing:1px}.sl-sim-stage-copy strong{color:#263650;font-size:11px;font-weight:700}.sl-sim-stage-check{color:#a0acc0;font-size:9px;font-variant-numeric:tabular-nums}.sl-sim-stage.is-active .sl-sim-stage-check{color:#4164c8;font-weight:800}
.sl-sim-demo{overflow:hidden;border:1px solid #263a59;border-radius:14px;background:#101c31;box-shadow:0 18px 44px #1324401c;color:#eaf0fa}.sl-sim-demo-top{display:flex;align-items:center;gap:12px;min-height:43px;padding:0 15px;border-bottom:1px solid #ffffff12;background:#14223a;color:#98a9c5;font-size:8px;font-weight:750;letter-spacing:1.2px}.sl-sim-demo-top>span:nth-child(2){flex:1}.sl-sim-demo-top>span:nth-child(2) span{padding:0 4px;color:#536681}.sl-sim-window-dots{display:flex;gap:4px}.sl-sim-window-dots i{width:6px;height:6px;border-radius:50%;background:#f07878}.sl-sim-window-dots i:nth-child(2){background:#e5b55d}.sl-sim-window-dots i:nth-child(3){background:#58bd92}.sl-sim-demo-state{display:flex;align-items:center;gap:7px;color:#8fb6a5;font-size:7px}.sl-sim-demo-state i{width:5px;height:5px;box-shadow:none}.sl-sim-demo-body{padding:18px 20px 16px}.sl-sim-demo-label{display:flex;justify-content:space-between;gap:10px;color:#8395b1;font-size:8px;font-weight:700;letter-spacing:1px}.sl-sim-demo-label b{color:#b6c8ff}.sl-sim-flow{padding-top:15px}.sl-sim-node{display:flex;align-items:center;gap:10px;min-height:55px;padding:8px 11px;border:1px solid #ffffff17;border-radius:10px;background:#17263e;transition:border-color .3s,background .3s,transform .3s}.sl-sim-node-icon{display:grid;place-items:center;flex:none;width:34px;height:34px;border-radius:9px;background:#223654;color:#9bb5fa}.sl-sim-node span:nth-child(2){display:flex;min-width:0;flex:1;flex-direction:column;gap:2px}.sl-sim-node small,.sl-sim-layer small,.sl-sim-access small{color:#8295b2;font-size:7px;font-weight:750;letter-spacing:1px}.sl-sim-node strong,.sl-sim-layer strong,.sl-sim-access strong{overflow:hidden;color:#e0e9f7;font-size:10px;font-weight:650;text-overflow:ellipsis;white-space:nowrap}.sl-sim-node-tag{padding:4px 7px;border:1px solid #4e648255;border-radius:5px;color:#8fa2c0;font-size:7px;font-weight:750;letter-spacing:.8px}.sl-sim-node-server{border-color:#3e5a8066;background:#182a45}.sl-sim-node-server .sl-sim-node-icon{background:#243b5c;color:#a9bef8}.sl-sim-node-status{color:#8fb6a5;font-size:7px;font-weight:800;letter-spacing:1px}.sl-sim-connector{display:flex;align-items:center;gap:9px;height:31px;padding-left:27px;color:#8294ae}.sl-sim-connector span{position:relative;width:1px;height:100%;background:#526782}.sl-sim-connector span:first-child{display:none}.sl-sim-connector span:nth-of-type(2):after{position:absolute;bottom:0;left:-3px;width:5px;height:5px;border-right:1px solid #91a4c2;border-bottom:1px solid #91a4c2;content:'';transform:rotate(45deg)}.sl-sim-connector small{font-size:8px;letter-spacing:.2px}.sl-sim-layer-row{display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-top:8px}.sl-sim-layer{display:flex;align-items:center;gap:8px;min-width:0;padding:9px;border:1px solid #ffffff14;border-radius:9px;background:#14223a;transition:border-color .3s,background .3s}.sl-sim-layer-icon{display:grid;place-items:center;flex:none;width:30px;height:30px;border:1px solid #6278ae44;border-radius:8px;background:#263858;color:#b6c7ff;font-size:8px;font-weight:800}.sl-sim-layer>span:nth-child(2){display:flex;min-width:0;flex:1;flex-direction:column;gap:3px}.sl-sim-layer strong{font-size:8px}.sl-sim-layer-lock{color:#8b9ab0;font-size:6px;font-weight:800;letter-spacing:.7px}.sl-sim-access{display:flex;align-items:center;gap:10px;margin-top:9px;padding:10px;border:1px solid #ffffff15;border-radius:9px;background:#14223a}.sl-sim-access-icon{display:grid;place-items:center;width:30px;height:30px;border-radius:8px;background:#243651;color:#9db2de}.sl-sim-access>span:nth-child(2){display:flex;flex:1;flex-direction:column;gap:2px}.sl-sim-access strong{font-size:9px}.sl-sim-access-arrow{color:#8ea4c9;font-size:16px}.sl-sim-stage-info{display:flex;align-items:flex-start;gap:11px;min-height:82px;margin-top:14px;padding:12px;border:1px solid #ffffff12;border-radius:10px;background:#142139}.sl-sim-info-icon{display:grid;place-items:center;flex:none;width:26px;height:26px;border:1px solid #5772b044;border-radius:8px;color:#9cb4f7}.sl-sim-info-icon svg{width:15px;height:15px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.sl-sim-stage-info h3{margin:1px 0 4px;color:#e6edfa;font-size:11px;letter-spacing:0}.sl-sim-stage-info p{margin:0;color:#a8b5c9;font-size:9px;line-height:1.65}.sl-sim-controls{display:flex;align-items:center;gap:8px;margin-top:13px}.sl-sim-control{display:inline-flex;align-items:center;justify-content:center;gap:6px;min-height:33px;padding:6px 9px;border:1px solid #ffffff19;border-radius:7px;background:#192943;color:#c3d0e5;font-family:inherit;font-size:8px;font-weight:700;box-shadow:none;cursor:pointer;transition:background .2s,border-color .2s,color .2s}.sl-sim-control:hover:not(:disabled){border-color:#6a84c755;background:#223653;color:#fff;box-shadow:none;transform:none}.sl-sim-control:disabled{opacity:.45;cursor:not-allowed}.sl-sim-control:focus-visible,.sl-sim-stage:focus-visible{outline:2px solid #9bb3ff;outline-offset:2px}.sl-sim-play{border-color:#718be866;background:#2b4270;color:#eef3ff}.sl-sim-play:hover:not(:disabled){background:#38558f}.sl-sim-play svg{width:12px;height:12px;fill:currentColor}.sl-sim-progress{overflow:hidden;height:3px;flex:1;border-radius:9px;background:#ffffff18}.sl-sim-progress span{display:block;width:16.666%;height:100%;border-radius:inherit;background:linear-gradient(90deg,#6488f6,#91abff);transition:width .35s ease}.sl-sim-demo-foot{display:flex;align-items:center;gap:7px;padding:10px 15px;border-top:1px solid #ffffff12;color:#8291a8;font-size:8px;line-height:1.5}.sl-sim-demo-foot svg{width:12px;height:12px;flex:none;fill:none;stroke:#8fa5c7;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.sl-sim-note{margin:13px 0 0;color:#8896aa;font-size:9px;text-align:right}
.sl-sim-flow[data-flow-stage="0"] .sl-sim-node-user,.sl-sim-flow[data-flow-stage="1"] .sl-sim-layer:first-child,.sl-sim-flow[data-flow-stage="2"] .sl-sim-layer:last-child,.sl-sim-flow[data-flow-stage="3"] .sl-sim-layer:last-child,.sl-sim-flow[data-flow-stage="4"] .sl-sim-node-server,.sl-sim-flow[data-flow-stage="5"] .sl-sim-access{border-color:#718df588;background:#1c3150;animation:sl-sim-pulse 1.1s ease-in-out infinite alternate}.sl-sim-flow[data-flow-stage="1"] .sl-sim-layer:first-child .sl-sim-layer-lock,.sl-sim-flow[data-flow-stage="2"] .sl-sim-layer:last-child .sl-sim-layer-lock,.sl-sim-flow[data-flow-stage="3"] .sl-sim-layer:last-child .sl-sim-layer-lock{color:#a8befb}.sl-sim-flow[data-flow-stage="4"] .sl-sim-node-status{color:#e4c679}.sl-sim-flow[data-flow-stage="5"] .sl-sim-access-arrow{color:#88d5ae}@keyframes sl-sim-pulse{from{box-shadow:0 0 0 0 #7894ed00}to{box-shadow:0 0 0 3px #7894ed20}}
.sl-sim-security-visually-hidden{position:absolute!important;width:1px!important;height:1px!important;overflow:hidden!important;clip:rect(1px,1px,1px,1px)!important;white-space:nowrap!important}
@media(max-width:880px){.sl-sim-layout{grid-template-columns:1fr}.sl-sim-stages{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:6px}.sl-sim-stage{min-height:57px}.sl-sim-demo-body{padding:17px}}
@media(max-width:560px){.sl-security-sim{padding:48px 15px 36px}.sl-sim-heading{align-items:flex-start;flex-direction:column;gap:12px;margin-bottom:18px}.sl-sim-heading h2{font-size:22px}.sl-sim-heading p{max-width:42ch;font-size:12px}.sl-sim-stages{grid-template-columns:repeat(2,minmax(0,1fr));padding:6px}.sl-sim-stage{gap:7px;min-height:55px;padding:7px}.sl-sim-stage-icon{width:30px;height:30px}.sl-sim-stage-copy small{font-size:7px;letter-spacing:.6px}.sl-sim-stage-copy strong{font-size:9px}.sl-sim-stage-check{font-size:8px}.sl-sim-demo-top{gap:8px;padding:0 10px;font-size:7px}.sl-sim-demo-body{padding:13px 11px}.sl-sim-demo-label{font-size:7px}.sl-sim-layer-row{gap:5px}.sl-sim-layer{gap:5px;padding:7px}.sl-sim-layer-icon{width:26px;height:26px}.sl-sim-layer-lock{display:none}.sl-sim-node strong{font-size:9px}.sl-sim-controls{gap:5px}.sl-sim-control{gap:4px;padding:6px 7px;font-size:7px}.sl-sim-progress{min-width:20px}.sl-sim-note{text-align:left}}
@media(prefers-reduced-motion:reduce){.sl-sim-stage,.sl-sim-layer,.sl-sim-node,.sl-sim-progress span{transition:none!important}.sl-sim-flow[data-flow-stage] .sl-sim-node,.sl-sim-flow[data-flow-stage] .sl-sim-layer,.sl-sim-flow[data-flow-stage] .sl-sim-access{animation:none!important}}
</style>

<script>
(() => {
    const root = document.querySelector('[data-security-sim]');
    if (!root) return;

    const placeAfterLogin = () => {
        const login = document.querySelector('.auth-wrap');
        if (login && login.nextElementSibling !== root) login.after(root);
    };
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', placeAfterLogin, { once: true });
    } else {
        placeAfterLogin();
    }

    const stages = [...root.querySelectorAll('[data-stage]')];
    const flow = root.querySelector('[data-flow-stage]');
    const progress = root.querySelector('[data-progress]');
    const progressBar = root.querySelector('[role="progressbar"]');
    const count = root.querySelector('[data-stage-count]');
    const title = root.querySelector('[data-info-title]');
    const description = root.querySelector('[data-info-description]');
    const serverCaption = root.querySelector('[data-server-caption]');
    const serverValue = root.querySelector('[data-server-value]');
    const serverStatus = root.querySelector('[data-server-status]');
    const flowCaption = root.querySelector('[data-flow-caption]');
    const accessValue = root.querySelector('[data-access-value]');
    const previous = root.querySelector('[data-prev]');
    const next = root.querySelector('[data-next]');
    const play = root.querySelector('[data-play]');
    const playLabel = root.querySelector('[data-play-label]');
    const flowCaptions = ['Sign-in request', 'Pepper applied server-side', 'One-way hash verification', 'Salt is part of stored hash', 'Authenticator challenge', 'Role checked for route'];
    const serverCaptions = ['APPLICATION · FORTIFY', 'APPLICATION · HMAC-SHA-256', 'PASSWORD HASHER · BCRYPT', 'HASH FORMAT · BCRYPT', 'FORTIFY · TWO-FACTOR', 'MIDDLEWARE · ROLE'];
    const serverValues = ['Verify credentials', 'Transform candidate', 'Check stored hash', 'Read embedded salt', 'Confirm second factor', 'Authorize requested route'];
    const accessValues = ['Awaiting verification', 'Secret stays server-side', 'Password never stored', 'Salt stays in hash format', 'Confirmed 2FA required', 'Admin or user route'];
    let active = 0;
    let timer = null;

    const stop = () => {
        if (timer) window.clearInterval(timer);
        timer = null;
        playLabel.textContent = 'Run simulation';
        play.setAttribute('aria-pressed', 'false');
    };

    const showStage = (index) => {
        active = Math.max(0, Math.min(stages.length - 1, index));
        const selected = stages[active];
        stages.forEach((stage, stageIndex) => {
            const isActive = stageIndex === active;
            stage.classList.toggle('is-active', isActive);
            stage.setAttribute('aria-pressed', String(isActive));
        });
        flow.dataset.flowStage = String(active);
        count.textContent = String(active + 1).padStart(2, '0');
        title.textContent = selected.dataset.title;
        description.textContent = selected.dataset.description;
        flowCaption.textContent = flowCaptions[active];
        serverCaption.textContent = serverCaptions[active];
        serverValue.textContent = serverValues[active];
        accessValue.textContent = accessValues[active];
        serverStatus.textContent = active === 4 ? 'CHALLENGE' : (active === 5 ? 'CHECK' : 'READY');
        progress.style.width = `${((active + 1) / stages.length) * 100}%`;
        progressBar.setAttribute('aria-valuenow', String(active + 1));
        previous.disabled = active === 0;
        next.disabled = active === stages.length - 1;
    };

    stages.forEach((stage, index) => stage.addEventListener('click', () => {
        stop();
        showStage(index);
    }));
    previous.addEventListener('click', () => { stop(); showStage(active - 1); });
    next.addEventListener('click', () => { stop(); showStage(active + 1); });
    play.addEventListener('click', () => {
        if (timer) return stop();
        if (active === stages.length - 1) showStage(0);
        playLabel.textContent = 'Pause simulation';
        play.setAttribute('aria-pressed', 'true');
        timer = window.setInterval(() => {
            if (active === stages.length - 1) return stop();
            showStage(active + 1);
        }, 1900);
    });
})();
</script>
