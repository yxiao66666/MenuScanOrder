<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MenuScanOrder Website">
        <meta name="author" content="Yang Xiao">
        <meta name="generator" content="Hugo 0.122.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="<?= base_url('css/landing.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/sign-in.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/sign-up.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/my-store.css'); ?>">
        <link rel="icon" type="image/png" href="<?= base_url('../images/Logo2.png'); ?>">
        <title>MenuScanOrder</title>
    </head>
    <body>
        <!-- Navigation bar -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(57, 99, 235, 1);">
                <div class="container">
                    <a class="navbar-brand" href="<?= base_url(); ?>">MenuScanOrder </a>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= service('router')->getMatchedRoute()[0] == '/' ? 'active' : ''; ?>" href="<?= base_url(); ?>">Home </a>
                        </li>
                        <!-- If logged in --> 
                        <?php if (session()->get('isLoggedIn')): ?>
                        <!-- If is admin -->
                        <?php if (session()->get('user_role') == 1): ?> 
                        <li class="nav-item">
                            <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'my_store' ? 'active' : ''; ?>" href="<?= base_url("my_store"); ?>">My Store </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'user_management' ? 'active' : ''; ?>" href="<?= base_url("user_management"); ?>">User Management </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" <?= base_url("logout"); ?>">Logout </a>
                        </li>
                        <?php endif; ?>
                        <!-- If not admin --> 
                        <?php if (session()->get('user_role') == 0): ?> 
                        <li class="nav-item">
                            <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'my_store' ? 'active' : ''; ?>" href="<?= base_url("my_store"); ?>">My Store </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" <?= base_url("logout"); ?>">Logout </a>
                        </li>
                        <?php endif; ?>
                        <!-- If not logged in --> 
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'login' ? 'active' : ''; ?>" href="<?= base_url("sign_in"); ?>">Login </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Navigation bar END -->
        <main>
            <!-- Button to toggle light and dark mode -->
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                <symbol id="check2" viewBox="0 0 16 16">
                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                </symbol>
                <symbol id="circle-half" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
                </symbol>
                <symbol id="moon-stars-fill" viewBox="0 0 16 16">
                    <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                    <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                </symbol>
                <symbol id="sun-fill" viewBox="0 0 16 16">
                    <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                </symbol>
            </svg>
            <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
                <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                    <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                            <svg class="bi me-2 opacity-50" width="1em" height="1em">
                                <use href="#sun-fill"></use>
                            </svg>
                            Light 
                            <svg class="bi ms-auto d-none" width="1em" height="1em">
                                <use href="#check2"></use>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                            <svg class="bi me-2 opacity-50" width="1em" height="1em">
                                <use href="#moon-stars-fill"></use>
                            </svg>
                            Dark 
                            <svg class="bi ms-auto d-none" width="1em" height="1em">
                                <use href="#check2"></use>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                            <svg class="bi me-2 opacity-50" width="1em" height="1em">
                                <use href="#circle-half"></use>
                            </svg>
                            Auto 
                            <svg class="bi ms-auto d-none" width="1em" height="1em">
                                <use href="#check2"></use>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                <symbol id="aperture" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
                </symbol>
                <symbol id="cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
                <symbol id="chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                </symbol>
            </svg>
            <!-- Button to toggle light and dark mode END -->
            <!-- Main Page content --> <?= $this->renderSection('content') ?>
            <!-- Placeholder for page content -->
        </main>
        <!-- Footer -->
        <footer class="text-light py-5" style="background-color: rgba(57, 99, 235, 1);">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24">
                            <title>Product</title>
                            <circle cx="12" cy="12" r="10" />
                            <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
                        </svg>
                        <small>&copy; <?= date('Y') ?> MenuScanOrder. All rights reserved. </small>
                    </div>
                    <div class="col-6 col-md" style="color: white;">
                        <h5>Features</h5>
                        <ul class="list-unstyled text-small">
                            <?php if (session()->get('isLoggedIn')): ?> 
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("my_store/edit_menu"); ?>">Digital Menu Creation </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("my_store/qr_create"); ?>">QR Code Generation </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("my_store/edit_menu"); ?>">Seamless Ordering </a>
                                </w>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("my_store"); ?>">Order Management </a>
                            </li>
                            <?php else: ?> 
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">Digital Menu Creation </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">QR Code Generation </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">Seamless Ordering </a>
                                </w>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">Order Management </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>My Store</h5>
                        <ul class="list-unstyled text-small">
                            <?php if (session()->get('isLoggedIn')): ?> 
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("my_store"); ?>">View </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("my_store/edit_table"); ?>">Edit Table </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("my_store/edit_menu"); ?>">Edit Menu </a>
                            </li>
                            <?php else: ?> 
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">View </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">Edit Table </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">Edit Menu </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>My Menu</h5>
                        <ul class="list-unstyled text-small">
                            <?php if (session()->get('isLoggedIn')): ?> 
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("my_store/edit_menu"); ?>">Catgegory </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("my_store/edit_menu"); ?>">Items </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("my_store/edit_menu"); ?>">Prices </a>
                            </li>
                            <?php else: ?> 
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">Catgegory </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">Items </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">Prices </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>User Management</h5>
                        <ul class="list-unstyled text-small">
                            <?php if (session()->get('isLoggedIn')): ?> 
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("user_management"); ?>">View </a>
                            </li>
                            <?php else: ?> 
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("sign_in"); ?>">View </a>
                            </li>
                            <?php endif; ?> 
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <ul class="list-unstyled text-small">
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("privacy_policy"); ?>">Privacy Policy </a>
                            </li>
                            <li>
                                <a class="text-light link-secondary text-decoration-none" href="
                                    <?= base_url("terms_of_service"); ?>">Terms of Service </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer END -->
        <!-- Script to toggle light and dark mode -->
        <script src="<?= base_url('../assets/js/color-modes.js'); ?>"></script>
        <script src="<?= base_url('../assets/dist/js/bootstrap.bundle.min.js'); ?>"></script>
    </body>
</html>