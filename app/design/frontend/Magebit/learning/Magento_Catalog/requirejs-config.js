var config = {
    map: {
        '*': {
            'qty-counter': 'Magento_Catalog/js/qty-counter'
        }
    },
    paths: {
        'show-hide-addtocart': 'Magento_Catalog/js/show-hide-addtocart'
    },
    shim: {
        'show-hide-addtocart': {
            deps: ['jquery']
        }
    }
};