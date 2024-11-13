<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">
    <div class="fixed-top navbar-nav bg-gradient-primary sidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('Home/index')?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Biblioteca</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Items -->
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Aluno/index')?>">
                <i class="fas fa-fw fa-school"></i>
                <span>Aluno</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Autor/index')?>">
                <i class="fas fa-fw fa-school"></i>
                <span>Autor</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Emprestimo/index')?>">
                <i class="fas fa-fw fa-check"></i>
                <span>Empréstimo</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Livro/index')?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Livro</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Obra/index')?>">
                <i class="fas fa-fw fa-copy"></i>
                <span>Obra</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Editora/index')?>">
                <i class="fas fa-fw fa-pen"></i>
                <span>Editora</span>
            </a>
        </li>
        <li class="nav-item <?php if(!session()->get('acesso') == 1){echo 'visually-hidden';}?>" id="itemUsuario">
            <a class="nav-link" href="<?=base_url('Usuario/index')?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Usuário</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Normas/index')?>">
                <i><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-text"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 9l1 0" /><path d="M9 13l6 0" /><path d="M9 17l6 0" /></svg></i>
                <span>Normas</span>
            </a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </div>
</ul>
<!-- End of Sidebar -->


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light mb-4 bg-white topbar static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=session()->get('nome')?></span>
                        <img class="img-profile rounded-circle"
                            src="<?=base_url('assets/img/undraw_profile.svg')?>">
                    </a>
                    <!-- Dropdown - User Information -->

                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in text-center"
                        aria-labelledby="userDropdown">
                        <span class=""><?=session()->get('email')?></span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Sair
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        
        <!-- End of Topbar -->
         <!-- loading spinner -->
        <div id="spinner" class="spinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="loading" id="loading">