/*
 * Custom Dashboard Scripts
 * All new custom scripts for the dashboard should be added to this file
 * instead of being added inline to the layout file.
 */

(function ($) {
    "use strict";

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // --- Generic Delete Handler ---
    $(document).on("click", ".delete-confirm, .js-delete-btn", function (e) {
        e.preventDefault();
        const button = $(this);
        const id = button.data("id");
        const route = button.data("url") || button.data("route");

        const title =
            button.data("title") ||
            (window.Translations
                ? window.Translations.ask_delete_record
                : "Are you sure?");
        const text =
            button.data("text") ||
            (window.Translations
                ? window.Translations.delete_warning_text
                : "");

        Swal.fire({
            title: title,
            text: text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: window.Translations
                ? window.Translations.yes_delete_it
                : "Yes",
            cancelButtonText: window.Translations
                ? window.Translations.no_cancel
                : "No",
            reverseButtons: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: route,
                    data: { id: id },
                    success: function (data) {
                        if (data.status) {
                            Swal.fire({
                                title: window.Translations
                                    ? window.Translations.deleted
                                    : "Deleted!",
                                text: window.Translations
                                    ? window.Translations.delete_success_message
                                    : "",
                                icon: "success",
                            }).then(() => {
                                const table = button.closest("table");
                                if (
                                    table.length &&
                                    table.hasClass("js-sliders-table")
                                ) {
                                    $(table).load(
                                        location.href +
                                            " ." +
                                            table
                                                .attr("class")
                                                .split(" ")
                                                .join("."),
                                    );
                                } else {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: window.Translations
                                    ? window.Translations.error
                                    : "Error!",
                                text:
                                    data.message ||
                                    (window.Translations
                                        ? window.Translations
                                              .delete_error_message
                                        : ""),
                                icon: "error",
                            });
                        }
                    },
                    error: function (xhr) {
                        let errorMessage = window.Translations
                            ? window.Translations.delete_error_message
                            : "Something went wrong!";

                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        Swal.fire({
                            title: window.Translations
                                ? window.Translations.error
                                : "Error!",
                            text: errorMessage,
                            icon: "error",
                        });
                    },
                });
            }
        });
    });
    // --- Generic Helpers ---

    /**
     * Clear validation errors from a form
     */
    window.clearFormErrors = function (formSelector) {
        const form = $(formSelector);
        form.find("input, select, textarea").removeClass("is-invalid");
        form.find("strong.text-danger").text("");
    };

    /**
     * Display validation errors in a form
     */
    window.showValidationErrors = function (formSelector, errors, suffix = "") {
        $.each(errors, function (key, value) {
            const fieldId = key.replace(/\./g, "_") + suffix;
            const errorId = key.replace(/\./g, "_") + "_error" + suffix;
            $(`#${fieldId}`).addClass("is-invalid");
            $(`#${errorId}`).text(value[0]);
        });
    };

    /**
     * Generic AJAX form submission handler
     */
    window.handleFormSubmit = function (formSelector, options = {}) {
        const form = $(formSelector);

        form.on("submit", function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            const settings = $.extend(
                {
                    url: form.attr("action"),
                    method: form.attr("method") || "POST",
                    spinner: ".spinner_loading",
                    tableToLoad: "#responsiveTable",
                    modalToHide: null,
                    successMessage: window.Translations
                        ? window.Translations.success
                        : "Success",
                    suffix: "",
                    onSuccess: null,
                    onError: null,
                    onComplete: null,
                    resetForm: true,
                },
                options,
            );

            const requestUrl =
                typeof settings.url === "function"
                    ? settings.url(form)
                    : settings.url;

            $.ajax({
                url: requestUrl,
                type: settings.method,
                data: formData,
                dataType: "json",
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    window.clearFormErrors(formSelector);
                    $(settings.spinner).removeClass("d-none");
                },
                success: function (data) {
                    if (data.status) {
                        if (settings.tableToLoad) {
                            $(settings.tableToLoad).load(
                                location.href + " " + settings.tableToLoad,
                            );
                        }
                        if (settings.modalToHide) {
                            $(settings.modalToHide).modal("hide");
                        }
                        if (typeof flasher !== "undefined") {
                            flasher.success(settings.successMessage);
                        }
                        if (typeof settings.onSuccess === "function") {
                            settings.onSuccess(data);
                        }
                        if (settings.resetForm) {
                            form[0].reset();
                        }
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        window.showValidationErrors(
                            formSelector,
                            errors,
                            settings.suffix,
                        );
                    }
                    if (typeof settings.onError === "function") {
                        settings.onError(xhr);
                    }
                },
                complete: function () {
                    $(settings.spinner).addClass("d-none");
                    if (typeof settings.onComplete === "function") {
                        settings.onComplete();
                    }
                },
            });
        });
    };

    /**
     * Standard Flag + Text formatter for Select2
     */
    window.formatSelect2Country = function (country) {
        if (!country.id) {
            return country.text;
        }
        var flagCode = country.flag_code ? country.flag_code.toLowerCase() : "";
        var $country = $(
            '<span><span class="flag-icon flag-icon-' +
                flagCode +
                ' me-2"></span>' +
                country.text +
                "</span>",
        );
        return $country;
    };

    /**
     * Global Status Change Handler
     * Used on checkbox/switch elements with .js-status-change class
     */
    $(document).on("change", ".js-status-change", function () {
        const checkbox = $(this);
        const id = checkbox.data("id");
        const url = checkbox.data("url");
        const badgePrefix = checkbox.data("badge-prefix"); // e.g., 'admin_status_'
        const statusSwitch = this.checked ? 1 : 0;

        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: id,
                statusSwitch: statusSwitch,
            },
            success: function (data) {
                if (data.status === true) {
                    if (badgePrefix) {
                        const statusBadge = $("." + badgePrefix + id);
                        statusBadge.empty();
                        statusBadge.removeClass(
                            "badge badge-pill-danger badge-pill-success",
                        );

                        if (data.data.status == 1) {
                            statusBadge
                                .addClass("badge badge-pill-success")
                                .text(window.Translations.labels.enabled);
                        } else {
                            statusBadge
                                .addClass("badge badge-pill-danger")
                                .text(window.Translations.labels.disabled);
                        }
                    }

                    if (typeof flasher !== "undefined") {
                        flasher.success(
                            window.Translations.messages.status_updated,
                        );
                    } else {
                        Swal.fire({
                            icon: "success",
                            title: window.Translations.messages.status_updated,
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                        });
                    }
                } else {
                    checkbox.prop("checked", !checkbox.is(":checked"));
                    Swal.fire({
                        icon: "error",
                        title: window.Translations.messages.status_failed,
                        customClass: { title: "fs-6" },
                    });
                }
            },
            error: function () {
                checkbox.prop("checked", !checkbox.is(":checked"));
                Swal.fire({
                    icon: "error",
                    title: window.Translations.messages.status_failed,
                    customClass: { title: "fs-6" },
                });
            },
        });
    });
    /**
     * Image Preview Handler
     */
    $(document).on("change", ".js-image-preview", function () {
        const input = this;
        const previewSelector = $(this).data("preview");
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $(previewSelector).html(
                    '<img src="' +
                        e.target.result +
                        '" style="width: 100%; height: 100%; object-fit: cover;">',
                );
            };
            reader.readAsDataURL(input.files[0]);
        }
    });

    /**
     * Initialize Sliders Form
     */
    window.handleFormSubmit(".js-form-submit", {
        tableToLoad: ".js-sliders-table",
        modalToHide: "#createSliderModal, #editSliderModal",
    });

    /*
     * Custom File Input - Translate browser-native "No file chosen" / "Choose file"
     * Wraps every <input type="file"> that has NOT been explicitly excluded,
     * replacing the native UI with a styled version showing translated labels.
     */
    function initCustomFileInputs() {
        var chooseLabel =
            (window.Translations && window.Translations.choose_file) ||
            "Choose File";
        var noFileLabel =
            (window.Translations && window.Translations.no_file_chosen) ||
            "No file chosen";

        $('input[type="file"]')
            .not(".custom-file-initialized")
            .each(function () {
                var $input = $(this);
                $input.addClass("custom-file-initialized");

                // Hide the native input, keep it in DOM for form submission
                $input.css({
                    position: "absolute",
                    opacity: 0,
                    width: "0.1px",
                    height: "0.1px",
                    overflow: "hidden",
                });

                // Build the custom wrapper using label[for] for native click & perfect alignment
                var inputId =
                    $input.attr("id") ||
                    "cfi-" + Math.random().toString(36).substr(2, 8);
                $input.attr("id", inputId);

                var $lbl = $(
                    '<label for="' +
                        inputId +
                        '" class="btn btn-sm btn-outline-secondary flex-shrink-0 mb-0" style="font-size:0.78rem; cursor:pointer;"><i class="mdi mdi-folder-open-outline me-1"></i>' +
                        chooseLabel +
                        "</label>",
                );
                var $name = $(
                    '<span class="custom-file-name text-muted text-truncate" style="flex:1; min-width:0; font-size:0.82rem; display:flex; align-items:center; margin-top:-2px;"></span>',
                ).text(noFileLabel);
                var $wrapper = $(
                    '<div style="display:flex; gap:8px; width:100%;"></div>',
                );
                $wrapper.append($lbl).append($name);
                $input.after($wrapper);

                // Update displayed name on file selection
                $input.on("change", function () {
                    var n =
                        this.files && this.files.length > 0
                            ? this.files[0].name
                            : noFileLabel;
                    $name.text(n);
                });
            });
    }

    // Run on DOMReady and after modals are shown (for dynamic inputs)
    initCustomFileInputs();
    $(document).on("shown.bs.modal", function () {
        initCustomFileInputs();
    });
})(jQuery);
