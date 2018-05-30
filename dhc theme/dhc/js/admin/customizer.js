( function( $ ) {
  "use strict";

    var api = wp.customize,
    doc = $(document);

    var dhc_box_control = function(){
        $(".dhc-options-control-box-controls input[type=text]").on("change",function(){
        	var parent = $(this).parents(".dhc-options-control-box-controls"),
                input_hidden = parent.find("input[type=hidden]"),
            	settinglink = input_hidden.data('customize-setting-link');
        	var data_position = {};
        	parent.find('input[type=text]').each(function(){
        		var $this = $(this);
        		data_position[$this.data('position')] = $this.val();
        	});
            input_hidden.val(JSON.stringify(data_position));
        	if ( api(settinglink) )
	          api.instance( settinglink ).set( JSON.stringify(data_position));
        })
    }


    var SocialIcons = function() {
       
        var list = $( '.dhc_icons');
        var $document = $(document);
        var properties  = list.find('.item-properties'),
        hiddenInput = list.parent().find( 'input[type="hidden"]'),
        settinglink = hiddenInput.data('customize-setting-link');
       
       if ($().sortable) {
              $document.find('.dhc_icons').sortable({
                 stop: function( event, ui ) {
                    list = ui.item.parent();
                    hiddenInput = list.parent().find( 'input[type="hidden"]');
                    updateOption();
                 }
                });
          }
        

        var columnIndhc = function( li ) {
            var indhc = li.prevAll( '.item' ).length + 1;
            while( indhc > 7 ) indhc = indhc - 7;
            return indhc;
          };

      var updateOption = function() {
        
        var ordering = [],
          icons = {};

        list.find( '> li[data-id]' ).each( function() {

          ordering.push( $( this ).attr( 'data-id' ) );

          if ( $( this ).attr( 'data-link' ) !== undefined )
            icons[$( this ).attr( 'data-id' )] = $( this ).attr( 'data-link' );
        });

        icons['__ordering__'] = ordering;


        hiddenInput.val( JSON.stringify( icons ) );

        if ( api(settinglink) ){
          api.instance( settinglink ).set( JSON.stringify(icons ));
        }
      };

      var toggleEdit = function() {
        var li = $( this ),
          liIndhc = columnIndhc( li ),
          liNextItems = li.nextAll( '.item' ),
          liIndhcRemain = 7 - liIndhc,
          rightItems = $.makeArray( liNextItems ).slice( 0, liIndhcRemain );
          list = li.parent();
          hiddenInput = list.parent().find( 'input[type="hidden"]'),
          settinglink = hiddenInput.data('customize-setting-link');
          properties  = list.find('.item-properties');
          if ($().sortable) {
              list.sortable();
          }

        if ( li.hasClass( 'active' ) ) {
          confirmChange();
          return;
        }
        
        properties.addClass( 'property_active' );
        list.children().removeClass( 'active' );
        li.addClass( 'active' );

        if ( rightItems.length == 0 ) li.after( properties );
        else $( rightItems.pop() ).after( properties );

        properties.find( '.input-title' ).text( li.attr( 'data-title' ) );
        properties.find( '.input-field' ).val( li.attr( 'data-link' ) );
        properties.find( '.input-field' ).get( 0 ).focus();
      };

      var cancelEdit = function() {
        properties.removeClass( 'property_active' );
        list.children().removeClass( 'active' );
      };

      var confirmChange = function() {
        properties = list.find('.item-properties').first();
        properties.removeClass( 'property_active' );
        if ( properties.find( '.input-field' ).val().trim() != '' )
          list.find( 'li.active' ).attr( 'data-link', properties.find( '.input-field' ).val() );
        else
          list.find( 'li.active' ).removeAttr( 'data-link' );
        
        updateOption(list);
        cancelEdit();
      };
        $document.on("click", 'button.cancel', cancelEdit );
        $document.on("click", 'button.confirm', confirmChange );

        $document.on( 'keydown', 'input.input-field', function(e) {
        if ( e.keyCode == 13 ) {
          e.preventDefault();
          confirmChange();
        }

        if ( e.keyCode == 27 ) {
          e.preventDefault();
          cancelEdit();
          }
        } );

      $document.on("click",'.dhc_icons .item', toggleEdit );
  
    }

   var Typography = ( function() {
        function Typography( element, options ) {
        if ($(element).length != 0){
        if ($().choosen) {
        $(".select-choosen").chosen();
        }
            var root = $( element ),
                settingLink = root.find("#typography-value").attr('data-customize-setting-link');
            var data_variants = JSON.parse(root.find("#datas").attr('data_variants')),
                data_subsets = JSON.parse(root.find("#datas").attr('data_subsets'));
            root.find('.typography-font select').on('change', function() {
                var variants = $(this).find('option:selected').attr('data_variants'),
                    fontWeight = $(this).closest(element).find('.typography-style select'),
                    currentVariant = fontWeight.val();
                    fontWeight.empty();

                if (variants !== undefined) {
                    $.each(JSON.parse(variants), function(indhc, value) {
                        value = value.trim();
                        fontWeight.append($('<option />', { value: value }).text(
                            data_variants[value] !== undefined ? data_variants[value] : value
                        ));
                    });
                }

                fontWeight.val(currentVariant);

                var subsets = $(this).find('option:selected').attr('data_subsets'),
                    subset = $(this).closest(element).find('.typography-subsets .dhc-options-control-inputs');
                    
                    subset.empty();
                    var switcher_subset;

                if (subsets !== undefined) {
                    $.each(JSON.parse(subsets), function(indhc, value) {
                        value = value.trim();
                        var _value = data_subsets[value] !== undefined ? data_subsets[value] : value;
                         switcher_subset = '\
                        <label class="_options-switcher-subsets">\
                            <span class="dhc-options-control-title">'+_value+'</span>\
                            <input type="checkbox" value="'+value+'" name="_dhc-options-control-typography-'+settingLink+'[subsets]">\
                            <span class="dhc-options-control-indicator">\
                                <span></span>\
                            </span>\
                        </label>';
                        subset.append(switcher_subset);
                    });
                }

            });

            var save_customize = function(a) {
                settingLink = a.find("#typography-value").attr('data-customize-setting-link');
                if (wp.customize && settingLink) {
                    var __subsets = [];
                    root.find('._options-switcher-subsets input[type="checkbox"]:checked').each(function(){
                        __subsets.push($(this).val());
                    });

                    wp.customize.instance(settingLink).set(JSON.stringify({
                        family: a.find('.typography-font select').val(),
                        size: a.find('.typography-size input').val(),
                        line_height: a.find('.typography-line_height input').val(),
                        style: a.find('.typography-style select').val(),
                        color: a.find('.typography-color .dhc-color-picker').val(),
                        subsets: __subsets
                    }));
                }
            }

            root.on('change', 'select, input', function() {
                save_customize($(this).closest('.dhc-options-control-typography'));
            });

        };

        };

        return Typography;
    } )();

    $(document).on('widget-updated', function(e, widget){
       SocialIcons();
    });

    $(function() { 
        SocialIcons();
        Typography('.dhc-options-control-typography');
        dhc_box_control();
    })

} )(jQuery );

 var functest = function() {
    }