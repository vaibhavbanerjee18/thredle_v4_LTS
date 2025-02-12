$(document).ready(function(){

  $('#btn_blouse_front').click(function(){
    $('#list_blouse_front').removeClass('active active_tab1');
    $('#list_blouse_front').removeAttr('href data-toggle');
    $('#blouse_front').removeClass('active');
    $('#list_blouse_front').addClass('inactive_tab1');
    $('#list_blouse_back').removeClass('inactive_tab1');
    $('#list_blouse_back').addClass('active_tab1 active');
    $('#list_blouse_back').attr('href', '#blouse_back');
    $('#list_blouse_back').attr('data-toggle', 'tab');
    $('#blouse_back').addClass('active in');
  });

  $('#previous_btn_blouse_back').click(function(){
    $('#list_blouse_back').removeClass('active active_tab1');
    $('#list_blouse_back').removeAttr('href data-toggle');
    $('#blouse_back').removeClass('active in');
    $('#list_blouse_back').addClass('inactive_tab1');
    $('#list_blouse_front').removeClass('inactive_tab1');
    $('#list_blouse_front').addClass('active_tab1 active');
    $('#list_blouse_front').attr('href', '#blouse_front');
    $('#list_blouse_front').attr('data-toggle', 'tab');
    $('#blouse_front').addClass('active in');
   });


   $('#btn_blouse_back').click(function(){
    $('#list_blouse_back').removeClass('active active_tab1');
    $('#list_blouse_back').removeAttr('href data-toggle');
    $('#blouse_back').removeClass('active');
    $('#list_blouse_back').addClass('inactive_tab1');
    $('#list_blouse_sleeves').removeClass('inactive_tab1');
    $('#list_blouse_sleeves').addClass('active_tab1 active');
    $('#list_blouse_sleeves').attr('href', '#blouse_sleeves');
    $('#list_blouse_sleeves').attr('data-toggle', 'tab');
    $('#blouse_sleeves').addClass('active in');
  });

  $('#previous_btn_blouse_sleeves').click(function(){
    $('#list_blouse_sleeves').removeClass('active active_tab1');
    $('#list_blouse_sleeves').removeAttr('href data-toggle');
    $('#blouse_sleeves').removeClass('active in');
    $('#list_blouse_sleeves').addClass('inactive_tab1');
    $('#list_blouse_back').removeClass('inactive_tab1');
    $('#list_blouse_back').addClass('active_tab1 active');
    $('#list_blouse_back').attr('href', '#blouse_back');
    $('#list_blouse_back').attr('data-toggle', 'tab');
    $('#blouse_back').addClass('active in');
   });


   $('#btn_blouse_sleeves').click(function(){
    $('#list_blouse_sleeves').removeClass('active active_tab1');
    $('#list_blouse_sleeves').removeAttr('href data-toggle');
    $('#blouse_sleeves').removeClass('active');
    $('#list_blouse_sleeves').addClass('inactive_tab1');
    $('#list_blouse_fastening').removeClass('inactive_tab1');
    $('#list_blouse_fastening').addClass('active_tab1 active');
    $('#list_blouse_fastening').attr('href', '#blouse_fastening');
    $('#list_blouse_fastening').attr('data-toggle', 'tab');
    $('#blouse_fastening').addClass('active in');
  });

  $('#previous_btn_blouse_fastening').click(function(){
    $('#list_blouse_fastening').removeClass('active active_tab1');
    $('#list_blouse_fastening').removeAttr('href data-toggle');
    $('#blouse_fastening').removeClass('active in');
    $('#list_blouse_fastening').addClass('inactive_tab1');
    $('#list_blouse_sleeves').removeClass('inactive_tab1');
    $('#list_blouse_sleeves').addClass('active_tab1 active');
    $('#list_blouse_sleeves').attr('href', '#blouse_sleeves');
    $('#list_blouse_sleeves').attr('data-toggle', 'tab');
    $('#blouse_sleeves').addClass('active in');
   });


   $('#btn_blouse_fastening').click(function(){
    $('#list_blouse_fastening').removeClass('active active_tab1');
    $('#list_blouse_fastening').removeAttr('href data-toggle');
    $('#blouse_fastening').removeClass('active');
    $('#list_blouse_fastening').addClass('inactive_tab1');
    $('#list_blouse_addons').removeClass('inactive_tab1');
    $('#list_blouse_addons').addClass('active_tab1 active');
    $('#list_blouse_addons').attr('href', '#blouse_addons');
    $('#list_blouse_addons').attr('data-toggle', 'tab');
    $('#blouse_addons').addClass('active in');
  });

  $('#previous_btn_blouse_addons').click(function(){
    $('#list_blouse_addons').removeClass('active active_tab1');
    $('#list_blouse_addons').removeAttr('href data-toggle');
    $('#blouse_addons').removeClass('active in');
    $('#list_blouse_addons').addClass('inactive_tab1');
    $('#list_blouse_fastening').removeClass('inactive_tab1');
    $('#list_blouse_fastening').addClass('active_tab1 active');
    $('#list_blouse_fastening').attr('href', '#blouse_fastening');
    $('#list_blouse_fastening').attr('data-toggle', 'tab');
    $('#blouse_fastening').addClass('active in');
   });


   $('#btn_blouse_addons').click(function(){
    $('#list_blouse_addons').removeClass('active active_tab1');
    $('#list_blouse_addons').removeAttr('href data-toggle');
    $('#blouse_addons').removeClass('active');
    $('#list_blouse_addons').addClass('inactive_tab1');
    $('#list_your_details').removeClass('inactive_tab1');
    $('#list_your_details').addClass('active_tab1 active');
    $('#list_your_details').attr('href', '#your_details');
    $('#list_your_details').attr('data-toggle', 'tab');
    $('#your_details').addClass('active in');
  });

  $('#previous_btn_your_details').click(function(){
    $('#list_your_details').removeClass('active active_tab1');
    $('#list_your_details').removeAttr('href data-toggle');
    $('#your_details').removeClass('active in');
    $('#list_your_details').addClass('inactive_tab1');
    $('#list_blouse_addons').removeClass('inactive_tab1');
    $('#list_blouse_addons').addClass('active_tab1 active');
    $('#list_blouse_addons').attr('href', '#blouse_addons');
    $('#list_blouse_addons').attr('data-toggle', 'tab');
    $('#blouse_addons').addClass('active in');
   });
                

     $('#btn_personal_details').click(function(){
      var error_name = '';
      if($.trim($('#name').val()).length == 0)
      {
       error_name = 'First Name is required';
       $('#error_name').text(error_first_name);
       $('#name').addClass('has-error');
      }
      else
      {
       error_first_name = '';
       $('#error_name').text(error_first_name);
       $('#name').removeClass('has-error');
      }

      if($.trim($('#last_name').val()).length == 0)
      {
       error_last_name = 'Last Name is required';
       $('#error_last_name').text(error_last_name);
       $('#last_name').addClass('has-error');
      }
      else
      {
       error_last_name = '';
       $('#error_last_name').text(error_last_name);
       $('#last_name').removeClass('has-error');
                }

      if(error_first_name != '' || error_last_name != '')
      {
       return false;
      }
      else
      {
       $('#list_personal_details').removeClass('active active_tab1');
       $('#list_personal_details').removeAttr('href data-toggle');
       $('#personal_details').removeClass('active');
       $('#list_personal_details').addClass('inactive_tab1');
       $('#list_contact_details').removeClass('inactive_tab1');
       $('#list_contact_details').addClass('active_tab1 active');
       $('#list_contact_details').attr('href', '#contact_details');
       $('#list_contact_details').attr('data-toggle', 'tab');
       $('#contact_details').addClass('active in');
      }
     });            

     $('#previous_btn_contact_details').click(function(){
      $('#list_contact_details').removeClass('active active_tab1');
      $('#list_contact_details').removeAttr('href data-toggle');
      $('#contact_details').removeClass('active in');
      $('#list_contact_details').addClass('inactive_tab1');
      $('#list_personal_details').removeClass('inactive_tab1');
      $('#list_personal_details').addClass('active_tab1 active');
      $('#list_personal_details').attr('href', '#personal_details');
      $('#list_personal_details').attr('data-toggle', 'tab');
      $('#personal_details').addClass('active in');
     });            

     $('#btn_your_details').click(function(){

      var error_email = '';
      var error_name = '';
      var error_address = '';
      var error_mobile_no = '';
      var error_land_mark  = '';
      var error_pin_code = '';
      
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      if($.trim($('#email').val()).length == 0)
      {
        error_email = 'Email is required';
        $('#error_email').text(error_email);
        $('#email').addClass('has-error');
      }
      else
      {
       if (!filter.test($('#email').val()))
       {
        error_email = 'Invalid Email';
        $('#error_email').text(error_email);
        $('#email').addClass('has-error');
       }
       else
       {
        error_email = '';
        $('#error_email').text(error_email);
        $('#email').removeClass('has-error');
       }
      }

      if($.trim($('#name').val()).length == 0)
      {
       error_name = 'First Name is required';
       $('#error_name').text(error_name);
       $('#name').addClass('has-error');
      }
      else
      {
       error_name = '';
       $('#error_name').text(error_name);
       $('#name').removeClass('has-error');
      }

      var mobile_validation = /^\d{10}$/;
      if($.trim($('#address').val()).length == 0)
      {
       error_address = 'Address is required';
       $('#error_address').text(error_address);
       $('#address').addClass('has-error');
      }
      else
      {
       error_address = '';
       $('#error_address').text(error_address);
       $('#address').removeClass('has-error');
      }

      if($.trim($('#mobile_no').val()).length == 0)
      {
       error_mobile_no = 'Mobile Number is required';
       $('#error_mobile_no').text(error_mobile_no);
       $('#mobile_no').addClass('has-error');
      }
      else
      {
       if (!mobile_validation.test($('#mobile_no').val()))
       {
        error_mobile_no = 'Invalid Mobile Number';
        $('#error_mobile_no').text(error_mobile_no);
        $('#mobile_no').addClass('has-error');
       }
       else
       {
        error_mobile_no = '';
        $('#error_mobile_no').text(error_mobile_no);
        $('#mobile_no').removeClass('has-error');
       }
      }

      if($.trim($('#land_mark').val()).length == 0)
      {
       error_land_mark = 'Land Mark is required';
       $('#error_land_mark').text(error_land_mark);
       $('#land_mark').addClass('has-error');
      }
      else
      {
       error_land_mark = '';
       $('#error_land_mark').text(error_land_mark);
       $('#land_mark').removeClass('has-error');
      }

      if($.trim($('#pin_code').val()).length == 0)
      {
       error_pin_code = 'Pin Code is required';
       $('#error_pin_code').text(error_pin_code);
       $('#pin_code').addClass('has-error');
      }
      else
      {
       error_pin_code = '';
       $('#error_pin_code').text(error_pin_code);
       $('#pin_code').removeClass('has-error');
      }


      if(error_address != '' || error_mobile_no != '')
      {
       return false;
      }
      else
      {
       $('#btn_contact_details').attr("disabled", "disabled");
       $(document).css('cursor', 'prgress');
       $("#register_form").submit();
      }

     });            

    });