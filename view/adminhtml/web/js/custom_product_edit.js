require([
    'jquery'
], function ($) {
    'use strict';
    function changePrice(select) {   
        jQuery(select+'[option_qty]"]').change(function(){
            var price = jQuery(select+'[price]"]').val();
            var qty = jQuery(select+'[option_qty]"]').val();
            var final = price/qty;
            jQuery(select+'[option_price]"]').val(final);
        });
    }
    jQuery(document).ready(function(){
        getCallOnChange();
        jQuery(document).ajaxStop(function () {
            setInterval(function(){ console.log('lol');getCallOnChange(); }, 2000);
        });
    });
});
function getCallOnChange() {
    require([
        'jquery'
    ], function ($) {
        'use strict';
        var cnt = 0;
        jQuery('div[data-index="custom_options"] .admin__dynamic-rows.admin__control-collapsible tbody tr').each(function( index ) {
        var c = 0;
            for (let j = 0; j < jQuery(this).find('table.admin__dynamic-rows.admin__control-table>tbody>tr').length; j++) {
            c = 1;
                var select = 'input[name="product[options]['+cnt+'][values]['+j+']';
                changePrice(select);
            }
        if(c==1){cnt++;}
        });
    });
}
function changePrice(select) {   
    require([
        'jquery'
    ], function ($) {
        'use strict';
        jQuery(select+'[option_qty]"]').change(function(){
            var price = jQuery(select+'[price]"]').val();
            var qty = jQuery(select+'[option_qty]"]').val();
            var final = price/qty;
            jQuery(select+'[option_price]"]').val(final);
        });
    });
}