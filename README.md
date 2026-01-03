# FileCMS - Advanced Flat-File CMS

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-%3E%3D7.0-8892BF.svg)](https://php.net)

FileCMS, Bludit mimarisinden esinlenerek geliştirilmiş gelişmiş özellikli bir flat-file içerik yönetim sistemidir. Veritabanı gerektirmez, tüm içerikler dosya sisteminde saklanır.

## ✨ Özellikler

- **🗄️ Flat-File Sistem**: Veritabanı gerektirmez, tüm içerikler dosyalarda saklanır
- **⚡ Kolay Kurulum**: Yükle ve kullan - karmaşık kurulum gerektirmez
- **🎨 Modern Arayüz**: Temiz ve sezgisel admin paneli
- **📝 Markdown Desteği**: İçerikleri Markdown ile yazın
- **🔒 Güvenli**: Güvenlik en iyi uygulamaları ile geliştirildi
- **🔌 Genişletilebilir**: Plugin ve tema sistemi
- **⚡ Hızlı**: Performans için optimize edildi
- **👤 Kullanıcı Yönetimi**: Çoklu kullanıcı desteği
- **🔍 Arama**: İçerik arama özelliği
- **📱 Responsive**: Mobil uyumlu tasarım

## 📋 Gereksinimler

- PHP 7.0 veya üzeri
- Apache/Nginx web sunucusu
- mod_rewrite etkin (temiz URL'ler için)

## 🚀 Kurulum

1. **Dosyaları yükleyin**
   ```bash
   # Repository'yi klonlayın
   git clone https://github.com/integrumart/fileCMS.git
   
   # Veya ZIP dosyasını indirip sunucunuza yükleyin
   ```

2. **Dizin izinlerini ayarlayın**
   ```bash
   chmod -R 755 bl-content
   ```

3. **Tarayıcınızda açın**
   ```
   http://yoursite.com/install.php
   ```

4. **Kurulum formunu doldurun**
   - Site başlığı ve slogan
   - Admin kullanıcı adı ve şifresi
   - E-posta adresi (opsiyonel)

5. **Kurulumu tamamlayın**
   - Admin paneline giriş yapın: `/admin`
   - İlk içeriğinizi oluşturun

## 📂 Dizin Yapısı

```
fileCMS/
├── bl-kernel/          # Çekirdek sistem dosyaları
│   ├── admin/          # Admin panel
│   ├── helpers/        # Yardımcı fonksiyonlar
│   └── *.php           # Sınıf dosyaları
├── bl-content/         # İçerik dizini
│   ├── databases/      # JSON veritabanları
│   ├── pages/          # Sayfa içerikleri
│   ├── uploads/        # Yüklenen dosyalar
│   └── tmp/            # Geçici dosyalar
├── bl-themes/          # Temalar
│   └── default/        # Varsayılan tema
├── bl-plugins/         # Eklentiler
├── bl-languages/       # Dil dosyaları
├── index.php           # Ana dosya
├── install.php         # Kurulum scripti
└── .htaccess           # Apache yapılandırma

```

## 🎯 Kullanım

### Admin Paneli

Admin paneline erişmek için: `http://yoursite.com/admin`

Admin panelinde yapabilecekleriniz:
- ✏️ Yeni sayfa/yazı oluşturma
- 📄 Mevcut içerikleri düzenleme
- 👥 Kullanıcı yönetimi
- ⚙️ Site ayarları
- 📊 İstatistikler

### Sayfa Oluşturma

1. Admin paneline giriş yapın
2. "Create New Page" bölümünü kullanın
3. Başlık ve içerik girin (Markdown destekli)
4. "Create Page" butonuna tıklayın

### Markdown Desteği

FileCMS Markdown formatını destekler:

```markdown
# Başlık 1
## Başlık 2
### Başlık 3

**Kalın metin**
*İtalik metin*

[Link metni](https://example.com)
```

## 🔧 Yapılandırma

Site ayarları `bl-content/databases/site.php` dosyasında saklanır. Admin panelinden veya doğrudan düzenleyebilirsiniz.

## 🔒 Güvenlik

- CSRF token koruması
- Password hashing (PHP password_hash)
- XSS koruması
- Güvenli dosya yükleme
- Session yönetimi
- Dizin listeleme engellendi
- Hassas dosyalara erişim engellendi

## 🤝 Katkıda Bulunma

Katkılarınızı bekliyoruz! Lütfen:

1. Fork edin
2. Feature branch oluşturun (`git checkout -b feature/AmazingFeature`)
3. Değişikliklerinizi commit edin (`git commit -m 'Add some AmazingFeature'`)
4. Branch'inizi push edin (`git push origin feature/AmazingFeature`)
5. Pull Request açın

## 📝 Lisans

Bu proje MIT lisansı altında lisanslanmıştır. Detaylar için [LICENSE](LICENSE) dosyasına bakın.

## 🙏 Teşekkürler

FileCMS, [Bludit](https://www.bludit.com/) mimarisinden esinlenmiştir.

## 📧 İletişim

Sorularınız veya önerileriniz için issue açabilirsiniz.

---

**FileCMS** ile içerik yönetimi artık çok daha kolay! 🚀
