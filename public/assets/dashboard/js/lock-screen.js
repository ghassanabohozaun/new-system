let idleTime = 0;
const idleLimit = 300; // 60 seconds (1 minute) as requested

// Reset timer on any user activity
function resetTimer() {
    idleTime = 0;
}

// Increment idle timer every second
setInterval(() => {
    idleTime++;
    if (idleTime >= idleLimit) {
        if (!window.location.href.includes("lock-screen")) {
            window.location.href = window.Translations.routes.lock_screen;
        }
    }
}, 1000);

window.onload = resetTimer;
window.onmousemove = resetTimer;
window.onmousedown = resetTimer;
window.ontouchstart = resetTimer;
window.onclick = resetTimer;
window.onkeypress = resetTimer;

// Handle Unlock AJAX
$(document).ready(function () {
    $("#lock-form").on("submit", function (e) {
        e.preventDefault();
        const password = $("#lock-password").val();
        const submitBtn = $(this).find('button[type="submit"]');
        const errorEl = $("#lock-error");

        submitBtn
            .prop("disabled", true)
            .html('<i class="fa fa-spinner fa-spin"></i>');
        errorEl.addClass("d-none").text("");

        $.ajax({
            url: window.Translations.routes.unlock_screen,
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                password: password,
            },
            success: function (response) {
                console.log("Unlock response:", response);
                if (response.status) {
                    if (typeof flasher !== "undefined") {
                        flasher.success(
                            window.Translations.messages.unlock_success,
                        );
                    }
                    // Wait 5 seconds before redirecting
                    setTimeout(() => {
                        window.location.replace(
                            response.redirect ||
                                window.Translations.routes.dashboard_index,
                        );
                    }, 5000);
                } else {
                    submitBtn
                        .prop("disabled", false)
                        .text(window.Translations.labels.unlock);
                    errorEl
                        .removeClass("d-none")
                        .text(response.message || "Error");
                }
            },
            error: function (xhr) {
                submitBtn
                    .prop("disabled", false)
                    .text(window.Translations.labels.unlock);

                let errorMsg = window.Translations.messages.error;
                if (xhr.status === 422) {
                    errorMsg =
                        xhr.responseJSON.message ||
                        window.Translations.messages.failed;
                }

                errorEl.removeClass("d-none").text(errorMsg);
                if (typeof flasher !== "undefined") {
                    flasher.error(errorMsg);
                }
            },
        });
    });
});
