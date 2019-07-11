$(window).ready(function(){
    var url = document.head.querySelector('meta[name="url"]').content;
    var token = document.head.querySelector('meta[name="token"]').content;
    var usertype = $("#seller").is(":checked");
    if(usertype){
        $("#register-form4").css("display","block");
        $("#register-form5").css("display","none");
        }
    else{
         $("#register-form4").css("display","none");
        $("#register-form5").css("display","block");
    }
    $("body").on("click","#seller,#buyer",function (){
         var usertype = $("#seller").is(":checked");
    if(usertype){
        $("#register-form4").css("display","block");
        $("#register-form5").css("display","none");
        }
    else{
         $("#register-form4").css("display","none");
        $("#register-form5").css("display","block");
    }
    });
    
    var countextra = 0;
    $("body").on("click",".add_service_related",function (e){
        e.preventDefault();
        countextra++;
        if(countextra <= 5){
             $(".service_related_section").prepend('<div class="service_related_item"><div class="close-btn"><!-- SVG PLUS --><svg class="svg-plus"><use xlink:href="#svg-plus"></use></svg><!-- /SVG PLUS --></div><div class="input-container triple"><label for="extraname'+countextra+'" class="rl-label required">Name</label><input type="text" id="extraname'+countextra+'" name="extraname[]" required class="nomarginbottom"></div><div class="input-container triple"><label for="extraprice'+countextra+'" class="rl-label required">Price</label><input type="number" id="extraprice'+countextra+'" required name="extraprice[]"  class="nomarginbottom"></div><div class="input-container triple"><label for="extradesc'+countextra+'" class="rl-label required">Description</label><input type="text" required id="extradesc'+countextra+'" name="extradesc[]"  class="nomarginbottom"></div><div class="clear"></div></div>');
        }
       
    });
    $("body").on("click",".close-btn",function (){
        $(this).parent().remove();
    });
    $("#seller_terms").click(function (){
        if($(this).is(':checked')){
            $("#sellerbtn").removeAttr('disabled');
        }
        else{
             $("#sellerbtn").attr('disabled','disabled');
        }
        
    });
    $("#buyer_terms").click(function (){
        if($(this).is(':checked')){
            $("#buyerbtn").removeAttr('disabled');
        }
        else{
             $("#buyerbtn").attr('disabled','disabled');
        }
        
    });
    $("#seller_add_service_Category").change(function (){
        
        var catid = $(this).val();
        var serialized = "_token="+token+"&catid="+catid;
        $.ajax({
             url : url+'/get/subcats',
             method : 'POST',
             data : serialized,
             dataType : 'json',
             beforeSend:function (){
             $('.loaders').css('display','flex');
            },
             success : function (e){
              if(e.success){
                  var subcats = '<option value="0" disabled selected>Select Category...</option>';
                  for(var i = 0 ; i < e.success.length;i++){
                      subcats += '<option value="'+e.success[i].id+'">'+e.success[i].name+'</option>'
                     
                  }
                  $("#seller_add_service_Sub_Category").html(subcats);
                  $('.loaders').css('display','none');
              }
             },
             error: function (request, status, error) {
                console.log(request);
                console.log(status);
                console.log(error);
            }
         });
        
    });
    $(".add_attachment a").click(function(e){
        e.preventDefault();
        $(this).siblings('input').click();
    });
    var filelimit = 0;
    $(".add_extra_file").click(function(e){
           e.preventDefault();
        filelimit++
        if(filelimit <=5){
            $(".attaches_container").append(' <div class="add_attachment"> <input type="file" name="attachment[]" required> </div>');
        }
        else{
            alert("Sorry You Reached Fils Lmimit : 6 files");
        }
        
    });
    $('.seller_add_service').submit(function(){
        $('.loaders').css('display','flex');
    });
    $('#profile-info-form3').submit(function(){
        $('.loaders').css('display','flex');
    });
    $('#profile-info-form2').submit(function(){
        $('.loaders').css('display','flex');
    });
    $('#profile-info-form').submit(function(){
        $('.loaders').css('display','flex');
    });
    
    $("#userimagebtn").click(function (e){
         e.preventDefault();
        $("#userimage").click();
    });
    $("#userimage").change(function (){
                var reader = new FileReader();
            reader.onload = function(){
              var dataURL = reader.result;
              var output = document.getElementById('output');
              output.src = dataURL;
            };
            reader.readAsDataURL(document.getElementById("userimage").files[0]);
 
    });
     $("#seller_username").keyup(function (){
          var username = $(this).val();
          var serialized = "_token="+token+"&username="+username;
        $.ajax({
             url : url+'/seller/check/username',
             method : 'POST',
             data : serialized,
             dataType : 'json',
             beforeSend:function (){
          
            },
             success : function (e){
              if(e.success == 'true'){
                  $('.wrongimage').css('display','none');
                  $('.trueimage').css('display','block');
              }
                else{
                  $('.wrongimage').css('display','block');
                  $('.trueimage').css('display','none');
                } 
                
             },
             error: function (request, status, error) {
                console.log(request);
                console.log(status);
                console.log(error);
            }
         });
    });
    
    $("#profile_seller_pass_current").keyup(function (){
          var currentpassword = $(this).val();
          var serialized = "_token="+token+"&currentpassword="+currentpassword;
        $.ajax({
             url : url+'/seller/check/passwords/new',
             method : 'POST',
             data : serialized,
             dataType : 'json',
             beforeSend:function (){
          
            },
             success : function (e){
              if(e.success == 'true'){
                  $('.wrongimage_current_pass').css('display','none');
                  $('.trueimage_current_pass').css('display','block');
              }
                else{
                  $('.wrongimage_current_pass').css('display','block');
                  $('.trueimage_current_pass').css('display','none');
                } 
                
             },
             error: function (request, status, error) {
                console.log(request);
                console.log(status);
                console.log(error);
            }
         });
    });
    $('#profile_seller_pass_new').keyup(function (){
        if($(this).val().length < 8){
            $('.wrongimage_new_pass').css('display','block');
            $('.trueimage_current_pass').css('display','none');
        }
        else{
            $('.wrongimage_new_pass').css('display','none');
            $('.trueimage_new_pass').css('display','block');
        }
    });
       $('#profile_seller_pass_new_re').keyup(function (){
        if($(this).val() != $('#profile_seller_pass_new').val()){
            $('.wrongimage_new_pass_repeat').css('display','block');
            $('.trueimage_new_pass_repeat').css('display','none');
        }
        else{
            $('.wrongimage_new_pass_repeat').css('display','none');
            $('.trueimage_new_pass_repeat').css('display','block');
        }
    });
    $("#seller_add_service_Sub_Category").change(function (){
           var sub_catid = $(this).val();
        var serialized = "_token="+token+"&sub_catid="+sub_catid;
        $.ajax({
             url : url+'/get/subsubcats',
             method : 'POST',
             data : serialized,
             dataType : 'json',
             beforeSend:function (){
             $('.loaders').css('display','flex');
            },
             success : function (e){
              if(e.success){
                  var subcats = '<option value="0" disabled selected>Select Sub Category...</option>';
                  for(var i = 0 ; i < e.success.length;i++){
                      subcats += '<option value="'+e.success[i].id+'">'+e.success[i].name+'</option>'
                     
                  }
                  $("#seller_add_service_Sub_Sub_Category").html(subcats);
                  $('.loaders').css('display','none');
              }
             },
             error: function (request, status, error) {
                console.log(request);
                console.log(status);
                console.log(error);
            }
         });
    });
      $("#seller_add_service_Sub_Sub_Category").change(function (){
           var sub_sub_catid = $(this).val();
        var serialized = "_token="+token+"&sub_sub_catid="+sub_sub_catid;
        $.ajax({
             url : url+'/get/subsubsubcats',
             method : 'POST',
             data : serialized,
             dataType : 'json',
             beforeSend:function (){
             $('.loaders').css('display','flex');
            },
             success : function (e){
              if(e.success){
                  var subcats = '<option value="0" disabled selected>Select Clasification...</option>';
                  for(var i = 0 ; i < e.success.length;i++){
                      subcats += '<option value="'+e.success[i].id+'">'+e.success[i].name+'</option>'
                     
                  }
                  $("#seller_add_service_Sub_Sub_Sub_Category").html(subcats);
                  $('.loaders').css('display','none');
              }
             },     
             error: function (request, status, error) {
                console.log(request);
                console.log(status);
                console.log(error);
            }
         });
    });
    
});