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

    $(document).on("click", ".delete-confirm", function (e) {
        e.preventDefault();
        const button = $(this);
        const id = button.data("id");
        const route = button.data("route");

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
                                location.reload();
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
})(jQuery);
