jQuery( document ).ready(function($) {
    
    var mediaUploader;

    $( '#upload-button' ).on('click', function(e) {

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a profile picture',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        });

        e.preventDefault();
        if( mediaUploader ){
            mediaUploader.open();
            return;
        }

        mediaUploader.on('select', function(){
            attachement = mediaUploader.state('selection').first().toJSON();
            $('#profile-picture').val(attachement.url);
        });

        mediaUploader.open();

    });

});