$(document).ready(function() {
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
            alert (result);
            var rid    = result.rid;
            alert(rid);
            var recs   = result.recs;
            //alert (data);
            $('#f2_fid_9').val(recs[0]);
            $('#f2_fid_10').val(recs[1]);
            $('#f2_fid_11').val(recs[2]);
        }
        });
    });
    function validateForm() {
        return true;
    }
    $("#qdbform").submit(function() {
        if (validateForm()) {
            var url = "./process.php"; // the script where you handle the form input.

            $.ajax({
               type: "POST",
               url: url,
               data: $("#qdbform").serialize(), // serializes the form's elements.
               success: function(data)
               {
                   alert(data); // show response from the php script.
               }
             });
        }


        return false; // avoid to execute the actual submit of the form.
    });
})

