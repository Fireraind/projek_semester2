                <link href="assets/css/projek_style.css" rel="stylesheet" />
                <div id="layoutAuthentication_footer">
                    <!-- Place this in the appropriate section of your HTML page -->

                    </script>
                    <footer class="py-4 mt-auto bg-light">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Kelompok 9 <?= date('Y') ?></div>

                            </div>
                        </div>
                    </footer>
                </div>
                </div>
                <!-- Tambahkan script JavaScript -->
                <!-- <script>
                    var flashMessage = document.getElementById('flashMessage');

                    // Function untuk menunggu sebentar sebelum menyembunyikan flash message
                    setTimeout(function() {
                        if (flashMessage) {
                            flashMessage.style.opacity = '0'; // Mengatur opacity menjadi 0
                            flashMessage.style.transition = 'opacity 1s ease-out'; // Transisi menghilangkan elemen perlahan
                        }

                        setTimeout(function() {
                            if (flashMessage) {
                                flashMessage.style.display = 'none'; // Sembunyikan elemen
                                flashMessage.style.opacity = '1'; // Kembalikan opacity ke nilai semula
                                flashMessage.style.transition = 'none'; // Hapus transisi agar kembali normal
                            }
                        }, 1000); // Setelah elemen tersembunyi selama 1 detik
                    }, 3000); // Waktu dalam milidetik (3 detik)
                </script> -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                <!-- <script src="<?= base_url('assets/'); ?>js/scripts.js"></script> -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('.alert').alert().delay(3000).slideUp('slow');
                    });
                </script>

                </body>

                </html>