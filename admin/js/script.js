jQuery(document).ready(function(){

    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
    console.error( error );
    } );

});

jQuery(document).ready(function(){
    jQuery('#selectAllBoxes').click(function(event){
        if (this.checked) {
            jQuery('.checkBoxes').each(function(){
                this.checked = true;
            });
        } else {
            jQuery('.checkBoxes').each(function(){
                this.checked = false;
            });
        }
    });
});