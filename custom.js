$('#form_submit').each(function(){
    var form = $(this);
    // form.validate();
    // var formWrapper1 = $('#form-wrapper');
    form.submit(function(e) {
        if (!e.isDefaultPrevented()) {
            // formWrapper1.fadeOut('fast', function() {
            //     $('#lottieAnime').removeClass('d-none');
            // });
            console.log("submited");
            jQuery.post('functions.php',{
                'full_name':$('#Textbox_14').val(),
                'email':$('#Email_16').val(),
                'area':$('#Select_15').val(),
                'phone':$('#Phone_17').val(),
                'loan':$('#Select_19').val(),
            },function(data){
                var dataArr = $.parseJSON(data);
                // if(dataArr["code"] == 200){
                //   $("#popup").addClass('popup');
                //   $(".popup__content").addClass('show-content');
                // //   fbq('track', 'AddToCart');
                // fbq('track', 'CompleteRegistration');
                //   console.log(dataArr["msg"]);
                // }else {
                //   console.log("registring product failed");
                // }
            });
            e.preventDefault();
        }
    });
})