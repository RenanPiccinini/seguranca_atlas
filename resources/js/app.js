// Atlas Segurança e Zeladoria - Core JavaScript Engine
// 3D Visual Effects, Parallax Engine, Interactive Estimator & AJAX Forms

document.addEventListener('DOMContentLoaded', () => {
    initHero3DCanvas();
    init3DTilt();
    initParallaxScroll();
    initStatsCounter();
    initQuoteCalculator();
    initContactForm();
    initServiceModals();
    initMobileMenu();
});

/* ============================================================
   1. HERO 3D PARTICLE NETWORK & CYBER SECURITY GRID (CANVAS)
   ============================================================ */
function initHero3DCanvas() {
    const canvas = document.getElementById('hero-3d-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    let width = canvas.width = canvas.parentElement.offsetWidth;
    let height = canvas.height = canvas.parentElement.offsetHeight;

    window.addEventListener('resize', () => {
        if (!canvas.parentElement) return;
        width = canvas.width = canvas.parentElement.offsetWidth;
        height = canvas.height = canvas.parentElement.offsetHeight;
        initNodes();
    });

    let mouse = { x: width / 2, y: height / 2, targetX: width / 2, targetY: height / 2 };

    window.addEventListener('mousemove', (e) => {
        const rect = canvas.getBoundingClientRect();
        if (e.clientY >= rect.top && e.clientY <= rect.bottom) {
            mouse.targetX = e.clientX - rect.left;
            mouse.targetY = e.clientY - rect.top;
        }
    });

    // 3D Particles / Nodes
    const nodeCount = Math.min(65, Math.floor((width * height) / 14000));
    let nodes = [];

    class Node {
        constructor() {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            this.z = Math.random() * 600 + 100; // 3D depth
            this.vx = (Math.random() - 0.5) * 0.7;
            this.vy = (Math.random() - 0.5) * 0.7;
            this.vz = (Math.random() - 0.5) * 0.5;
            this.baseRadius = Math.random() * 2 + 1.2;
            this.isOrange = Math.random() > 0.65;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;
            this.z += this.vz;

            // Bounce / Wrap
            if (this.x < 0) this.x = width;
            if (this.x > width) this.x = 0;
            if (this.y < 0) this.y = height;
            if (this.y > height) this.y = 0;
            if (this.z < 100 || this.z > 700) this.vz = -this.vz;

            // Subtle mouse gravity
            const dx = mouse.x - this.x;
            const dy = mouse.y - this.y;
            const dist = Math.sqrt(dx * dx + dy * dy);
            if (dist < 180) {
                this.x -= (dx / dist) * 0.8;
                this.y -= (dy / dist) * 0.8;
            }
        }

        draw() {
            const fov = 400;
            const scale = fov / (fov + this.z);
            const px = (this.x - width / 2) * scale + width / 2;
            const py = (this.y - height / 2) * scale + height / 2;
            const radius = Math.max(0.8, this.baseRadius * scale * 1.5);

            ctx.beginPath();
            ctx.arc(px, py, radius, 0, Math.PI * 2);
            ctx.fillStyle = this.isOrange 
                ? `rgba(255, 122, 0, ${scale * 0.85})` 
                : `rgba(203, 213, 225, ${scale * 0.45})`;
            ctx.fill();

            if (this.isOrange) {
                ctx.shadowBlur = 8;
                ctx.shadowColor = 'rgba(255, 122, 0, 0.8)';
            } else {
                ctx.shadowBlur = 0;
            }
        }
    }

    function initNodes() {
        nodes = [];
        for (let i = 0; i < nodeCount; i++) {
            nodes.push(new Node());
        }
    }

    initNodes();

    // 3D Geometric Shield Outline in Canvas Center
    let shieldAngle = 0;

    function render() {
        // Smooth mouse interpolate
        mouse.x += (mouse.targetX - mouse.x) * 0.05;
        mouse.y += (mouse.targetY - mouse.y) * 0.05;

        ctx.clearRect(0, 0, width, height);

        // Draw connections between nodes
        const maxDist = 120;
        for (let i = 0; i < nodes.length; i++) {
            nodes[i].update();
            nodes[i].draw();

            for (let j = i + 1; j < nodes.length; j++) {
                const dx = nodes[i].x - nodes[j].x;
                const dy = nodes[i].y - nodes[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);

                if (dist < maxDist) {
                    const alpha = (1 - dist / maxDist) * 0.22;
                    ctx.beginPath();
                    ctx.moveTo(nodes[i].x, nodes[i].y);
                    ctx.lineTo(nodes[j].x, nodes[j].y);
                    ctx.strokeStyle = nodes[i].isOrange || nodes[j].isOrange
                        ? `rgba(255, 122, 0, ${alpha * 1.3})`
                        : `rgba(148, 163, 184, ${alpha * 0.6})`;
                    ctx.lineWidth = 0.8;
                    ctx.stroke();
                }
            }
        }

        // Draw tactical radar sweep circle
        shieldAngle += 0.008;
        const centerX = width * 0.78;
        const centerY = height * 0.45;
        if (width > 768) {
            ctx.save();
            ctx.translate(centerX, centerY);
            ctx.rotate(shieldAngle);
            ctx.beginPath();
            ctx.arc(0, 0, 140, 0, Math.PI * 0.6);
            ctx.strokeStyle = 'rgba(255, 122, 0, 0.15)';
            ctx.lineWidth = 2;
            ctx.stroke();

            ctx.beginPath();
            ctx.arc(0, 0, 200, Math.PI, Math.PI * 1.8);
            ctx.strokeStyle = 'rgba(255, 255, 255, 0.06)';
            ctx.lineWidth = 1;
            ctx.setLineDash([6, 6]);
            ctx.stroke();
            ctx.restore();
        }

        requestAnimationFrame(render);
    }

    render();
}

/* ============================================================
   2. 3D TILT EFFECT FOR CARDS & SHIELDS
   ============================================================ */
function init3DTilt() {
    const cards = document.querySelectorAll('.tilt-card');

    cards.forEach(card => {
        let bounds;

        function rotateToMouse(e) {
            const mouseX = e.clientX;
            const mouseY = e.clientY;
            const leftX = mouseX - bounds.x;
            const topY = mouseY - bounds.y;
            const center = {
                x: leftX - bounds.width / 2,
                y: topY - bounds.height / 2
            };
            const distance = Math.sqrt(center.x ** 2 + center.y ** 2);

            const maxAngle = 12; // degrees
            const rotateX = (+1 * (center.y / (bounds.height / 2)) * maxAngle).toFixed(2);
            const rotateY = (-1 * (center.x / (bounds.width / 2)) * maxAngle).toFixed(2);

            card.style.transform = `
                perspective(1000px)
                rotateX(${rotateX}deg)
                rotateY(${rotateY}deg)
                scale3d(1.025, 1.025, 1.025)
            `;

            // Dynamic gloss sheen effect if present
            const sheen = card.querySelector('.sheen');
            if (sheen) {
                sheen.style.background = `radial-gradient(circle at ${leftX}px ${topY}px, rgba(255,122,0,0.18) 0%, rgba(255,255,255,0) 60%)`;
            }
        }

        card.addEventListener('mouseenter', () => {
            bounds = card.getBoundingClientRect();
            card.style.transition = 'transform 0.1s ease-out';
        });

        card.addEventListener('mousemove', rotateToMouse);

        card.addEventListener('mouseleave', () => {
            card.style.transition = 'transform 0.5s ease-out, box-shadow 0.5s ease-out';
            card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
            const sheen = card.querySelector('.sheen');
            if (sheen) {
                sheen.style.background = 'none';
            }
        });
    });
}

/* ============================================================
   3. MULTI-LAYER PARALLAX SCROLLING
   ============================================================ */
function initParallaxScroll() {
    const parallaxElements = document.querySelectorAll('[data-parallax-speed]');
    if (!parallaxElements.length) return;

    let ticking = false;

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                const scrolled = window.scrollY;
                parallaxElements.forEach(el => {
                    const speed = parseFloat(el.getAttribute('data-parallax-speed')) || 0.1;
                    const offset = -(scrolled * speed);
                    el.style.transform = `translate3d(0, ${offset}px, 0)`;
                });
                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true });
}

/* ============================================================
   4. ANIMATED STATS COUNTER
   ============================================================ */
function initStatsCounter() {
    const counters = document.querySelectorAll('.counter-val');
    if (!counters.length) return;

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.getAttribute('data-target'), 10) || 0;
                const prefix = entry.target.getAttribute('data-prefix') || '';
                const suffix = entry.target.getAttribute('data-suffix') || '';
                let current = 0;
                const duration = 1500;
                const steps = 40;
                const increment = target / steps;
                const stepTime = duration / steps;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        entry.target.innerText = `${prefix}${target}${suffix}`;
                        clearInterval(timer);
                    } else {
                        entry.target.innerText = `${prefix}${Math.floor(current)}${suffix}`;
                    }
                }, stepTime);

                obs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    counters.forEach(c => observer.observe(c));
}

/* ============================================================
   5. INTERACTIVE QUOTE ESTIMATOR (SIMULADOR DE ORÇAMENTO)
   ============================================================ */
function initQuoteCalculator() {
    const form = document.getElementById('quote-form');
    if (!form) return;

    const serviceSelect = form.querySelector('[name="service_type"]');
    const periodSelect = form.querySelector('[name="period"]');
    const segmentSelect = form.querySelector('[name="segment"]');
    const estimateDisplay = document.getElementById('calc-estimate-display');
    const whatsappRedirectBtn = document.getElementById('quote-whatsapp-direct');

    const basePricing = {
        'Segurança Privada': 4200,
        'Equipe de Apoio': 2600,
        'Brigadista': 3600,
        'Segurança Hospitalar': 4600,
        'Portaria e Controle de Acesso': 3100,
        'Vigia e Segurança Patrimonial': 3300,
        'Central CFTV e Monitoramento 24h': 1800,
    };

    function recalculate() {
        const srv = serviceSelect ? serviceSelect.value : '';
        const prd = periodSelect ? periodSelect.value : '';
        const base = basePricing[srv] || 3200;
        let multiplier = 1.0;

        if (prd === '24 Horas') multiplier = 1.85;
        if (prd === 'Noturno (12h)') multiplier = 1.15;
        if (prd === 'Diurno (12h)') multiplier = 1.0;
        if (prd === 'Evento / Pontual') multiplier = 0.85;

        const totalEst = Math.round(base * multiplier);

        if (estimateDisplay) {
            estimateDisplay.innerText = `R$ ${totalEst.toLocaleString('pt-BR')},00`;
        }

        return totalEst;
    }

    if (serviceSelect) serviceSelect.addEventListener('change', recalculate);
    if (periodSelect) periodSelect.addEventListener('change', recalculate);
    if (segmentSelect) segmentSelect.addEventListener('change', recalculate);
    recalculate();

    // Form submit via AJAX
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg> Processando Proposta...
        `;

        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                showToast(result.message || 'Solicitação enviada com sucesso!', 'success');
                
                // Show WhatsApp redirect card
                if (result.whatsapp_url && whatsappRedirectBtn) {
                    whatsappRedirectBtn.href = result.whatsapp_url;
                    document.getElementById('quote-success-panel')?.classList.remove('hidden');
                    form.classList.add('hidden');
                }
            } else {
                showToast('Verifique os campos informados e tente novamente.', 'error');
            }
        } catch (err) {
            console.error(err);
            showToast('Erro de comunicação. Você também pode nos chamar diretamente no WhatsApp!', 'error');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });
}

/* ============================================================
   6. CONTACT FORM AJAX HANDLER
   ============================================================ */
function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const btn = form.querySelector('button[type="submit"]');
        const origText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = 'Enviando...';

        const formData = new FormData(form);

        try {
            const resp = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const res = await resp.json();

            if (res.success) {
                showToast(res.message, 'success');
                form.reset();
                if (res.whatsapp_url) {
                    setTimeout(() => {
                        if (confirm('Deseja também abrir a conversa diretamente no WhatsApp agora?')) {
                            window.open(res.whatsapp_url, '_blank');
                        }
                    }, 500);
                }
            } else {
                showToast('Falha no envio. Por favor confira os dados preenchidos.', 'error');
            }
        } catch (err) {
            console.error(err);
            showToast('Ocorreu um erro ao enviar sua mensagem.', 'error');
        } finally {
            btn.disabled = false;
            btn.innerHTML = origText;
        }
    });
}

/* ============================================================
   7. SERVICE MODALS & TABS
   ============================================================ */
function initServiceModals() {
    const modal = document.getElementById('service-modal');
    if (!modal) return;

    const modalTitle = document.getElementById('modal-service-title');
    const modalDesc = document.getElementById('modal-service-desc');
    const modalImg = document.getElementById('modal-service-img');
    const modalBadge = document.getElementById('modal-service-badge');
    const modalWa = document.getElementById('modal-service-wa');
    const modalFeatures = document.getElementById('modal-service-features');

    document.querySelectorAll('.open-service-modal').forEach(btn => {
        btn.addEventListener('click', () => {
            const data = JSON.parse(btn.getAttribute('data-service'));
            if (!data) return;

            if (modalTitle) modalTitle.innerText = data.title;
            if (modalDesc) modalDesc.innerText = data.full_description || data.short_description;
            if (modalImg) modalImg.src = `/${data.image}`;
            if (modalBadge) modalBadge.innerText = data.badge || 'Atlas Segurança';
            
            if (modalFeatures && data.features) {
                modalFeatures.innerHTML = '';
                data.features.forEach(f => {
                    const li = document.createElement('li');
                    li.className = 'flex items-center space-x-2 text-slate-300 text-sm';
                    li.innerHTML = `
                        <svg class="w-4 h-4 text-orange-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>${f}</span>
                    `;
                    modalFeatures.appendChild(li);
                });
            }

            if (modalWa) {
                const msg = `Olá! Gostaria de mais informações e proposta sobre o serviço de ${data.title} da Atlas Segurança.`;
                modalWa.href = `https://wa.me/5537999673426?text=${encodeURIComponent(msg)}`;
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        });
    });

    document.querySelectorAll('.close-service-modal').forEach(el => {
        el.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        });
    });

    // Close on backdrop click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }
    });
}

/* ============================================================
   8. MOBILE RESPONSIVE MENU
   ============================================================ */
function initMobileMenu() {
    const toggler = document.getElementById('mobile-menu-toggler');
    const drawer = document.getElementById('mobile-drawer');
    const closeBtn = document.getElementById('close-mobile-drawer');

    if (!toggler || !drawer) return;

    toggler.addEventListener('click', () => {
        drawer.classList.remove('translate-x-full');
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            drawer.classList.add('translate-x-full');
        });
    }

    drawer.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            drawer.classList.add('translate-x-full');
        });
    });
}

/* ============================================================
   TOAST NOTIFICATION HELPER
   ============================================================ */
function showToast(message, type = 'success') {
    let container = document.getElementById('toast-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-container';
        container.className = 'fixed bottom-24 right-6 z-50 flex flex-col space-y-3 pointer-events-none';
        document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    const isSuccess = type === 'success';
    toast.className = `pointer-events-auto transform transition-all duration-300 translate-y-4 opacity-0 flex items-center p-4 rounded-xl shadow-2xl border ${
        isSuccess ? 'bg-slate-900/95 border-emerald-500/50 text-white' : 'bg-slate-900/95 border-rose-500/50 text-white'
    }`;

    toast.innerHTML = `
        <div class="mr-3 ${isSuccess ? 'text-emerald-400' : 'text-rose-400'}">
            ${isSuccess ? `
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            ` : `
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            `}
        </div>
        <div class="text-sm font-medium pr-3">${message}</div>
    `;

    container.appendChild(toast);

    setTimeout(() => {
        toast.classList.remove('translate-y-4', 'opacity-0');
    }, 10);

    setTimeout(() => {
        toast.classList.add('translate-y-4', 'opacity-0');
        setTimeout(() => toast.remove(), 300);
    }, 4500);
}
