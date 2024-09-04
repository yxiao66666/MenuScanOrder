<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<body>
    <section class="py-5 text-center container">
        <div class="container">
            <h1 class="text-center mb-4">QR Code Creation</h2>
        </div>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php for ($i = 1; $i <= $store['table_count']; $i++): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <!-- Show table number -->
                                <h5 class="card-title">Table <?= $i ?></h5>
                                <!-- QR Code container -->
                                <div id="qrcode<?= $i ?>"></div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <p class="lead">Print out the QR code for you tables!</p>
        <button id="print" class="btn btn-primary my-2">Generate PDF to print</button>
    </section>
</body>

<!-- script for QR code library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<!-- script for QR code content -->
<script>
    // Generate QR codes for each container
    <?php for ($i = 1; $i <= $store['table_count']; $i++): ?>
        var qrcode<?= $i ?> = new QRCode("qrcode<?= $i ?>", "https://infs3202-82381126.uqcloud.net/MenuScanOrder/my_store/edit_menu");
    <?php endfor; ?>
</script>

<!-- script for printing QR code -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        let printLink = document.getElementById("print");
        let container = document.getElementById("container");

        printLink.addEventListener("click", event => {
            event.preventDefault();
            printLink.style.display = "none";
            window.print();
        }, false);

        container.addEventListener("click", event => {
            printLink.style.display = "flex";
        }, false);

    }, false);
</script>

<?= $this->endSection() ?>
