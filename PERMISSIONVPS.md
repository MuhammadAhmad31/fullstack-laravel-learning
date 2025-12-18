# 🔹 SOLUSI AMAN & RAPI (UNTUK KELAS)

## 1️⃣ Pastikan semua user ada di group www-data
PHP-FPM biasanya jalan sebagai www-data. Tambahkan semua user ke group ini:

```bash
for user in trainer murid1 murid2 murid3 murid4 murid5 murid6 murid7 murid8
do
    usermod -aG www-data $user
done
```

> Logout & login ulang supaya group baru aktif.

---

## 2️⃣ Set owner dan group folder Laravel untuk semua murid
```bash
for user in trainer murid1 murid2 murid3 murid4 murid5 murid6 murid7 murid8
do
    LARAVEL_PATH="/home/$user/laravel"

    if [ -d "$LARAVEL_PATH" ]; then
        # Owner tetap user, group www-data
        chown -R $user:www-data "$LARAVEL_PATH"

        # Pastikan storage & bootstrap/cache bisa ditulis oleh owner & group
        chmod -R 775 "$LARAVEL_PATH/storage"
        chmod -R 775 "$LARAVEL_PATH/bootstrap/cache"

        echo "✅ Permission fix untuk $user"
    fi
done
```

---

## 3️⃣ Gunakan setgid agar folder baru diwarisi group www-data
```bash
for user in trainer murid1 murid2 murid3 murid4 murid5 murid6 murid7 murid8
do
    LARAVEL_PATH="/home/$user/laravel"
    chmod g+s "$LARAVEL_PATH/storage"
    chmod g+s "$LARAVEL_PATH/bootstrap/cache"
done
```

> Artinya semua file/folder baru otomatis punya group `www-data` → PHP bisa menulis tanpa ribet.

---

## 4️⃣ Restart PHP-FPM
```bash
systemctl restart php8.3-fpm
```

---

## 5️⃣ Verifikasi
```bash
ls -ld /home/trainer/laravel/storage
ls -ld /home/trainer/laravel/bootstrap/cache
```
Harus muncul:
```
drwxrwsr-x trainer www-data
```
- `s` = setgid → file baru ikut group `www-data`
- PHP-FPM bisa menulis → error 500 hilang

---

## 🔹 Keterangan
- Tidak perlu `chmod 777` → aman untuk kelas
- Tidak perlu `sudo` di user → murid bisa langsung clone & run Laravel
- Hanya setting sekali di root → berlaku untuk semua murid


## How to Reset Laravel file

```bash
sudo /root/reset_user_laravel.sh trainer
```
Jalankan untuk murid tertentu, misal murid3:

``` bash
sudo /root/reset_user_laravel.sh murid3
```