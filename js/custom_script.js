$(document).ready(function() {
        $(".inputA").blur(function(){
            var error = false;
            $(".inputA").each(function() {
                //console.log('val::'+$(this).val());
                if($(this).val() == '') {
                    error = true;
                }
            });

            if (!error)  {
                jQuery("#part-b").css("display","block");
            }else{
                jQuery("#part-b").css("display","none");
            }
        });
        $( document ).ajaxStart(function() {
            $( "#loading" ).show();
        });
         $( document ).ajaxStop(function() {
            $( "#loading" ).hide();
        });
       $("#f2_fid_10").attr("readonly","true");
       $("#f2_fid_11").attr("readonly","true");
       $("#qdbform").validate({
        rules: {
            _fid_7: "required",
            _fid_8: "required",
            _fid_9: "required",
            _fid_10: "required",
            _fid_11: "required",
            _fid_12: "required",
             _fid_13: "required",
            _fid_14: "required",
            _fid_15: "required",
            _fid_16: "required",
            _fid_17: "required",
            _fid_18: "required",
            f2_fid_7: "required",
            f2_fid_8: "required"

        },
        // Specify the validation error messages
        messages: {
           _fid_7: "required",
            _fid_8: "required",
            _fid_9: "required",
            _fid_10: "required",
            _fid_11: "required",
            _fid_12: "required",
             _fid_13: "required",
            _fid_14: "required",
            _fid_15: "required",
            _fid_16: "required",
            _fid_17: "required",
            _fid_18: "required",
            f2_fid_7: "required",
            f2_fid_8: "required"

           /* cNumber: "Customer number is required",
            cContactName: "Contact name is required",
            cTele: {
                required: "Telephone is required",
                usfaxFormat: "Enter a valid phone number"
            },
            cEmail: "Please enter a valid email address",
            cFax: {
                required : "Fax is required",
                 usfaxFormat: "Enter a valid fax number"
            }            */
        },


        submitHandler: function(form) {
             $('.success').hide();
             $('.fail').hide();
          /* if($("#fileuploadError").val()!=0) {
            $( "#loading" ).show();
           }*/
            //form.submit();
               //  if (validateForm()) {
            var url = "./process.php"; // the script where you handle the form input.

            $.ajax({
               type: "POST",
               url: url,
               dataType: 'text',
               data: $("#qdbform").serialize(), // serializes the form's elements.
               success: function(data)
               {
                   //alert(data); // show response from the php script.
                   if (data == true) {
                    //alert ('succ')
                    $('.success').show();
                    $("#qdbform").hide();
                   } else {
                    $('.fail').show();
                   }
               }
             });
       // }
        }
    });


    var url = "./process.php";
    $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: {type:'getProduct'}, // serializes the form's elements.
        success: function(data)
        {
            //alert(data); // show response from the php script.
            var str = '<select name="f2_fid_8" id="prod-sel">';
            str =  str + '<option value=""> Select a product </option>';
            for(var i = 0; i < data.length; i++) {
                var obj = data[i];
                str =  str + '<option value="'+ obj.rid +'">'+obj.sku+'</option>';
            }
            str += '</select>';
            $('#rel-product').html(str);
        }
    });
    $(document).on('change',"#prod-sel", function(){
        var rid = this.value;
        $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: {type:'getProductDetails', rid:rid},
        success: function(data){
            var result = data.result;
            //alert (result);
            var rid    = result.rid;
            //alert(rid);
            var recs   = result.recs;
            //alert (data);
            $('#f2_fid_9').val(recs[0]);
            $('#f2_fid_10').val(recs[1]);
            $('#f2_fid_11').val(recs[2]);
        }
        });
    });
   /* function validateForm() {
        return true;
    }*/
    $("#qdbform").submit(function() {



        return false; // avoid to execute the actual submit of the form.
    });
})
