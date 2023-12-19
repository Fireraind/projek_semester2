<link href="assets/css/projek_style.css" rel="stylesheet" />
<footer class="py-4 bg-light mt-4">
    <div class="container-fluid px-4 mt-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted ">Copyright &copy; Kelompok 9 <?= date('Y') ?></div>

        </div>
    </div>
</footer>
</div>
</div>
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ready to Leave?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
    (function() {
        document.body.classList.toggle('sb-sidenav-toggled');
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            // js side bar dulu
            sidebarToggle.addEventListener('click', event => {
                console.log(event);
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                // end
            });
        }

    })();
</script>

<!-- Place this in the appropriate section of your HTML page -->
<!-- <script>
    // After the document has finished loading
    (function() {
        document.addEventListener("DOMContentLoaded", function() {
            // Display the alert
            var alertBox = document.createElement('div');
            alertBox.classList.add('alert', 'alert-success'); // Adjust to your alert class
            alertBox.innerHTML = 'Success Message'; // Insert your alert message here

            // Add the alert to the document
            document.body.appendChild(alertBox);

            // Remove the alert after 3 seconds
            setTimeout(function() {
                alertBox.style.display = 'none';
            }, 3000); // Time in milliseconds (3 seconds = 3000 milliseconds)
        })
    });
</script> -->
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


<!-- <script src="<?= base_url('assets/js/scripts.js'); ?>"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>js/datatables-simple-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tableproduct').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#tableuser').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#tableinvoice').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('.alert').alert().delay(3000).slideUp('slow');
    });
</script>
<!-- <script>
    $(document).ready(function() {
        const filter = document.getElementById("filter")
        const item = document.getSelectorALL("#shop")
        filter.addEventListener("input", (e) => filterData(e.target.value));

        function filterData(search) {
            item.foreach((item) => {
                const productName = item.querySelector('h3').innerText.toLowerCase();
                const brandName = item.querySelector('p').innerText.toLowerCase();
                if (item.innerText.toLowerCase().includes(search.toLowerCase())) {
                    item.classList.remove("d-none");
                }
            });

        }
    });
</script> -->
<script>
    $(document).ready(function() {
        const filter = document.getElementById("filter");
        const items = document.querySelectorAll("#shop");

        filter.addEventListener("input", (e) => filterData(e.target.value.toLowerCase()));

        function filterData(search) {
            items.forEach((item) => {
                const productName = item.querySelector('h3').innerText.toLowerCase();
                const brandName = item.querySelector('p').innerText.toLowerCase();

                if (productName.includes(search) || brandName.includes(search)) {
                    item.closest('.card').classList.remove("d-none");
                } else {
                    item.closest('.card').classList.add("d-none");
                }
            });
        }
    });
</script>


</body>

</html>