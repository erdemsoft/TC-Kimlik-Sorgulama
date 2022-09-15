<?php
/*@author ErDeM <admin@erdemsoft.com>*/


//---------------Karakter Düzeltme Fonksiyonu---------------//
/*
karakterDuzelt adında bir fonksiyon hazırladım. Bu fonksiyon türkçe karakterler 
küçük yazıldığında otomatik olarak büyük hale çevirecek. Doğrulama isteğini 
gönderirken bi sıkıntı olmaması adına bu şekilde göndereceğiz.
*/
function karakterDuzelt($yazi)
{
    $ara = array("ç", "i", "ı", "ğ", "ö", "ş", "ü");
    $degistir = array("Ç", "İ", "I", "Ğ", "Ö", "Ş", "Ü");
    $yazi = str_replace($ara, $degistir, $yazi);
    $yazi = strtoupper($yazi);
    return $yazi;
}


// ----------------TC Kimlik No Doğrulama Kısmı----------------//

/*
Bilgiler doldurulup Formu Gönder butonuna tıklanana kadar işlem başlamaması için
isset() fonksiyonu kullandım.
*/
if (isset($_POST['tcKimlikSorgula'])) {

/*
Değerler, formu gönder butonu ile birlikte POST edildi ve yakalayıp ilgili değiş-
kenlere atadım.
*/
    $tcKimlikNo = $_POST['TC'];

/*
Ad ve Soyad için Türkçe küçük karakter yazılırsa bunu otomatik olarak büyük hale
çeviriyoruz (karakterDuzeltme) ve her ihtimale karşın sağında ya da solunda
boşluk varsa o kısmı kırpıyoruz(trim()).
*/
    $ad = karakterDuzelt(trim($_POST["AD"]));
    $soyad = karakterDuzelt(trim($_POST['SOYAD']));

    $dogumYili = $_POST['DOGUMYILI'];



    /*
Bundan sonraki kodları TRY CATCH blogunda yazdıracağız ki herhangi bir hata ol-
duğunda bunu yakalayabilelim.
*/
   

        /*
Değişkenlere atadığımız form verilerini $veriler adında bir diziye aktarıyoruz.
*/
        $veriler = array(
            'TCKimlikNo' => $tcKimlikNo,
            'Ad' => $ad,
            'Soyad' => $soyad,
            'DogumYili' => $dogumYili
        );

        /*
OOP ile SOAP oluşturarak $baglan adında bir değişkene atıyoruz. Bu sayede
tckimlik.nvi.gov.tr üzerinden elimizdeki verileri kullanarak sorgulama yapabile-
ceğiz. Eğer php.ini de bulunan extensions'da soap aktif değilse başındaki ";"
noktalı virgülü kaldırıp servisi yeniden başlatmanız gerekecektir.
*/
$baglan = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");

$sonuc = $baglan->TCKimlikNoDogrula($veriler);

// Forma girilen bilgilerin hepsi doğruysa aşağıdaki mesaj

if ($sonuc->TCKimlikNoDogrulaResult) {
    Header("Location:index.php?durum=ok");
}


// Bir yada bir kaçtanesi yanlış ise aşağıdaki mesaj son kullanıcıya gösterilir.

else {
    Header("Location:index.php?durum=no");
}

// Eğer hata oluşursa ekrana yazdırıyoruz.
 {
echo $exc->getMessage();
}
} 
/*@author ErDeM <admin@erdemsoft.com>*/

?>