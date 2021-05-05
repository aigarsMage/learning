'use strict';

define([
    'ko',
    'uiElement'
], function (ko, Element) {
    return Element.extend({

        initObservable: function () {
            this._super().observe(['qty']);

            return this;
        },

        validateData: function () {

            if (parseInt(this.qty()) > this.stockQty) {
                console.log("if more than stock");
                this.qty(this.stockQty);
            }

            if (!this.qty()) {
                console.log("Blank");
                this.qty(1);
            }

        },

        getDataValidator: function() {

            return JSON.stringify(this.dataValidate);
        },

        decreaseQty: function() {
            var qty;

            if (this.qty() > 1) {
                qty = this.qty() - 1;
            } else {
                qty = 1;
            }

            this.qty(qty);
        },

        increaseQty: function() {

            if (parseInt(this.qty()) < this.stockQty) {

                var qty = parseInt(this.qty()) + 1;

                this.qty(qty);
            }
        }
    });
});

//TODO
// Add max selectable qty
// add ability to enter amount manually + then use +/-