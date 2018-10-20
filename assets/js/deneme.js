function yok(){
  alert("Mesaj gönderilmeniz için üye girişi yapmanız gerekmektedir")
}
function check_search_head(){
  if($("#head_search").val()!=""){
    $("#head_search").addClass("head_search_input_active")
  }else{
    $("#head_search").removeClass("head_search_input_active")
  }
}
function check_search_store(){
  if($("#store_search").val()!=""){
    $("#store_search").addClass("head_search_input_active")
  }else{
    $("#store_search").removeClass("head_search_input_active")
  }
}
function ilan_islemyap(e,d,f){
  if(e==1){
    window.location=d+"-duzenle.html"
  }else{
    if(e==2){
      window.location="index.php?page=dopingyap&id="+d
    }else{
      if(e==3){
        window.location="index.php?page=banaozel&type=ilan&submitAdCategory=1&CopyAd="+d
      }else{
        if(e==4){
          $("#ilan-sil").dialog({
            resizable:false,
            height:150
            ,modal:true
            ,buttons:{
              Evet:function(){
                window.location=d+"-sil.html?filter="+f
              },
              "Hayır":function(){
                $(this).dialog("close")
              }
            }
          })
        }else{
          if(e==5){
            window.location="index.php?page=banaozel&type=guncelim&ilan="+d+"&filter="+f
          }else{
            if(e==6){
              window.location="index.php?page=banaozel&type=ilan_pasiflestir&ilan="+d+"&filter="+f
            }else{
              if(e==7){
                window.location="index.php?page=banaozel&type=ilan_aktiflestir&ilan="+d+"&filter="+f
              }else{
                if(e==8){
                  window.location="index.php?page=banaozel&type=ilan_sureuzat&ilan="+d+"&filter="+f
                }
              }
            }
          }
        }
      }
    }
  }
}
function hikaye_paylas(){
  $("#hikaye_paylas").dialog({
    autoOpen:true,
    show:"blind",
    hide:"blind",
    width:"590",
    height:"540"
  })
}
function hikaye_islem(){
  $.ajax({
    type:"POST",
    url:"./hikaye_gonder.php",
    data:$("#hikaye_form").serialize(),
    success:function(a){
      $("#hikaye_durum").html(a)
    }
  })
}
function megafoto(){
  $("#megafoto").dialog({
    autoOpen:true,
    show:"blind",
    hide:"blind",
    width:"950",
    height:"570",
    modal:true,
    resizable:false
  })
}
function video(){
  $("#video").dialog({
    autoOpen:true,
    show:"blind",
    hide:"blind",
    width:"500",
    height:"405",
    modal:true,
    resizable:false
  })
}
function sikayet(){
  $("#sikayet").dialog({
    autoOpen:true,
    show:"blind",
    hide:"blind",
    width:"670",
    height:"615",
    resizable:false
  })
}
function arama_ck(){
  var a=[];
  a.length=0;
  $("#AdvancedSearchForm .category_fieldName").each(function(c){
    var b=$(this).next().css("display");
    a.push(b)
  });
  $.cookie("Field_ck",a,{expires:1})
}
function aramaGoster(c,a){
  var d=$("#field_"+c);
  var b=$("#field_i_"+c);
  if(d.css("display")=="none"){
    d.slideDown("normal",function(){
      arama_ck(a)
    });
    b.html('<img src="../../images/close_field.png" width="16" height="15" title="Gizle" alt="Gizle">')
  }else{
    b.html('<img src="../../images/open_field.png" width="16" height="15" title="Göster" alt="Göster">');
    d.slideUp("normal",function(){
      arama_ck(a)
    })
  }
}
function arama_ilce(a,b){
  $("option",$("#ilce")).remove();
  $("#ilce").append(new Option("Seçiniz","",true,true));
  $("option",$("#semt")).remove();
  $("#semt").append(new Option("Önce İlçe Seçiniz","",true,true));
  $("option",$("#mahalle")).remove();
  $("#mahalle").append(new Option("Önce Semt Seçiniz","",true,true));
  $.get("../../arama_ilce.php",{id:a,selected:b},function(c){
    $("#form_js").html(c)
  })
}
function arama_semt(b,a){
  $.get("../../arama_semt.php",{id:b,selected:a},function(c){
    $("#form_js").html(c)
  })
}
function arama_mahalle(a,b){
  $.get("../../arama_mahalle.php",{id:a,selected:b},function(c){
      $("#form_js").html(c)
  })
}
function select_check(b){
  var a=$("select[name='"+b+"'] option:selected");
  if(a.length>=2){
    $("select[name='"+b+"'] option[value='']").removeAttr("selected")
  }
}
function multiple_field_values(f,b,d,c,a,e){
  var g=($("select[name='"+f+"']")[0].selectedIndex)-1;
  $.post(e+"get_sub_fields.php",{
    fieldId:b,
    main_value:g,
    sub_field_name:d,
    selected:c,
    defaultValue:a
  }).done(function(h){
    $("#form_js").html(h)
  })
}
function toggle_rules(){
  var a=$("#ad_rules_list");
  if(a.css("display")=="none"){
    a.slideDown("slow")
  }else{
    a.slideUp("slow")
  }
}
function pay_now(a,b){
  $("#item_Id").val(a);$("#pay_now").dialog({
    modal:true,
    title:"Ödeme Yap",
    show:{effect:"blind",duration:1000},
    hide:{effect:"explode",duration:1000},
    width:"500",
    resizable:false
  });
  $("#pay_form").ajaxForm({
    target:"#pay_status"
  });
  if(b=="1"){
    $.post("call_paypal.php",{item_Id:a}).done(function(c){
      $("#paypal_form").html(c)
    })
  }
}
$(document).ready(function(){
  $(".toggle_div").click(function(){
    var a=$(this);
    var b=$("#"+a.attr("data-div"));
    if(b.css("display")=="none"){
      $(b).slideDown("slow");
      $(a).removeClass("open_div")
    }else{
      $(b).slideUp("slow");
      $(a).addClass("open_div")
    }
  });
  $("#AdvancedSearchForm .category_fieldName").each(function(a){
    if($.cookie("Field_ck")!=undefined){
      var b=$.cookie("Field_ck").split(",");
      var c=b[a];
      if(c=="none"){
        $(this).next().css("display","none");
        $(this).find("span").html('<img src="../../images/open_field.png" width="16" height="15" title="Gizle" alt="Gizle">')
      }else{
        $(this).next().css("display","block");
        $(this).find("span").html('<img src="../../images/close_field.png" width="16" height="15" title="Göster" alt="Göster">')
      }
    }
  });
  $().UItoTop({easingType:"easeInBack"});
  $(".mega_photos").click(function(){
    $("#megafoto_big").attr("src",$(this).attr("src"))
  });
  $("#backImg").click(function(){
    var a=$("#megafoto_big").attr("src");
    $(".mega_photos[src='"+a+"']").prev().click()
  });
  $("#nextImg").click(function(){
    var a=$("#megafoto_big").attr("src");
    $(".mega_photos[src='"+a+"']").next().click()
  });
  $(".doping_selectbox").change(function(){
    var b=$(this).val();
    var a=$(this).attr("name").replace("_price","").replace("dp","");
    if(b=="0.00"||b=="0"||b=="null"){
      $("#dp_"+a).attr("class","checkbox_style");
      $("#doping_"+a).attr("checked",false)
    }else{
      $("#dp_"+a).attr("class","checkbox_style_checked");
      $("#doping_"+a).attr("checked",true)
    }
  });
  $("#use_map_option").change(function(){
    if(this.checked){
      $("#use_map_overlay").fadeOut("slow")
    }else{
      $("#use_map_overlay").fadeIn("slow");
      $("#map_Val").val("");
      map.clearMarkers()
    }
  });
  check_search_head();
  check_search_store()
});
function codeAddress(a){
  geocoder.geocode({address:a},function(c,b){
    if(b==google.maps.GeocoderStatus.OK){
      map.fitBounds(c[0].geometry.viewport)
    }
  })
};
