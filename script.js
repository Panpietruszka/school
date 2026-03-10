document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('dustCanvas');
    if (!canvas) {
        console.error("Nie znaleziono elementu <canvas id='dustCanvas'>");
        return;
    }

    const ctx = canvas.getContext('2d');
    let particles = [];
    const particleCount = 80;
    let themeColor = { r: 255, g: 215, b: 0 }; 

    function updateThemeColor() {
        
        const style = getComputedStyle(document.documentElement);
        let bg = style.getPropertyValue('--bg-color').trim();

        
        if (!bg) bg = "#030303";

        let r = 0, g = 0, b = 0;
        if (bg.startsWith('#')) {
            if (bg.length === 4) {
                r = parseInt(bg[1] + bg[1], 16);
                g = parseInt(bg[2] + bg[2], 16);
                b = parseInt(bg[3] + bg[3], 16);
            } else {
                r = parseInt(bg.substring(1, 3), 16);
                g = parseInt(bg.substring(3, 5), 16);
                b = parseInt(bg.substring(5, 7), 16);
            }
        }

        
        themeColor = {
            r: Math.min(255, r + 50),
            g: Math.min(255, g + 50),
            b: Math.min(255, b + 60)
        };
    }

    class ParticleOrb {
        constructor(side) {
            this.side = side;
            this.init();
        }

        init() {
            this.x = this.side === 'left'
                ? Math.random() * 100
                : canvas.width - Math.random() * 100;

            this.y = canvas.height + Math.random() * 20;
            this.radius = Math.random() * 4 + 1.5;

            
            this.vx = this.side === 'left' ? (Math.random() * 0.4 + 0.1) : -(Math.random() * 0.4 + 0.1);
            this.vy = Math.random() * -0.7 - 0.3;

            this.wobble = Math.random() * Math.PI * 2;
            this.wobbleSpeed = Math.random() * 0.015;

            this.opacity = 0;
            this.maxOpacity = Math.random() * 0.6 + 0.2;

            this.birthY = this.y;
            this.deathY = canvas.height - (canvas.height * 0.25);
        }

        update() {
            this.x += this.vx + Math.sin(this.wobble) * 0.25;
            this.y += this.vy;
            this.wobble += this.wobbleSpeed;

            const travelDistance = this.birthY - this.y;
            const totalLifeSpan = this.birthY - this.deathY;
            const lifeProgress = travelDistance / totalLifeSpan;

            if (lifeProgress < 0.25) {
                this.opacity = (lifeProgress / 0.15) * this.maxOpacity;
            } else if (lifeProgress >= 0.15 && lifeProgress <= 1.0) {
                this.opacity = this.maxOpacity * (1 - (lifeProgress - 0.15) / 0.85);
            } else {
                this.opacity = 0;
            }

            if (this.y < this.deathY || this.opacity <= 0) {
                this.init();
            }
        }

        draw() {
            if (this.opacity <= 0) return;

            const baseColor = `${themeColor.r}, ${themeColor.g}, ${themeColor.b}`;
            ctx.save();
            ctx.globalAlpha = this.opacity;

            ctx.shadowBlur = 5;
            ctx.shadowColor = `rgba(${baseColor}, 0.5)`;

            ctx.beginPath();
            const gradient = ctx.createRadialGradient(
                this.x, this.y, 0,
                this.x, this.y, this.radius
            );

            gradient.addColorStop(0, `rgba(${baseColor}, 1)`);
            gradient.addColorStop(1, `rgba(${baseColor}, 0)`);

            ctx.fillStyle = gradient;
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }
    }

    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        updateThemeColor();
    }

    function animate() {
        const style = getComputedStyle(document.documentElement);
        ctx.fillStyle = style.getPropertyValue('--bg-color').trim() || "#030303";
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        particles.forEach(p => {
            p.update();
            p.draw();
        });

        requestAnimationFrame(animate);
    }

    window.addEventListener('resize', resize);
    resize();

    for (let i = 0; i < particleCount; i++) {
        particles.push(new ParticleOrb(i % 2 === 0 ? 'left' : 'right'));
    }

    animate();

    const btnTabela = document.getElementById('btn-toggle-tabela');
    const kontenerTabela = document.getElementById('miejsce-na-tabele');

    btnTabela.addEventListener('click', async () => {
        
        if (kontenerTabela.innerHTML.trim() !== "") {
            kontenerTabela.innerHTML = "";
            btnTabela.innerText = "Pokaż Tabelę";
            return; 
        }

        
        try {
            btnTabela.innerText = "Ładowanie...";
            const response = await fetch('get_table.php');

            if (!response.ok) throw new Error("Błąd serwera");

            const html = await response.text();
            kontenerTabela.innerHTML = html;
            btnTabela.innerText = "Ukryj Tabelę";

        } catch (err) {
            console.error("Błąd:", err);
            kontenerTabela.innerHTML = "<p class='text-red-500'>Nie udało się załadować danych.</p>";
            btnTabela.innerText = "Pokaż Tabelę";
        }
    });
});