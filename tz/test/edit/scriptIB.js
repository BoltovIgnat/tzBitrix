$(document).ready(function(){ 
    $('.updateNewsForm').submit(function(e) {
        
        var form = $(this);
        $.ajax({
            type: "POST",
            url: "/test/ajax/ajax.php",
            data: 'name='+$('.updateNewsForm')[0][0].value+'&description='+$('.updateNewsForm')[0][1].value+'&id='+form.attr('id')
        }).done(function(data) {
            console.log('success'+data);
        }).fail(function() {
            console.log('fail');
        });
        //отмена действия по умолчанию для кнопки submit
        e.preventDefault(); 
    });
});
