define([
    'jquery',
], function () {
    'use strict';
    $(document).ready(function () {
        $(document).on('mouseenter', '.product-item-info', function () {
            $(this).find(".action.tocart.primary").show();
        }).on('mouseleave', '.product-item-info', function () {
            $(this).find(".action.tocart.primary").hide();
        });
    });

});