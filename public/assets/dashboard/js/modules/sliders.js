/**
 * Sliders Module Manager
 * Handles AJAX submissions, Edit Modal population, and Table Details interaction.
 */
const SliderModule = {
    init: function (options) {
        this.options = options;
        this.bindEvents();
        this.initAJAX();
    },

    bindEvents: function () {
        const self = this;

        // 1. Handle Edit Button Click
        $(document).on("click", ".js-edit-slider", function () {
            const btn = $(this);
            const id = btn.data("id");
            const titleAr = btn.data("title-ar");
            const titleEn = btn.data("title-en");
            const detailsAr = btn.data("details-ar");
            const detailsEn = btn.data("details-en");
            const urlAr = btn.data("url-ar");
            const urlEn = btn.data("url-en");
            const status = btn.data("status");
            const detailsStatus = btn.data("details-status");
            const buttonStatus = btn.data("button-status");
            const photo = btn.data("photo");

            // Set form action (replace placeholder)
            const url = self.options.routes.update.replace(":id", id);
            $("#edit_slider_form").attr("action", url);

            // Populate fields
            $("#slider_id_edit").val(id);
            $("#title_ar_edit").val(titleAr);
            $("#title_en_edit").val(titleEn);
            $("#details_ar_edit").val(detailsAr);
            $("#details_en_edit").val(detailsEn);
            $("#url_ar_edit").val(urlAr);
            $("#url_en_edit").val(urlEn);

            // Populate switches
            $("#status_active_edit").prop("checked", status == 1);
            $("#details_status_active_edit").prop(
                "checked",
                detailsStatus == 1,
            );
            $("#button_status_active_edit").prop("checked", buttonStatus == 1);

            // Preview photo
            if (photo) {
                $("#edit_slider_preview").html(
                    '<img src="' +
                        photo +
                        '" style="width: 100%; height: 100%; object-fit: cover;">',
                );
            } else {
                $("#edit_slider_preview").html(
                    '<span class="text-muted small">Preview</span>',
                );
            }

            // Show modal
            $("#editSliderModal").modal("show");
        });

        // 2. Handle Modal Reset on Close
        $("#createSliderModal").on("hidden.bs.modal", function () {
            window.clearFormErrors("#create_slider_form");
            $("#create_slider_form")[0].reset();
            $("#create_slider_preview").html(
                '<span class="text-muted small">Preview</span>',
            );
        });

        $("#editSliderModal").on("hidden.bs.modal", function () {
            window.clearFormErrors("#edit_slider_form");
            $("#edit_slider_form")[0].reset();
            $("#edit_slider_preview").html(
                '<span class="text-muted small">Preview</span>',
            );
        });

        // 3. Table Details Logic (Generic Compatibility)
        this.initTableDetails();
    },

    initAJAX: function () {
        // Standard AJAX submission for Create
        window.handleFormSubmit("#create_slider_form", {
            modalToHide: "#createSliderModal",
            tableToLoad: ".js-sliders-table",
            successMessage: this.options.messages.add_success,
        });

        // Standard AJAX submission for Edit
        window.handleFormSubmit("#edit_slider_form", {
            modalToHide: "#editSliderModal",
            tableToLoad: ".js-sliders-table",
            successMessage: this.options.messages.update_success,
            suffix: "_edit",
            resetForm: false,
        });
    },

    initTableDetails: function () {
        const table = document.getElementById("responsiveTable");
        const modalElement = document.getElementById("detailsModal");
        const modalBody = document.getElementById("modalBody");
        const modalTitle = document.getElementById("detailsModalLabel");
        const self = this;

        if (table && modalElement) {
            let detailsModal = new bootstrap.Modal(modalElement);

            table.addEventListener("click", function (e) {
                if (e.target.classList.contains("details-control")) {
                    const row = e.target.closest("tr");
                    const headers = Array.from(
                        table.querySelectorAll("thead th"),
                    ).map((th) => th.innerText);
                    const cells = Array.from(row.querySelectorAll("td"));

                    let html = '<ul class="list-group list-group-flush">';
                    // Assume index 3 is Title for the modal header
                    for (let i = 1; i < headers.length - 1; i++) {
                        if (headers[i] && headers[i].trim() !== "") {
                            const cellContent = cells[i].innerHTML;
                            html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center gap-3">
                                <strong class="text-nowrap">${headers[i]}</strong>
                                <span class="text-end">${cellContent}</span>
                            </li>`;
                        }
                    }
                    html += "</ul>";

                    modalTitle.innerText =
                        self.options.labels.details +
                        " - " +
                        cells[3].innerText;
                    modalBody.innerHTML = html;
                    detailsModal.show();
                }
            });
        }
    },
};
