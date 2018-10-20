<?php
/*  set_time_limit(500);
  ini_set('error_reporting', E_ALL);
  $mysqli= mysqli_connect("localhost","root","","ticaretm_db");

  if (mysqli_connect_errno($mysqli)) {
  exit("Baglanti Gercekletirilemedi");
  }

  $mysqli->query("set names utf8");

  $i=1;
  $iller=$mysqli->query("SELECT il_id, seo_il FROM tbl_il");
  if (!$iller) {
    echo "iller tablosu";
    exit();
  }
  echo "iller listelendi";

    foreach ($iller as $il) {


      $tablo="link_".$il['il_id'];
      echo "<br/>".$tablo."<br/>";
      $query1 = "CREATE TABLE $tablo" . '(
    Id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    link TEXT,
    parametre TEXT
)';
      //$sql=("create table '".$tablo."' (Id int(11) AUTO_INCREMENT PRIMARY KEY,link TEXT NOT NULL,parametre TEXT NOT NULL)");
      $tablo_olustur=$mysqli->query($query1);


      if ($tablo_olustur) {


      $ilceler=$mysqli->query("SELECT ilce_id,seo_ilce FROM tbl_ilce WHERE il_id='$il[il_id]'");
      if (!$ilceler) {
        echo "ilceler tablosu";
        exit();
      }

      foreach ($ilceler as $ilce) {


        $mahalleler=$mysqli->query("SELECT mahalle_id,seo_mahalle FROM tbl_mahalle
          WHERE ilce_id='$ilce[ilce_id]'");
        if (!$mahalleler) {
          echo "mahalleler tablosu";
          exit();
        }

        foreach ($mahalleler as $mahalle) {

          $mainKategori= array('Id' =>'45', 'seo' => 'emlak');
          $item1 = array('Id' =>'46', 'seo' => 'konut');
          $item2 = array('Id' =>'47', 'seo' => 'is-yeri');
          $item3 = array('Id' =>'48', 'seo' => 'arsa');
          $firstSubs=array($item1,$item2,$item3);

          foreach ($firstSubs as $firstSub) {
            switch ($firstSub['Id']) {
              case '46':
                $item1 = array('Id' =>'149', 'seo' => 'daire');
                $item2 = array('Id' =>'155', 'seo' => 'mustakil-ev');
                $item3 = array('Id' =>'157', 'seo' => 'ciftlik-evi');
                $secondSubs=array($item1,$item2,$item3);
                break;
              case '47':
                $item1 = array('Id' =>'164', 'seo' => 'satilik');
                $item2 = array('Id' =>'165', 'seo' => 'kiralik');
                $secondSubs=array($item1,$item2);
                break;
              case '48':
                $item1 = array('Id' =>'167', 'seo' => 'satilik');
                $item2 = array('Id' =>'168', 'seo' => 'kiralik');
                $secondSubs=array($item1,$item2);
                break;
            }

            foreach ($secondSubs as $secondSub) {

              switch ($secondSub['Id']) {
                case '149':
                case '155':
                case '157':
                  switch ($secondSub['Id']) {
                    case '149':
                      $item1 = array('Id' =>'151', 'seo' => 'satilik');
                      $item2 = array('Id' =>'152', 'seo' => 'kiralik');
                      $thirdSubs=array($item1,$item2);
                      break;
                    case '155':
                      $satilik = array('Id' =>'16194', 'seo' => 'satilik');
                      $kiralik = array('Id' =>'16195', 'seo' => 'kiralik');
                      $thirdSubs=array($item1,$item2);
                      break;
                    case '157':
                      $satilik = array('Id' =>'16172', 'seo' => 'satilik');
                      $kiralik = array('Id' =>'16173', 'seo' => 'kiralik');
                      $thirdSubs=array($item1,$item2);
                      break;
                  }

                  foreach ($thirdSubs as $thirdSub) {




                      $link=$mainKategori['seo']."/".$firstSub['seo']."/".$secondSub['seo']."/".$thirdSub['seo'].
                      "/".$il['seo_il']."/".$ilce['seo_ilce']."/".$mahalle['seo_mahalle'];
                      $parametre="kategoriId/".$mainKategori['Id']."/kategori2/".$firstSub['Id']."/kategori3/".
                      $secondSub['Id']."/kategori4/".$thirdSub['Id']."/il/".$il['il_id']."/ilce/".$ilce['ilce_id']."/mahalle/".$mahalle['mahalle_id'];
                      //$sonuc=$mysqli->query("INSERT INTO '.$tablo.' (Id,link,parametre) VALUES (NULL,'$link','$parametre')");
                      $query2 = "INSERT INTO ".$tablo." (Id,link,parametre) VALUES (NULL,'$link','$parametre')";

                      $sonuc=$mysqli->query($query2);
                      if (!$sonuc){

                          echo "konut insert";
                          exit();

                      }

                  }
                  break;


                case '164':
                case '165':
                case '167':
                case '168':



                  $link=$mainKategori['seo']."/".$firstSub['seo']."/".$secondSub['seo'].
                  "/".$il['seo_il']."/".$ilce['seo_ilce']."/".$mahalle['seo_mahalle'];
                  $parametre="kategoriId/".$mainKategori['Id']."/kategori2/".$firstSub['Id']."/kategori3/".
                  $secondSub['Id']."/il/".$il['il_id']."/ilce/".$ilce['ilce_id']."/mahalle/".$mahalle['mahalle_id'];
                  $query3 = "INSERT INTO ".$tablo." (Id,link,parametre) VALUES (NULL,'$link','$parametre')";
                  //$sonuc=$mysqli->query("INSERT INTO '".$tablo."' (Id,link,parametre) VALUES (NULL,'$link','$parametre')");

                  $sonuc=$mysqli->query($query3);
                  if (!$sonuc){


                    echo "diğer insert";
                    exit();
                  }


                  break;
              }
            }
          }
        }
      }
    }else {
      echo "tablo oluşturma hatası";
      exit();
    }
  }
  $mysqli->close();
