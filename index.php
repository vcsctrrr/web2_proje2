<?php
// Veritabanı bağlantısı
$host = "localhost";
$username = "root";
$password = "";
$dbname = "hardem";

// Bağlantıyı oluştur
$conn = new mysqli($host, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Formdan gelen verileri al
$ad_soyad = $_POST['ad_soyad'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$mesaj = $_POST['mesaj'];

// Verilerin eksiksiz olup olmadığını kontrol et
if ($ad_soyad && $email && $telefon && $mesaj) {
    // Verileri tabloya ekle
    $sql = "INSERT INTO form_mesajlari (ad_soyad, email, telefon, mesaj) VALUES ('$ad_soyad', '$email', '$telefon', '$mesaj')";
    if ($conn->query($sql) === TRUE) {
        echo "Mesaj başarıyla kaydedildi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Lütfen tüm alanları doldurun.";
}

// Bağlantıyı kapat
$conn->close();
?>