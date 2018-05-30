jQuery( function ( $ )
{
    checkboxToggle();
    show_hide_controls();
    dhc_color_picker();
    togglePostFormatMetaBoxes();    
    Metaboxes();
    SingleImagePicker('.dhc-options-control-single-image-control');

    /**
     * Show, hide a <div> based on a checkbox
     *
     * @return void
     * @since 1.0
     */
    function dhc_color_picker(){
        if ( $().wpColorPicker ) {
            $('.flat-color-picker').wpColorPicker({
                change:function(event, ui) {
                $(this).parents(".dhc-dhc-options-control-inputs").find(".choose-color").trigger('change');
                }
            });
        }
    }

     function SingleImagePicker(element) {
            if($(element).length != 0) {
                var frame,
                metaBox = $(element), // Your meta box id here
                addImgLink = metaBox.find('a.browse-media'),
                delImgLinks = metaBox.find( 'a.remove'),
                delImgLink = metaBox.find('a.dhc-remove-media'),
                imgContainer = metaBox.find( '.upload-preview'),
                imgIdInput = metaBox.find( '.image-value' );
                addImgLink.parent().show();
                var ids = [];

                // ADD IMAGE LINK
                addImgLink.on( 'click', function( event ){
                var _root = $(this).parents('li');
                imgContainer = _root.find( '.upload-preview'),
                imgIdInput = _root.find( '.image-value' );
                event.preventDefault();
    
                // If the media frame already exists, reopen it.
                if ( frame ) {
                  frame.open();
                  return;
                }
    
                // Create a new media frame
                frame = wp.media( {
                    title: 'Select or Upload Media Of Your Chosen Persuasion',
                      button: {
                        text: 'Use this media'
                      },
                    multiple: false  // Set to true to allow multiple files to be selected
                });

                // When an image is selected in the media frame...
                frame.on( 'select', function() {
      
                // Get media attachment details from the frame state
                var length = frame.state().get('selection').length;

                var images = frame.state().get("selection").models;
                var image_url;
                for(var iii = 0; iii < length; iii++) {
                    image_url = images[iii].changed.url;
                    imgContainer.html( '' );
                    imgContainer.append( '<li><img src="'+image_url+'" alt="" style="max-width:100%;"/><a href="#" id="'+images[iii].id+'" class="dhc-remove-media" title="Remove"> <span class="dashicons dashicons-no-alt"></span> </a>' );
                    var image_caption = images[iii].changed.caption;
                    var image_title = images[iii].changed.title;
                }

                // Hide the add image link
                $(this).parent().hide();

                imgIdInput.val(image_url);

                // Unhide the remove image link
                    delImgLink.show();
                });

                // Finally, open the modal on click
                frame.open();
            });

 
        // DELETE IMAGE LINK
        metaBox.on( 'click', 'a.dhc-remove-media',function( event ){
        event.preventDefault();
        var _root = $(this).parents('li');
        imgContainer = _root.find( '.upload-preview'),
        addImgLink = _root.find('a.browse-media'),
        imgIdInput = _root.find( '.image-value' );
        addImgLink.parent().show();
        imgIdInput.val('');
        imgContainer.html( '' );

      });

        delImgLinks.on( 'click', function( event ){
        var _root = $(this).parents('li');
        imgContainer = _root.find( '.upload-preview'),
        imgIdInput = _root.find( '.image-value' );
        event.preventDefault();

        // Clear out the preview image
        imgContainer.html( '' );

        // Un-hide the add image link
        addImgLink.parent().show();

        // Hide the delete image link
        delImgLink.hide();

        // Delete the image id from the hidden input
        imgIdInput.val( '' );

      });
            }
        }
   

    function show_hide_controls() {
        $('.dhc-options-container-content input[type=checkbox]').each(function(){
            var $this = $(this);
            if ( $this.attr('children').length > 2 ){
                if ($this.is(':checked')) {
                    $($this.attr('children')).show();
               }
               else {
                    $($this.attr('children')).hide();
               }
           }
       });
        $(document).on('change','.dhc-options-container-content input[type=checkbox]',function(){
            var $this = $(this);
          if ($this.is(':checked')) {
                $($this.attr('children')).show();
                $this.parents("li").find('.dhc-options-control-title').addClass('active');
           }
           else {
                $($this.attr('children')).hide();
                $this.parents("li").find('.dhc-options-control-title').removeClass('active');
           }
            })
    }

    function checkboxToggle()
    {
        $( 'body' ).on( 'change', '.checkbox-toggle input', function()
        {
            var $this = $( this ),
                $toggle = $this.closest( '.checkbox-toggle' ),
                action;
            if ( !$toggle.hasClass( 'reverse' ) )
                action = $this.is( ':checked' ) ? 'slideDown' : 'slideUp';
            else
                action = $this.is( ':checked' ) ? 'slideUp' : 'slideDown';

            $toggle.next()[action]();
        } );
        $( '.checkbox-toggle input' ).trigger( 'change' );
    }

    function Metaboxes() {
    
        var args = {duration: 600};
        $('.flat-toggle .toggle-title.active').siblings('.toggle-content').show();

        $('.flat-toggle.enable .toggle-title').on('click', function() {
            $(this).closest('.flat-toggle').find('.toggle-content').slideToggle(args);
            $(this).toggleClass('active');
        }); // toggle 

        $('.flat-accordion .toggle-title').on('click', function () {
            if( !$(this).is('.active') ) {
                $(this).closest('.flat-accordion').find('.toggle-title.active').toggleClass('active').next().slideToggle(args);
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            } else {
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            }     
        }); 

      

    }

    /**
     * Show, hide post format meta boxes
     *
     * @return void
     * @since 1.0
     */
    function togglePostFormatMetaBoxes()
    {
        var $input = $( 'input[name=post_format]' ),
            $metaBoxes = $( '#blog-options [id^="dhc-dhc-options-control-"]' ).hide();

        // Don't show post format meta boxes for portfolio
        if ( $( '#post_type' ).val() == 'members' )
            return;

        if ( $( '#post_type' ).val() == 'food' )
            return;

        $input.change( function ()
        {
            $metaBoxes.hide();
            if ( $(this).val() == 'gallery' || $(this).val() == 'video' ) { 
                $( '[id*="dhc-dhc-options-control-' + $( this ).val()+ '"]').show();
            }
            else $('#dhc-dhc-options-control-blog_heading') .show();

        } );
        $input.filter( ':checked' ).trigger( 'change' );
    }   

      var ImagePicker = ( function() {
        function ImagePicker( element ) {
            var self = this;

            this.root           = $( element );
            this.settingLink    = this.root.attr( 'data-customizer-link' );
            this.settingMetaLink = this.root.attr('data-meta-link');
            this.idInput        = $( 'input[data-property="id"]', this.root );
            this.thumbnailInput = $( 'input[data-property="thumbnail"]', this.root );
            this.preview        = $( '.upload-preview', this.root );
            this.selected       = {
                id: this.idInput.val(),
                thumbnail: this.thumbnailInput.val()
            };


            $( 'a.browse-media', this.root ).on( 'click', this.browse.bind( this ) );
            $( 'a.remove', this.root ).on('click', this.remove.bind( this ) );

            this.thumbnailInput.on( 'change', ( function() {
                this.preview.empty();

                if ( this.selected.thumbnail != '' ) {
                    this.root.addClass( 'has-image' );
                    this.preview.append( $( '<img />', { src: this.selected.thumbnail } ) );
                }
                else {
                    this.root.removeClass( 'has-image' );
                }

            } ).bind( this ) ).trigger( 'change' );
        };

        ImagePicker.prototype = {
            initUploader: function() {
                var self = this;
                var root = this.root;

                // Initialize the drag to upload plugin
                new wp.Uploader($.extend({
                    container: root,
                    browser:   root.find( '.upload' ),
                    dropzone:  root.find( '.upload-dropzone' ),
                    success:   function( attachment ) {
                        root.removeClass( 'has-error' );
                        self.select( attachment );
                    },
                    error: function( message ) {
                        root.addClass( 'has-error' );
                        root.find( '.dhc-dhc-options-control-message' ).remove();
                        root.find( '.dhc-dhc-options-control-inputs' ).append(
                            $( '<p />', { 'class': 'dhc-dhc-options-control-message dhc-dhc-options-control-error' } ).text( message )
                        );
                    },
                    progress: function( attachment ) {},
                    plupload:  {},
                    params:    {}
                }, {} ));
            },

            browse: function( e ) {
                var self = this, mediaManager;

                e.preventDefault();

                // Create media manager instance
                mediaManager = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: { text: 'Choose Image' },
                    multiple: true,
                    library: { type: 'image' }
                });

                // Register select event to update value
                mediaManager.on('select', function() {
                    var
                    attachment = mediaManager.state().get('selection').first();
                    self.select( attachment );
                });

                mediaManager.open();
            },

            select: function( attachment ) {
                var thumbnail = {};

                // Find the smallest thumbnail
                $.map( attachment.get( 'sizes' ), function( value ) {
                    if ( thumbnail.width === undefined || thumbnail.width > value.width )
                        thumbnail = value;
                } );

                this.selected = { id: attachment.get( 'id' ), thumbnail: thumbnail.url };
                this.idInput.val( this.selected.id ).trigger( 'change' );
                this.thumbnailInput.val( this.selected.thumbnail ).trigger( 'change' );
            },

            remove: function( e ) {
                e.preventDefault();

                this.selected = { id: '', thumbnail: '' };
                this.idInput.val( '' ).trigger( 'change' );
                this.thumbnailInput.val( '' ).trigger( 'change' );
            }
        };

        return ImagePicker;
    } )();
} );