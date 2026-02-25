/**
 * Neqat 403 Constellation Logic
 */
document.addEventListener("DOMContentLoaded", function () {
    const canvas = document.getElementById("constellationCanvas");
    if (!canvas) return;

    const ctx = canvas.getContext("2d");
    const card = document.getElementById("tiltCard");

    // Check direction
    const isRTL = document.documentElement.getAttribute("dir") === "rtl";

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    let particlesArray;
    let mouse = {
        x: null,
        y: null,
        radius: 170,
    };

    window.addEventListener("mousemove", (event) => {
        mouse.x = event.x;
        mouse.y = event.y;

        if (card) {
            // 3D Tilt Interaction - Adjusted for direction
            const x = (window.innerWidth / 2 - event.pageX) / 55;
            const y = (window.innerHeight / 2 - event.pageY) / 55;

            // Mirror rotation if RTL
            const rotateY = isRTL ? x : -x;
            card.style.transform = `rotateY(${rotateY}deg) rotateX(${y}deg)`;
        }
    });

    // Particle System
    class Particle {
        constructor(x, y, directionX, directionY, size, color) {
            this.x = x;
            this.y = y;
            this.directionX = directionX;
            this.directionY = directionY;
            this.size = size;
            this.color = color;
        }
        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
            ctx.fillStyle = this.color;
            ctx.fill();
        }
        update() {
            if (this.x > canvas.width || this.x < 0)
                this.directionX = -this.directionX;
            if (this.y > canvas.height || this.y < 0)
                this.directionY = -this.directionY;

            let dx = mouse.x - this.x;
            let dy = mouse.y - this.y;
            let distance = Math.sqrt(dx * dx + dy * dy);
            if (distance < mouse.radius) {
                if (mouse.x < this.x && this.x < canvas.width - this.size * 10)
                    this.x += 2;
                if (mouse.x > this.x && this.x > this.size * 10) this.x -= 2;
                if (mouse.y < this.y && this.y < canvas.height - this.size * 10)
                    this.y += 2;
                if (mouse.y > this.y && this.y > this.size * 10) this.y -= 2;
            }

            this.x += this.directionX;
            this.y += this.directionY;
            this.draw();
        }
    }

    function init() {
        particlesArray = [];
        let numberOfParticles = (canvas.height * canvas.width) / 9000;
        for (let i = 0; i < numberOfParticles; i++) {
            let size = Math.random() * 3 + 1;
            let x = Math.random() * innerWidth;
            let y = Math.random() * innerHeight;
            let directionX = Math.random() * 0.8 - 0.4;
            let directionY = Math.random() * 0.8 - 0.4;
            particlesArray.push(
                new Particle(x, y, directionX, directionY, size, "#d4a34d"),
            );
        }
    }

    // Connection Engine (The Constellation Lines)
    function connect() {
        for (let a = 0; a < particlesArray.length; a++) {
            for (let b = a; b < particlesArray.length; b++) {
                let distance =
                    (particlesArray[a].x - particlesArray[b].x) *
                        (particlesArray[a].x - particlesArray[b].x) +
                    (particlesArray[a].y - particlesArray[b].y) *
                        (particlesArray[a].y - particlesArray[b].y);

                if (distance < (canvas.width / 7) * (canvas.height / 7)) {
                    let opacity = 1 - distance / 20000;
                    ctx.strokeStyle = `rgba(212, 163, 77, ${opacity})`;
                    ctx.lineWidth = 0.6;
                    ctx.beginPath();
                    ctx.moveTo(particlesArray[a].x, particlesArray[a].y);
                    ctx.lineTo(particlesArray[b].x, particlesArray[b].y);
                    ctx.stroke();
                }
            }
        }
    }

    function animate() {
        requestAnimationFrame(animate);
        ctx.clearRect(0, 0, innerWidth, innerHeight);
        for (let i = 0; i < particlesArray.length; i++) {
            particlesArray[i].update();
        }
        connect();
    }

    window.addEventListener("resize", () => {
        canvas.width = innerWidth;
        canvas.height = innerHeight;
        init();
    });

    init();
    animate();

    console.log("Neqat 403 Constellation: Active. Local assets only.");
});
