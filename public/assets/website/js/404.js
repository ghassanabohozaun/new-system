/**
 * 404 Flight Intercept Script
 */
document.addEventListener("DOMContentLoaded", function () {
    // Parallax effect on the content vault based on mouse move
    const vault = document.querySelector(".content-vault");
    const stage = document.querySelector(".flight-stage");

    if (vault && stage) {
        stage.addEventListener("mousemove", (e) => {
            const x = (e.clientX / window.innerWidth - 0.5) * 20;
            const y = (e.clientY / window.innerHeight - 0.5) * 20;
            vault.style.transform = `translate(${x}px, ${y}px)`;
        });
    }

    console.log("Neqat 404 Radar: Active. No external dependencies detected.");
});
