<ul class="navbar-nav  bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(''); ?>">
		<div class="sidebar-brand-icon ">
			<img src="<?php echo base_url("img/logo.png"); ?>" alt="Logo" class="w-50">
		</div>
		<div class="sidebar-brand-text mx-3">Registrasi Paten </div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Management Paten
	</div>

	<!-- Nav Item -->
	<li class="nav-item <?php echo $this->uri->segment(1) == 'dashboard' ? "active" : "" ?>">
		<a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
			<i class="far fa-envelope"></i>
			<span>Dashboard</span></a>
	</li>

	<?php if ($this->session->userdata('role') == 'admin') { ?>
		<!-- Nav Item -->
		<li class="nav-item <?php echo $this->uri->segment(1) == 'penduduk' ? "active" : "" ?>">
			<a class="nav-link" href="<?php echo base_url('penduduk'); ?>">
				<i class="far fa-envelope"></i>
				<span>Penduduk</span></a>
		</li>
		<li class="nav-item <?php echo $this->uri->segment(1) == 'sktm' ? "active" : "" ?>">
			<a class="nav-link" href="<?php echo base_url('sktm'); ?>">
				<i class="far fa-envelope"></i>
				<span>SKTM</span></a>
		</li>
		<!-- Nav Item -->
		<li class="nav-item <?php echo $this->uri->segment(1) == 'ektp' ? "active" : "" ?>">
			<a class="nav-link" href="<?php echo base_url('ektp'); ?>">
				<i class="far fa-envelope"></i>
				<span>EKTP</span></a>
		</li>
		<!-- Nav Item -->
		<li class="nav-item <?php echo $this->uri->segment(1) == 'surat_masuk' ? "active" : "" ?>">
			<a class="nav-link" href="<?php echo base_url('surat_masuk'); ?>">
				<i class="far fa-envelope"></i>
				<span>Surat Masuk</span></a>
		</li>
		<!-- Nav Item -->
		<li class="nav-item <?php echo $this->uri->segment(1) == 'surat_keluar' ? "active" : "" ?>">
			<a class="nav-link" href="<?php echo base_url('surat_keluar'); ?>">
				<i class="far fa-envelope"></i>
				<span>Surat Keluar</span></a>
		</li>
		<!-- Nav Item -->
		<li class="nav-item <?php echo $this->uri->segment(1) == 'surat_pindah' ? "active" : "" ?>">
			<a class="nav-link" href="<?php echo base_url('surat_pindah'); ?>">
				<i class="far fa-envelope"></i>
				<span>Surat Keterangan Pindah</span></a>
		</li>
		<!-- Nav Item -->
		<li class="nav-item <?php echo $this->uri->segment(1) == 'surat_pencaker' ? "active" : "" ?>">
			<a class="nav-link" href="<?php echo base_url('surat_pencaker'); ?>">
				<i class="far fa-envelope"></i>
				<span>Surat Keterangan Pencari Kerja</span></a>
		</li>
		<!-- Nav Item -->
		<li class="nav-item <?php echo $this->uri->segment(1) == 'kk' ? "active" : "" ?>">
			<a class="nav-link" href="<?php echo base_url('kk'); ?>">
				<i class="far fa-envelope"></i>
				<span>Kartu Keluarga</span></a>
		</li>
		<!-- Nav Item -->
		<li class="nav-item <?php echo $this->uri->segment(1) == 'proposal' ? "active" : "" ?>">
			<a class="nav-link" href="<?php echo base_url('proposal'); ?>">
				<i class="far fa-envelope"></i>
				<span>Proposal</span></a>
		</li>

		<!-- Nav Item -->
		<li class="nav-item <?php echo $this->uri->segment(1) == 'user' ? "active" : "" ?>">
			<a class="nav-link" href="<?php echo base_url('user'); ?>">
				<i class="fas fa-user"></i>
				<span>User</span></a>
		</li>
	<?php  } ?>

	<!-- Nav Item -->
	<li class="nav-item <?php echo $this->uri->segment(1) == 'disposisi' ? "active" : "" ?>">
		<a class="nav-link" href="<?php echo base_url('disposisi'); ?>">
			<i class="far fa-envelope"></i>
			<span>Disposisi</span></a>
	</li>

	<!-- Nav Item -->
	<li class="nav-item <?php echo $this->uri->segment(1) == 'laporan' ? "active" : "" ?>">
		<a class="nav-link" href="<?php echo base_url('laporan'); ?>">
			<i class="far fa-envelope"></i>
			<span>Laporan</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>