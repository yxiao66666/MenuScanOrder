<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-- Only include the HTML tags within the <main> tag. -->

<body>
    <!-- Here was the header bar now in template.php -->
    <main>
        <img src="<?= base_url('../images/Designer3.png'); ?>" alt="MenuScanOrder Front" style="width:100%;height:100%;position:absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);z-index: -1;">

        <div class="overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary" style="opacity: 0.9;">

        
        <div class="col-md-6 p-lg-5 mx-auto my-5">
            <h1 class="display-3 fw-bold" style="color: rgba(57, 99, 235, 1);">MenuScanOrder</h1>
            <h3 class="fw-normal text-muted mb-3">A smarter ordering platform </h3>
            <!-- If not signed in then show sign in-->
            <?php if (!session()->get('isLoggedIn')): ?>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
            <a class="icon-link" href="<?= base_url("sign_in"); ?>">
                Sign-in
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
            <a class="icon-link" href="<?= base_url("sign_up"); ?>">
                Sign-up
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
            </div>
            <!-- If signed in then show getting started-->
            <?php else: ?>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
            <a class="icon-link" href="<?= base_url("my_store"); ?>">
                Getting started
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
            </div>
            <?php endif; ?>
        </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" style="background-color: rgba(57, 99, 235, 1);">
            <div class="my-3 p-3">
                <h2 class="display-5" style="color: white;">Digital Menu Creation</h2>
                <p class="lead"  style="color: white;">Facilitating easy creation and management of digital menus with categories, items, and pricing. </p>
            </div>
            <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                <img src="<?= base_url('../images/Designer2.png'); ?>" alt="Digital Menu Creation" style="width:100%;height:100%;border-radius: 21px 21px 0 0;">
            </div>

        </div>

        <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">QR Code Generation</h2>
                <p class="lead">MenuScanOrder generates unique QR codes for individual tables within businesses. </p>
            </div>
            <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                <img src="<?= base_url('../images/Designer.png'); ?>" alt="QR Code Generation" style="width:100%;height:100%;border-radius: 21px 21px 0 0;">
            </div>
        </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Seamless Ordering</h2>
                <p class="lead">MenuScanOrder provide a platform for customers to place orders online, effectively reduces labour hours for the business and allowing staffs to focus on other critical aspects of their operations. </p>
            </div>
            <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                <img src="<?= base_url('../images/Designer4.png'); ?>" alt="Seamless Ordering" style="width:100%;height:100%;border-radius: 21px 21px 0 0;">
            </div>
        </div>
        
        <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" style="background-color: rgba(57, 99, 235, 1);">
            <div class="my-3 py-3">
                <h2 class="display-5"  style="color: white;">Order Management</h2>
                <p class="lead" style="color: white;">After orders were processed through, staffs can monitor and manage them in the backstage in real time ensuring a smooth procedure of delivering the order. </p>
            </div>
            <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                <img src="<?= base_url('../images/Designer5.png'); ?>" alt="Order Management" style="width:100%;height:100%;border-radius: 21px 21px 0 0;">
            </div>
        </div>
        </div>
    </main>
    <!-- Here was the footer and script now in template.php-->
</body>

<?= $this->endSection() ?>