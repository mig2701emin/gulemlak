
<!DOCTYPE html>

<html>

<head>



    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Ticaret Meclisi</title>


    <?php $this->load->view('layout/metas');?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>css/custom/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>css/font-awesome.min.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>css/custom/uyeol.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>css/style.css" />



    <script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
</head>
<body>

<div class="se-pre-con"></div>
<div class="main">

    <section class="testimonial py-5" id="testimonial">
        <div class="container">

            <div class="row">

                <div class="col-12">
                    <div class="menu"><a href="#">iletişim</a></div>
                    <div class="menu"><a href="#">Destek</a></div>
                    <div class="menu"><a href="<?php echo base_url(); ?>">Anasayfa</a></div>
                </div><div class="col-md-8 py-5 border">
                    <h4 class="pb-4">Hemen Kayıt Ol</h4>
                    <?php if(validation_errors()){ ?>
                        <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                    <?php } ?>
                    <form method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input id="firtname" name="name" value="<?php echo set_value('name'); ?>" placeholder="Ad" class="form-control" type="text" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="surname" value="<?php echo set_value('surname'); ?>" class="form-control" id="lastname" placeholder="Soyad" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input id="eposta" name="email" value="<?php echo set_value('email'); ?>" placeholder="Eposta" class="form-control" type="email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="confirm_email" class="form-control" id="re_email" placeholder="Eposta Tekrar" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input id="Password1" name="password" value="<?php echo set_value('password'); ?>" placeholder="Şifre" class="form-control" required="required" type="password" aria-required="">
                            </div>
                            <div class="form-group col-md-6">
                                <input id="password2" name="repassword" value="<?php echo set_value('repassword'); ?>" placeholder="Şifre Tekrar" class="form-control" required="required" type="password">

                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <!-- Default unchecked -->
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="white" id="defaultUnchecked">
                                                <label class="custom-control-label" for="defaultUnchecked">Sözleşme Okudum ve kabul ediyorum</label>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-6" style="text-align:right">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn  btn-sm" data-toggle="modal" data-target="#myModal" style="color:#588585;background-color:transparent;">
                                    Üyelik Sözleşmesi
                                </button>
                            </div>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LdibXAUAAAAAKHsHSsa7SRfCIFS8Ax1M3PzjfDz"></div>
                        <div class="form-row">
                            <button type="submit" class="btn color_bg3 text-light" style="width:100%; ">Kaydet</button>
                        </div>

                    </form>





                    <div class="giris col-12">Eğer kayıtlı kullanıcı iseniz   <a href="<?php echo base_url(); ?>uyegiris">Giriş Yap</a></div>
                </div>
                <div class="col-md-4 py-5 text-white text-left" style=" background-image: linear-gradient(150deg, #3a5757 0%, #7faaaa 100%); background-repeat: repeat-x;" >

                    <div class="card-body" >

                        <h2 class="py-3">Ticaret Meclisi</h2>
                        <p>
                            Üye olun <strong>Ticaretmeclisi.com</strong>  ayrıcalıklı dünyasına sizde katılın.

                        </p>
                        <p>

                            Emlak,Vasıta,İş-Hizmet,Makine Her türlü iş sektörler ile ilgili hızlı bir şekilde ilan ver.
                            Ücretsiz ilan ekleyin.
                        </p>
                        <p>

                            Global iletişim dünyasında rakiplerinizin bir adım daha önüne geçin.
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </section>

</div>
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" style="overflow-y: scroll; max-height:500px; ">
                Modal kullanmak için ekranda onu aktif hale getirecek bir link, buton vs. kullanmamız gerekir. Pencere otomatik olarak ekrana gelmeyeceği için onu bir yapıyla aktif hale getirmeliyiz.
                Butona atadığımız data-toggle=”modal” ifadesi modal penceresinin açılmasını sağlar.
                data-target=”#myModal” ise hangi id değerine sahip modal’ı kullanacağımızı belirtir.
                Butonu oluşturduk ve artık sıra bu butona tıkladığımızda açılacak pencereyi oluşturmaya geldi. Burada daha önce atadığımız id değerini kullanıyoruz.

                Modal’ı oluşturan div elemanı butondakiyle aynı id değerine sahip olmalıdır.
                .modal sınıfı div elemanının içeriğinin modal olduğunu belirtir.
                fade sınıfı pencerenin açılıp kapanırken efekt kullanmasını sağlar. Eğer pencerenin efekt kullanmasını istemiyorsanız bu sınıfı silebilirsiniz.
                role=”dialog” özelliği “screen reader” kullanan kişilerin erişmesi için kullanılır.
                .modal-dialog sınıfı genişlik ve margin için uygun değerlerin atanmasını sağlar.
                Buraya kadar modal penceresini oluşturduk fakat içerikle ilgili herhangi bir şey eklemedik. İçeriğin nasıl ekleneceğini açıklayalım.

                .modal-content sınıfı ile birlikte içerik eklemeye başladığımızı belirtiyoruz. Bu sınıf sayesinde pencerede kullanılacak pek çok css özelliği aktarılmış oluyor. Kullandığımız div elemanının içerisine ise header, body, footer gibi yapıları ekleyebiliriz.
                modal-header sınıfı ile header bölümünü şekillendiriyoruz. Kullandığımız data-dismiss=”modal” özelliğine sahip buton tıklandığında pencereyi kapatmaktadır. close sınıfı bu butonu şekillendirmekte ve modal-title sınıfı satır yüksekliği için uygun değerin verilmesini sağlamaktadır.
                modal-body sınıfı ile herhangi bir HTML sayfasının body bölümüne eklediğimiz yapıları ekleyebiliyoruz. Bu kısıma paragraflar, resimler, videolar vs. içerikle alakalı her şeyi ekleyebilirsiniz.
                Son olarak modal-footer sınıfı ile oluşturulan div elemanını sayfanın footer bölümüyle aynı olarak kullanıyoruz.
                Modal kullanmak için ekranda onu aktif hale getirecek bir link, buton vs. kullanmamız gerekir. Pencere otomatik olarak ekrana gelmeyeceği için onu bir yapıyla aktif hale getirmeliyiz.
                Butona atadığımız data-toggle=”modal” ifadesi modal penceresinin açılmasını sağlar.
                data-target=”#myModal” ise hangi id değerine sahip modal’ı kullanacağımızı belirtir.
                Butonu oluşturduk ve artık sıra bu butona tıkladığımızda açılacak pencereyi oluşturmaya geldi. Burada daha önce atadığımız id değerini kullanıyoruz.

                Modal’ı oluşturan div elemanı butondakiyle aynı id değerine sahip olmalıdır.
                .modal sınıfı div elemanının içeriğinin modal olduğunu belirtir.
                fade sınıfı pencerenin açılıp kapanırken efekt kullanmasını sağlar. Eğer pencerenin efekt kullanmasını istemiyorsanız bu sınıfı silebilirsiniz.
                role=”dialog” özelliği “screen reader” kullanan kişilerin erişmesi için kullanılır.
                .modal-dialog sınıfı genişlik ve margin için uygun değerlerin atanmasını sağlar.
                Buraya kadar modal penceresini oluşturduk fakat içerikle ilgili herhangi bir şey eklemedik. İçeriğin nasıl ekleneceğini açıklayalım.

                .modal-content sınıfı ile birlikte içerik eklemeye başladığımızı belirtiyoruz. Bu sınıf sayesinde pencerede kullanılacak pek çok css özelliği aktarılmış oluyor. Kullandığımız div elemanının içerisine ise header, body, footer gibi yapıları ekleyebiliriz.
                modal-header sınıfı ile header bölümünü şekillendiriyoruz. Kullandığımız data-dismiss=”modal” özelliğine sahip buton tıklandığında pencereyi kapatmaktadır. close sınıfı bu butonu şekillendirmekte ve modal-title sınıfı satır yüksekliği için uygun değerin verilmesini sağlamaktadır.
                modal-body sınıfı ile herhangi bir HTML sayfasının body bölümüne eklediğimiz yapıları ekleyebiliyoruz. Bu kısıma paragraflar, resimler, videolar vs. içerikle alakalı her şeyi ekleyebilirsiniz.
                Son olarak modal-footer sınıfı ile oluşturulan div elemanını sayfanın footer bölümüyle aynı olarak kullanıyoruz.
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Sözleşmeyi okudum</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layout/scripts');?>

</body>
</html>
