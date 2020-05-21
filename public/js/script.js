$(function(){
    $('.save-product').on('click',function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var price = $('#'+id).val();



        $.post(
            '/products/' + id+ '/update',
            {
                price: price,
                _token: $('[name="_token"]').val()
            }
        ).done(function(data){

            $('.container').prepend('<div id="saved-price-notification"><div class="alert alert-success alert-dismissible fade in" role="alert">\n' +
                '      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>\n' +
                '      <strong>Цена успешно сохранена!</strong> .\n' +
                '    </div></div>');

            setTimeout(function(){
                $('#saved-price-notification').remove();
            },1000)

        });
    });
})