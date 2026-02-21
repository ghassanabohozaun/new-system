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

        // Use provided data attributes or fall back to global translations
        const title =
            button.data("title") ||
            (window.Translations
                ? window.Translations.ask_delete_record
                : "Are you sure?");
        const text =
            button.data("text") ||
            (window.Translations
                ? window.Translations.delete_warning_text
                : "You won't be able to revert this!");

        Swal.fire({
            title: title,
            text: text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: window.Translations
                ? window.Translations.yes_delete_it
                : "Yes, delete it!",
            cancelButtonText: window.Translations
                ? window.Translations.no_cancel
                : "No, cancel!",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: route,
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        if (data.status) {
                            Swal.fire({
                                title: window.Translations
                                    ? window.Translations.deleted
                                    : "Deleted!",
                                text: window.Translations
                                    ? window.Translations.delete_success_message
                                    : "Your record has been deleted.",
                                icon: "success",
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: window.Translations
                                    ? window.Translations.error
                                    : "Error!",
                                text: window.Translations
                                    ? window.Translations.delete_error_message
                                    : "Something went wrong.",
                                icon: "error",
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            title: window.Translations
                                ? window.Translations.error
                                : "Error!",
                            text: window.Translations
                                ? window.Translations.delete_error_message
                                : "Something went wrong.",
                            icon: "error",
                        });
                    },
                });
            }
        });
    });
})(jQuery);
