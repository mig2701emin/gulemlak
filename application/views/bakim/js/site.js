$(document).ready(function(){
    console.log("ready");

    $(document).ajaxStart(function() {
        $('.loadingDiv').show();
    });
    $(document).ajaxStop(function() {
        $('.loadingDiv').hide();
    });

    $("#kurumkaydet").click(function(){
        var url = $("#kurumukaydet").val();
        var veri = $("#kurum").serialize();
        var paketurl = $("#paketurl").val();
        $("#kurumkaydet").html('<i class="fa fa-spinner fa-spin"></i>  Lütfen Bekleyiniz...');

        $.ajax({
            type : "post",
            url : url,
            data : veri,
            cache : false,
            success :
                function(sonuc){
                    if(sonuc==="1"){
                        $("#kurum").hide();
                        $(".modal-footer").hide();
                        $("#mesaj").show();
                        $("#mesaj").html("Kayıt İşlemi Gerçekleşti! İlginiz için teşekkür ederiz...");
                        /*$(location).href(paketurl);*/
                        window.location.href = paketurl;
                    }else{
                        $("#mesaj").show();
                        $("#mesaj").html(sonuc);
                        $("#kurumkaydet").html('<i class="fa fa-save"></i>  Kurum Kaydet');
                    }
                    $('html, body').animate({scrollTop : 0},800);
                }
        });
    });
	$(".lnk").click(function(){
		$href = $(this).attr("shref");
		window.location.href = $href;
	});
    $("#il").change(function(){
        var uri = $("#ilurl").val();

        $.ajax({
            type : "post",
            url : uri,
            data : {
                il : $('#il option:selected').val()
            },
            cache : false,
            success :
                function(sonuc){
                    $("#ilce").html("");
                    $sonuc = $.parseJSON(sonuc);
                    $.each($sonuc,function(i,item){
                        $("#ilce").append('<option value="'+item.ilce_id+'">'+item.ilce_ad+'</option>');
                    });
                }
        });
    });


    $(".refresh").click(function(){
        console.log($("#ccaptcha").val());
        $.ajax({
            type : "get",
            url : $("#ccaptcha").val(),
            success :
                function(sonuc){
                    $(".captcha").html(sonuc);
                }
        })
    });
    $('.videoloading')
        .ajaxStart(function() {
            $(this).show();
        })
        .ajaxStop(function() {
            $(this).hide();
        });
    $(".videoizle").click(function(){
        var url = $(this).attr("video");
        $(".tv").html("");
        $(".tv").html('<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+url+'" frameborder="0" allowfullscreen width="100%" height="320"></iframe>');
    });

    $(".cikisyap").click(function(){
        $.ajax({
            type : "get",
            url : $("#cikisyap").val(),
            success :
                function(sonuc){
                    location.reload();
                    console.log(sonuc);
                }
        })
    });
    $("#gonder").click(function(){
        var url = $("#formurl").val();
        var veri = $("#dinamikform").serialize();
        $text = $("#gonder").html();

        $("#gonder").html('<i class="fa fa-spinner fa-spin"></i>  Lütfen Bekleyiniz...');

        $.ajax({
            type : "post",
            url : url,
            data : veri,
            cache : false,
            success :
                function(sonuc){
                    if(sonuc==="1"){
                        $("#dinamikform").hide();
                        $("#formmesaj").show();
                        $("#formmesaj").html("Formunuz Gönderildi! İlginiz için teşekkür ederiz...");
                    }else{
                        $("#formmesaj").show();
                        $("#formmesaj").html(sonuc);
                        $("#gonder").html($text);
                    }
                   /* console.log(sonuc); */
                   $('html, body').animate({scrollTop:$('#formmesaj').position().top}, 'slow');
                }
        });
    });

    $(window).load(function(){
      $(".loader-holder").fadeOut(500, function() {
          $("#main").animate({
              opacity: "1"
          }, 500);
      });
    });

    $(function(){

        $(document).on( 'scroll', function(){

            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });
    });

    $(function(){

        $(document).on( 'scroll', function(){

            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });

        $('.scroll-top-wrapper').on('click', scrollToTop);
    });

    function scrollToTop() {
        verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $('body');
        offset = element.offset();
        offsetTop = offset.top;
        $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
    }

    $('.IcBgPad2 img').replaceWith(function(){
        var src = $(this).attr("src");
        var figure = '<center><a href="'+src+'" class="fancybox"><img src="'+src+'" class="img-responsive"></a></center>';
        return $(figure);
    });

    $(".languages").click(function(){

        $dil = $(this).attr("param");
        $url = $(".dilsec").val();
        console.log($dil);
        console.log($url);

        $.ajax({
            url : $url,
            type : "post",
            data : {
                lang : $dil
            },
            success:function(sonuc){
                console.log(sonuc);
                location.reload();
            }
        });
    });
/*
    $(".girisyap").click(function(){
        $url = $("#girisyap").val();
        $veri = $("#girisForm").serialize();
        $text = $(this).html();
        $(this).html("Lütfen bekleyiniz...");

        $.ajax({
            url  : $url,
            type : "post",
            data : $veri,
            cache : false,
            success : function(sonuc){
                if(sonuc==="1"){
                    $("#girisForm").fadeOut(300);
                    window.location.href = $("#dashboard").val();
                }else{
                    $(".girisAlert").fadeIn(300);
                    $(".girisAlert").html(sonuc);
                }
                $(".girisyap").html($text);
            }

        });
    });
*/
    $(".formgoster").click(function(){
       $(".formum").fadeIn(300);
        $(".formgoster").hide();
    });


    $(function() {
            $path = $(".uploadpath").val();
            $('.upload_btn').uploadify({
                'debug'   : false,

                'swf'   : $(".swf").val(),
                'uploader'  : $(".uploader").val(),
                'cancelImage' : $(".cancel"),
                'queueID'  : 'file-queue',
                'buttonClass'  : 'button',
                'buttonText' : "Dosya Seçiniz",
                'multi'   : false,
                'auto'   : true,

                'fileTypeExts' : '*.jpg; *.png; *.gif; *.PNG; *.JPG; *.GIF; *.doc; *.DOC; *.pdf; *.PDF;',
                'fileTypeDesc' : 'Image Files',

                'method'  : 'post',
                'fileObjName' : 'userfile',

                'queueSizeLimit': 40,
                'simUploadLimit': 2,
                'sizeLimit'  : 10240000,
                /*'onUploadSuccess' : function(file, data, response) {
                 alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
                 },*/
                'onUploadComplete' : function(file) {
                    $(".userfile").val($path+file.name);
                alert('"' +file.name + '" dosyanız yüklendi!');
            },
            'onQueueFull': function(event, queueSizeLimit) {
                alert("Please don't put anymore files in me! You can upload " + queueSizeLimit + " files at once");
                return false;
            }
        });
    });

    $(".proje").change(function(){
       $("form").submit();
    });

    $(".makina").change(function(){
       $("form").submit();
    });

    $(".sifirla").click(function(){
        $param = $(this).attr("param");
        $url = $(".sesdes").val();

        $.ajax({
            url : $url,
            type : "post",
            data : {
                param : $param
            },
            cache : false,
            success : function(){
                window.location.href = $(".projeurl").val();
            }
        });
    });

    $(".icerikgetir").on("click",function(){
        $url = $("#dataLoad").val();
        $kategori = $(this).attr("kategori");
        $start = $(this).attr("start");
        $url = $url+"/"+$kategori+"/"+$start;
        $.ajax({
            url : $url,
            type : "get",
            success : function(sonuc){
                if(sonuc!=="0"){
                    $pp = parseInt($("#PP").val()) + parseInt($start);
                    $(".icerikgetir").attr("start",$pp);
                    $.each(sonuc, function(i, item) {

                        $('mores').append(
                            '<div id="append">'+
                                '<div class="h1div text-center HikayeSolla">'+
                                    '<span class="font4 HikayeYaziTirnak"><img src="/assets/frontend/images/icon/t_ilk.png" width="17" height="25" style="vertical-align:bottom"></span>'+
                                    '<span class="font2">'+item.haber_icerik+'</span>'+
                                    '<span class="font6 HikayeYaziTirnak"><img src="/assets/frontend/images/icon/t_son.png" width="17" height="25" style="vertical-align:bottom"></span>'+
                                    '<br><br>'+
                                    '<span class="HikayeIsim font2">'+item.title+'</span>'+
                                '</div>'+
                            '</div>'
                        );

                    });

                }else{
                    $(".icerikgetir").fadeOut(200);
                }
            }
        });
    });

    function processAjaxData(urlPath){
      window.history.pushState(null,"", $('#dealersLink').val() + urlPath);
    }

    $("#map svg path text").click(
      function() {
        console.log("hiii"+$(this));
        var id=$(this).attr("id");

        $.ajax({
            type : "post",
            url : $(".bayi-url").val(),
            data : {
                seo : id
            },
            cache : false,
            success : function($sonuc){
                $(".bayiler").show();
                $('html, body').animate({scrollTop:$('.bayiler').position().top}, 'slow');
                //console.log($sonuc);
                $sonuc = $.parseJSON($sonuc);
                alert($sonuc);
                $(".tbdy").html("");
                $.each($sonuc,function(i,item){
                    $(".tbdy").append(
                        '<tr>'+
                            '<td>'+item.bayi_adi+'</td>'+
                            '<td>'+item.bayi_telefon+'</td>'+
                            '<td>'+item.IlAdi+'</td>'+
                            '<td>'+item.IlceAdi+'</td>'+
                            '<td>'+item.bayi_adres+'</td>'+
                        '</tr>');
                });
            },
            error : function(x,y,z){
                console.log(x);
                console.log(y);
                console.log(z);
            }
        });
    });
    $("#map svg path").click(
      function() {
        console.log(" hgiiii #map svg path");
        var id=$(this).attr("id");

        processAjaxData($(this).find('title').html());

        $.ajax({
            type : "post",
            url : $(".bayi-url").val(),
            data : {
                seo : id
            },
            cache : false,
            success : function($sonuc){

                if($sonuc.length>2){
                $(".bayiler").show();
                $('html, body').animate({scrollTop:$('.bayiler').position().top}, 'slow');
                //console.log($sonuc);
                $sonuc = $.parseJSON($sonuc);
                $(".tbdy").html("");
                $.each($sonuc,function(i,item){
                    $(".tbdy").append(
                        '<tr class="tr">'+
                            '<td>'+item.bayi_adi+'</td>'+
                            '<td>'+item.bayi_telefon+'</td>'+
                            '<td>'+item.IlAdi+'</td>'+
                            '<td>'+item.IlceAdi+'</td>'+
                            '<td>'+item.bayi_adres+'</td>'+
                        '</tr>');
                });
            }
            else{
                $(".bayiler").hide();
            }},
            error : function(x,y,z){
                console.log(x);
                console.log(y);
                console.log(z);
            }
        });
    });


     $(".bayiler").on("keyup",".bayisearch", function() {
        //console.log($(this));
        var like = $(this).val();
        console.log(like);
        $.ajax({
            type : "post",
            url : $(".bayi-url").val(),
            data : {
                like : like
            },
            cache : false,
            success : function($sonuc){
                $(".bayiler").show();
                $('html, body').animate({scrollTop:$('.bayiler').position().top}, 'slow');
                //console.log($sonuc);
                $sonuc = $.parseJSON($sonuc);
                $(".tbdy").html("");
                $.each($sonuc,function(i,item){
                    $(".tbdy").append(
                        '<tr class="tr">'+
                            '<td>'+item.bayi_adi+'</td>'+
                            '<td>'+item.bayi_telefon+'</td>'+
                            '<td>'+item.IlAdi+'</td>'+
                            '<td>'+item.IlceAdi+'</td>'+
                            '<td>'+item.bayi_adres+'</td>'+
                        '</tr>');
                });
            },
            error : function(x,y,z){
                console.log(x);
                console.log(y);
                console.log(z);
            }
        });
    });

    $("#map svg path").hover(function() {
        var id=$(this).attr("id"),t=Math.ceil($(this).position().top)-70,l=Math.ceil($(this).position().left)+125;
        $("#sehir").text(id);
        $(".tooltip").finish().css({"left":l+"px","top":t+"px"}).text(id).show(100);
        $(".tooltip").text(id);
        $(".tooltip").tooltip();
     },function(){
        $(".tooltip").hide(300)
     });

     if($('#activeProvince').length > 0) {

       $("#sehir").text($('#activeProvince').val());
       $('path#' + $('#activeProvince').val()).trigger('click');

     }

    $('.dataTable').dataTable({
            "searching": false,
            "bSort" : false,
            "language":{
                    "sProcessing":   "İşleniyor...",
                    "sLengthMenu":   "Sayfada _MENU_ Kayıt Göster",
                    "sLengthMenu": "",
                    "sZeroRecords":  "Eşleşen Kayıt Bulunmadı",
                    "sInfo":         "  _TOTAL_ Kayıttan _START_ - _END_ Arası Kayıtlar",
                    "sInfo":         " ",
                    "sInfoEmpty":    "",
                    "sInfoFiltered": "( _MAX_ Kayıt İçerisinden Bulunan)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Ara : ",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "İlk",
                        "sPrevious": "Önceki",
                        "sNext":     "Sonraki",
                        "sLast":     "Son"
            }
        },
        "iDisplayLength": 8,
        "aLengthMenu": [[8, 10, 25, 50, -1], [8, 10, 25, 50, "Tümü"]]
    });

});

function myPopup(e){
    window.open(e);
}
function degeryaz(deger,alan){

        $(alan).val(deger);
    console.log(alan);
    console.log(deger);
        $("form").submit();

}
/**
 * Created by Birol on 30.06.2015.
 */
