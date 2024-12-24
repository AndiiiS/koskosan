<?php
// Tambahkan header
include 'header.php';
?>

<!-- Hero Section -->
<div class="row align-items-center bg-light py-5">
    <div class="col-lg-6">
        <h1>Selamat Datang di KosKosan</h1>
        <p class="lead">Platform terbaik untuk menemukan kamar kos yang sesuai dengan kebutuhan Anda.</p>
        <a href="/app/Views/book_room.php" class="btn btn-primary btn-lg">Pesan Kamar Sekarang</a>
    </div>
    <div class="col-lg-6 text-center">
        <img src="images/home_image.png" alt="KosKosan" class="img-fluid" width="50%" >
    </div>
</div>

<!-- Fitur Utama -->
<section class="mt-5">
    <h2 class="text-center mb-4">Mengapa Memilih KosKosan?</h2>
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <i class="fa fa-bed fa-3x text-primary mb-3"></i>
                <h4>Beragam Pilihan Kamar</h4>
                <p>Pilih kamar sesuai dengan lokasi, fasilitas, dan budget Anda.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <i class="fa fa-wallet fa-3x text-primary mb-3"></i>
                <h4>Harga Transparan</h4>
                <p>Tidak ada biaya tersembunyi. Semua harga ditampilkan dengan jelas.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <i class="fa fa-calendar-check fa-3x text-primary mb-3"></i>
                <h4>Booking Mudah</h4>
                <p>Pesan kamar dengan mudah secara online tanpa ribet.</p>
            </div>
        </div>
    </div>
</section>

<!-- Kamar Populer -->
<section class="mt-5">
    <h2 class="text-center mb-4">Kamar Populer</h2>
    <div class="row">
        <?php
        // Koneksi database
        include 'db.php';

        // Query untuk mengambil 3 kamar paling populer
        $stmt = $conn->query("SELECT * FROM rooms LIMIT 3");
        while ($room = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                <img src="../../public/images/<?= $room['image']; ?>" alt="<?= $room['name']; ?>" class="card-img-top">

                    <div class="card-body">
                        <h5 class="card-title"><?= $room['name']; ?></h5>
                        <p class="card-text">Harga: Rp<?= number_format($room['price'], 0, ',', '.'); ?> / bulan</p>
                        <a href="/public/book_room.php?id=<?= $room['id']; ?>" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Testimoni -->
<section class="mt-5 bg-light py-5">
    <h2 class="text-center mb-4">Apa Kata Pengguna Kami?</h2>
    <div class="row text-center">
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p>"Sangat membantu menemukan kos yang sesuai kebutuhan. Prosesnya cepat dan mudah!"</p>
                <footer class="blockquote-footer">Andi, Mahasiswa</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p>"KosKosan memberikan pengalaman terbaik dalam mencari kos. Tidak ada biaya tersembunyi!"</p>
                <footer class="blockquote-footer">Siti, Pekerja</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p>"Saya suka fitur pencarian dan booking online-nya. Praktis dan aman."</p>
                <footer class="blockquote-footer">Rian, Mahasiswa</footer>
            </blockquote>
        </div>
    </div>
</section>

<?php
// Tambahkan footer
include 'footer.php';
?>
