$(function () {

    "use strict";

    //====== header setting js ======
    $(".setting").on("click", function (event) {
        $(".drop_menu_setting").toggleClass("show_setting");
        event.stopPropagation();
        $(".drop_menu_user").removeClass("show_setting");
        $(".drop_list").removeClass("show_drop_list");
        $(".theme_area").removeClass("show_drop_theme");
    });

    $('body').click(function (event) {
        if ($(".drop_menu_setting").hasClass("show_setting")) {
            if (!$(event.target).closest('.setting_area').length) {
                $(".drop_menu_setting").removeClass("show_setting");
            }
        }
    });

    //====== header icon toggler ======
    $(".header_icon").on("click", function () {
        $(".content_area").toggleClass("hide_text");
    });

    //====== header user js ======
    $(".user").on("click", function (event) {
        $(".drop_menu_user").toggleClass("show_setting");
        event.stopPropagation();
        $(".drop_menu_setting").removeClass("show_setting");
        $(".theme_area").removeClass("show_drop_theme");
        $(".drop_list").removeClass("show_drop_list");
    });

    $('body').click(function (event) {
        if ($(".drop_menu_user").hasClass("show_setting")) {
            if (!$(event.target).closest('.user_area').length) {
                $(".drop_menu_user").removeClass("show_setting");
            }
        }
    });

    //====== create modal js ======
    $(".create_note").on("click", function (event) {
        event.stopPropagation();
        const $createModal = $('.custom_modal_area[data-modal="create"]');
        $(".custom_modal_area").removeClass("show_modal");
        $createModal.addClass("show_modal");

        // Optional: Clear inputs if needed
        $createModal.find("input, textarea").val("");

        closeMenus();
    });

    // Click on a single note to open its modal
    $(".single_note_content").on("click", function (event) {
        event.stopPropagation();
        const modalId = $(this).data("modal");
        const $targetModal = $(`.custom_modal_area[data-modal="${modalId}"]`);
        if ($targetModal.length) {
            $(".custom_modal_area").removeClass("show_modal");
            $targetModal.addClass("show_modal");
        }
        closeMenus();
    });

    // Cancel modal and close it
    $(".cancel_modal").on("click", function (event) {
        $(this).closest(".custom_modal_area").removeClass("show_modal");
        event.stopPropagation();
    });

    // Close modal if clicking outside of it
    $('body').click(function (event) {
        $(".custom_modal_area.show_modal").each(function () {
            if (!$(event.target).closest('.custom_modal_content').length) {
                $(this).removeClass("show_modal");
            }
        });
    });

    //====== modal dropdown list ======
    $(".modal_drop_list").on("click", function (event) {
        const $siblingsDropList = $(this).siblings(".drop_list");
        $(".drop_list").not($siblingsDropList).removeClass("show_drop_list");
        $siblingsDropList.toggleClass("show_drop_list");
        event.stopPropagation();
        $(".theme_area").removeClass("show_drop_theme");
        $(".drop_menu").removeClass("show_setting");
    });

    $('body').click(function (event) {
        if (!$(event.target).closest('.ions_area').length) {
            $(".drop_list").removeClass("show_drop_list");
        }
    });

    //====== modal dropdown theme color ======
    $(".modal_drop_theme").on("click", function (event) {
        const $siblingsThemeArea = $(this).siblings(".theme_area");
        $(".theme_area").not($siblingsThemeArea).removeClass("show_drop_theme");
        $siblingsThemeArea.toggleClass("show_drop_theme");
        event.stopPropagation();
        $(".drop_list").removeClass("show_drop_list");
        $(".drop_menu").removeClass("show_setting");
    });

    $('body').click(function (event) {
        if (!$(event.target).closest('.ions_area').length) {
            $(".theme_area").removeClass("show_drop_theme");
        }
    });

    //=== Utility ===
    function closeMenus() {
        $(".drop_menu_user").removeClass("show_setting");
        $(".drop_menu_setting").removeClass("show_setting");
        $(".theme_area").removeClass("show_drop_theme");
        $(".drop_list").removeClass("show_drop_list");
    }

});
