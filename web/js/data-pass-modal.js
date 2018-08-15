$(document).ready(function(){
    $('.trainer-card').click(function(){        
        $('#usuario-id').val($(this).data('id'));
    });
});
