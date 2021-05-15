(function($){

    var add_form  = $('#add-form'),
        input =  add_form.find('#text'),
        menu  = $('.menu');

    /**
     * COLOR
     */
    var startColor = '#00bc84',
    endColor = menu.children().css( 'background-color' );

    $('.btn').hide();

    input.val('').focus();
 
    add_form.on('submit', function( event ) {

        event.preventDefault();

        var req = $.ajax({
            url: add_form.attr('action'),
            type: 'POST',
            data: add_form.serialize(),
            // JSON
            dataType: 'json'
        });

        req.done( function( data ){
            //console.log( data ); - request na stránku a zpět to pošle celý html kod
            if ( data.status  === 'success'){
                
                $.ajax({ url: baseURL }).done( function( html ){

                    var newItem = $(html).find('#item-'+ data.id );

                    newItem.appendTo(menu)
                        .css({ backgroundColor: startColor })
                        .delay( 200 )
                        .animate({ backgroundColor: endColor });

                    input.val('').focus();
                });
            };
        });
    });

    input.on('keypress', function( event ){
        if( event.which === 13 ){
            add_form.submit();
        }
    });

    /**
     * EDIT FORM
     */
    var edit_form = $('#edit-form');

    edit_form.find('#text').focus();

    input.on('keypress', function( event ){
        if( event.which === 13 ){
            edit_form.submit();
        }
    });

    /**
     * DELETE FORM
     */
    var delete_form = $('#delete-form');

    delete_form.on('submit', function(){
        return confirm('Are you sure?');
    });

}(jQuery));