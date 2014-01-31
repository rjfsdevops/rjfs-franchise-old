/**
 * Created with JetBrains PhpStorm.
 * User: dan
 * Date: 1/29/14
 * Time: 11:41 AM
 * To change this template use File | Settings | File Templates.
 */


if (RJFS == undefined) {
    var RJFS = {
        glyphicons: {},
        fontawesome: {},
        checkRadio: function (val) {
            //debugger;
            if (val == 'glyphicons') {
                jQuery('#list_type_glyphicons').removeAttr('disabled');
                jQuery('#list_type_fontawesome').attr('disabled', 'disabled');
            } else if (val == 'fontawesome') {
                jQuery('#list_type_fontawesome').removeAttr('disabled');
                jQuery('#list_type_glyphicons').attr('disabled', 'disabled');
            }
            this.loadSelect(val);
        },
        loadSelect: function (val) {
            if (val == undefined) {
                jQuery('#list_type_icon').parents('p').hide();
                jQuery('#list_type_icon option').remove();
            } else if (val == 'glyphicons') {
                jQuery('#list_type_icon option').remove();
                jQuery('#list_type_icon').append(jQuery('<option>Select One</option>'));

                for (var idx in this.glyphicons) {
                    var option = jQuery('<option></option>');
                    option.attr('value', this.glyphicons[idx]);
                    option.html(this.glyphicons[idx]);
                    jQuery('#list_type_icon').append(option);
                }
                jQuery('#list_type_icon').parents('p').show();
            } else if (val == 'fontawesome') {
                jQuery('#list_type_icon option').remove();
                jQuery('#list_type_icon').append(jQuery('<option>Select One</option>'));

                for (var idx in this.fontawesome) {
                    var option = jQuery('<option></option>');
                    option.attr('value', this.fontawesome[idx]);
                    option.html(this.fontawesome[idx]);
                    jQuery('#list_type_icon').append(option);
                }
                jQuery('#list_type_icon').parents('p').show();
            }
        },
        clear: function(){
            //debugger;
            jQuery('#rjfs-list-icon input[type=radio]').removeAttr('checked');
            this.loadSelect();
        }
    };
}


jQuery(document).ready(function ($) {

    RJFS.checkRadio($('#rjfs-list-icon input[type=radio]:checked').val());

    $('#rjfs-list-icon input[type=radio]').on('change', function () {
        var val = $(this).val();
        RJFS.checkRadio(val);
    });

    $('#rjfs-list-icon button').click(function(e){
        e.preventDefault();
        RJFS.clear();
    });
});