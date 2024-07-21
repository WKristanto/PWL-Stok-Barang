<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/sparklines/sparkline.js');?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/jqvmap/jquery.vmap.min.js');?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/jqvmap/maps/jquery.vmap.usa.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js');?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/moment/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js');?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/dist/js/adminlte.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/dist/js/demo.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-3.2.0/dist/js/pages/dashboard.js');?>"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Search -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil elemen input dan tabel
        var input = document.getElementById("tableSearch");
        var table = document.querySelector(".table");

        // Tambahkan event listener untuk input pencarian
        input.addEventListener("keyup", function() {
            var filter = input.value.toLowerCase(); // Nilai input, diubah ke huruf kecil
            var rows = table.querySelectorAll("tbody tr"); // Ambil semua baris di tbody

            // Loop melalui semua baris tabel, dan sembunyikan yang tidak sesuai dengan query pencarian
            rows.forEach(function(row) {
                var cells = row.querySelectorAll("td"); // Ambil semua sel dalam baris
                var match = false; // Awalnya asumsikan baris tidak cocok

                // Loop melalui semua sel dalam baris
                cells.forEach(function(cell) {
                    if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
                        match = true; // Jika ada kecocokan, set match ke true
                    }
                });

                if (match) {
                    row.style.display = ""; // Tampilkan baris jika cocok
                } else {
                    row.style.display = "none"; // Sembunyikan baris jika tidak cocok
                }
            });
        });
    });
</script>

<!-- Pesan Berhasil -->
<script>
// Mengecek apakah ada flashdata
<?php if ($this->session->flashdata('pesan_sukses')): ?>
    var flashdata = <?= json_encode($this->session->flashdata('pesan_sukses')); ?>;
    // Tampilkan pesan dengan SweetAlert
    Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        icon: flashdata.icon,
        title: flashdata.title,
        width: 'auto',
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
<?php endif; ?>
</script>

<!-- Validasi Hapus Data Barang -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success swal2-spacing-confirm",
            cancelButton: "btn btn-danger swal2-spacing-cancel"
        },
        buttonsStyling: false,
    });

    document.querySelectorAll('.hapus-barang').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah link langsung

            const url = this.getAttribute('data-url'); // Dapatkan URL dari atribut data-url

            swalWithBootstrapButtons.fire({
                title: "Anda yakin?",
                text: "Data barang akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya!",
                cancelButtonText: "Tidak!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lanjutkan penghapusan dengan mengarahkan ke URL hapus
                    window.location.href = url;
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Dibatalkan",
                        text: "Penghapusan data barang dibatalkan :)",
                        icon: "error"
                    });
                }
            });
        });
    });
});
</script>

<!-- Fitur Cetak -->
<script>
    document.getElementById('printTable').addEventListener('click', function() {
        // Sembunyikan elemen-elemen yang tidak diperlukan saat mencetak
        var elementsToHide = document.querySelectorAll('.card-header, .card-tools, .input-group, .btn, footer');
        elementsToHide.forEach(function(element) {
            element.style.display = 'none';
        });

        // Sembunyikan kolom ACTION sebelum mencetak
        var actionCols = document.querySelectorAll('table th:nth-child(6), table td:nth-child(6)');
        actionCols.forEach(function(col) {
            col.style.display = 'none';
        });

        // Cetak hanya bagian tabel
        var printContents = document.querySelector('.table').outerHTML; // Hanya mengambil bagian tabel
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        // Tambahkan CSS untuk mencetak (opsional, jika ada styling khusus)
        var style = document.createElement('style');
        style.innerHTML = `
            @media print {
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                table, th, td {
                    border: 1px solid #ccc; /* Gunakan warna abu-abu untuk border */
                }
                th, td {
                    padding: 12px;
                    text-align: center;
                    vertical-align: middle;
                    font-family: Arial, sans-serif;
                    font-size: 14px;
                }
                th {
                    background-color: #f8f9fa; /* Warna latar belakang yang lembut untuk header */
                    color: #333; /* Warna teks yang kontras untuk header */
                    font-weight: bold;
                    border-bottom: 2px solid #000; /* Border bawah yang lebih tebal untuk header */
                }
                img {
                    max-width: 100%;
                    height: auto;
                }
                body {
                    margin: 0;
                    padding: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Cetak tabel
        window.print();

        // Kembalikan konten asli setelah pencetakan
        document.body.innerHTML = originalContents;
        location.reload(); // Reload halaman untuk mengembalikan event listener
    });
</script>


<script>
    // Untuk mengupdate label file upload
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("exampleInputFile").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>






</body>

</html>