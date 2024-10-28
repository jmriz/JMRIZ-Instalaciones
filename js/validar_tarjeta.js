/* function valida(){


     function cardFormValidate(){
                var cardValid = 0;
      
                //Card validation
                $('#card_number').validateCreditCard(function(result) {
                    var cardType = (result.card_type == null)?'':result.card_type.name;
                    if(cardType == 'Visa'){
                        var backPosition = result.valid?'2px -163px, 260px -87px':'2px -163px, 260px -61px';
                    }else if(cardType == 'MasterCard'){
                        var backPosition = result.valid?'2px -247px, 260px -87px':'2px -247px, 260px -61px';
                    }else if(cardType == 'Maestro'){
                        var backPosition = result.valid?'2px -289px, 260px -87px':'2px -289px, 260px -61px';
                    }else if(cardType == 'Discover'){
                        var backPosition = result.valid?'2px -331px, 260px -87px':'2px -331px, 260px -61px';
                    }else if(cardType == 'Amex'){
                        var backPosition = result.valid?'2px -121px, 260px -87px':'2px -121px, 260px -61px';
                    }else{
                        var backPosition = result.valid?'2px -121px, 260px -87px':'2px -121px, 260px -61px';
                    }
                    $('#card_number').css("background-position", backPosition);
                    if(result.valid){
                        $("#card_type").val(cardType);
                        $("#card_number").removeClass('required');
                        cardValid = 1;
                    }else{
                        $("#card_type").val('');
                        $("#card_number").addClass('required');
                        cardValid = 0;
                    }
                });
      
                //Form validation
                var cardName = $("#name_on_card").val();
                var expMonth = $("#expiry_month").val();
                var expYear = $("#expiry_year").val();
                var cvv = $("#cvv").val();
                var regName = /^[a-z ,.'-]+$/i;
                var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
                var regYear = /^2016|2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
                var regCVV = /^[0-9]{3,3}$/;
                if (cardValid == 0) {
                    $("#card_number").addClass('required');
                    $("#card_number").focus();
                    return false;
                }else if (!regMonth.test(expMonth)) {
                    $("#card_number").removeClass('required');
                    $("#expiry_month").addClass('required');
                    $("#expiry_month").focus();
                    return false;
                }else if (!regYear.test(expYear)) {
                    $("#card_number").removeClass('required');
                    $("#expiry_month").removeClass('required');
                    $("#expiry_year").addClass('required');
                    $("#expiry_year").focus();
                    return false;
                }else if (!regCVV.test(cvv)) {
                    $("#card_number").removeClass('required');
                    $("#expiry_month").removeClass('required');
                    $("#expiry_year").removeClass('required');
                    $("#cvv").addClass('required');
                    $("#cvv").focus();
                    return false;
                }else if (!regName.test(cardName)) {
                    $("#card_number").removeClass('required');
                    $("#expiry_month").removeClass('required');
                    $("#expiry_year").removeClass('required');
                    $("#cvv").removeClass('required');
                    $("#name_on_card").addClass('required');
                    $("#name_on_card").focus();
                    return false;
                }else{
                    $("#card_number").removeClass('required');
                    $("#expiry_month").removeClass('required');
                    $("#expiry_year").removeClass('required');
                    $("#cvv").removeClass('required');
                    $("#name_on_card").removeClass('required');
                    $('#cardSubmitBtn').prop('disabled', false);  
                    return true;
                }
    }


            // Comprobando los números de la tarjeta 

            $(document).ready(function() {
                //Demo card numbers
                $('.card-payment .numbers li').wrapInner('<a href="javascript:void(0);"></a>').click(function(e) {
                    e.preventDefault();
                    $('.card-payment .numbers').slideUp(100);
                    cardFormValidate()
                    return $('#card_number').val($(this).text()).trigger('input');
                });
                $('body').click(function() {
                    return $('.card-payment .numbers').slideUp(100);
                });
                $('#sample-numbers-trigger').click(function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    return $('.card-payment .numbers').slideDown(100);
                });
    
                //Card form validation on input fields
                $('#paymentForm input[type=text]').on('keyup',function(){
                    cardFormValidate();
                });
            });
            

            //  La información de la tarjeta de crédito se enviará al archivo payment_process.php para procesar el pago utilizando AJAX. Se mostrará un mensaje basándonos en el estado del pago. 


            $(document).ready(function() {
                //Submit card form
                $("#cardSubmitBtn").on('click',function(){
                    if (cardFormValidate()) {
                        var formData = $('#paymentForm').serialize();
                        $.ajax({
                            type:'POST',
                            url:'proceso_pago.php',
                            dataType: "json",
                            data:formData,
                            beforeSend: function(){  
                                $("#cardSubmitBtn").val('Processing....');
                            },
                            success:function(data){
                                if (data.status == 1) {
                                    $('#paymentSection').slideUp('slow');
                                    $('#orderInfo').slideDown('slow');
                                    $('#orderInfo').html('<p>Order <span>#'+data.orderID+'</span> has been submitted successfully.</p>');
                                }else{
                                    $('#paymentSection').slideUp('slow');
                                    $('#orderInfo').slideDown('slow');
                                    $('#orderInfo').html('<p>Wrong card details given, please try again.</p>');
                                }
                            }
                        });
                    }
                });
            });

}

*/
   