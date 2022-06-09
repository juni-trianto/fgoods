<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-left justify-content-left" href="index.html">
		<div class="sidebar-brand-icon">

        </div>
        <div class="sidebar-brand-text mx-3"><h5><b>WHF FGOODS</b></h5></div>
	</a>


	<!-- Divider -->
	<hr class="sidebar-divider my-0">
		<!-- Nav Item - Dashboard -->
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ; ?>dashboard">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span>
			</a>
		</li>


	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item <?php if($this->uri->segment(1)=="divisi" or $this->uri->segment(1)=="material" or $this->uri->segment(1)=="user"){echo "active";} ?>">
<?php
			if($this->session->userdata('level') == "002" or $this->session->userdata('level') == "001" )
			{
?>
                <a class="nav-link <?php if($this->uri->segment(1)!="divisi" && $this->uri->segment(1)!="material" && $this->uri->segment(1)!="user"){echo "collapsed";} ?> " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i> <span>Master Data</span>
                </a>
	
                <div id="collapseTwo" class="collapse  <?php if($this->uri->segment(1)=="divisi" or $this->uri->segment(1)=="material" or $this->uri->segment(1)=="user"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item <?php if($this->uri->segment(1)=="divisi"){echo "active";}?>" href="<?php echo base_url() ; ?>divisi">Division</a>
						<?php
						if($this->session->userdata('level') == "001")
						{
						?>
							<a class="collapse-item <?php if($this->uri->segment(1)=="material"){echo "active";}?>" href="<?php echo base_url() ; ?>material">Material</a>
							<a class="collapse-item <?php if($this->uri->segment(1)=="user"){echo "active";}?>" href="<?php echo base_url() ; ?>user">User</a>

						<?php
						}else
							if($this->session->userdata('level') == "002" )
							{
							?>
								<a class="collapse-item <?php if($this->uri->segment(1)=="material"){echo "active";}?>" href="<?php echo base_url() ; ?>material">Material</a>

							<?php
							}
							
                       ?>
                    </div>

                </div>
<?php
			}
?>
        </li>

	<!-- Nav Item - Utilities Collapse Menu -->
		<li class="nav-item <?php if($this->uri->segment(1)=="transaksi"){echo "active";} ?>"> 
<?php
			if($this->session->userdata('level') == "003" )
			{
				if( $this->session->userdata('in') == "Ya" or 
					$this->session->userdata('out') == "Ya" or 
					$this->session->userdata('ng') == "Ya" or
					$this->session->userdata('semua') == "Ya")
					{
?>
						<a class="nav-link <?php if($this->uri->segment(1)!="transaksi"){echo "collapsed";}?>" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
							<i class="fas fa-fw fa-book"></i>
							<span>Transaction</span>
						</a>
						<div id="transaksi" class="collapse <?php if($this->uri->segment(1)=="transaksi"){echo "show";} ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item <?php if($this->uri->segment(2)=="Input_po"){echo "active";} ?>" href="<?php echo base_url();?>transaksi/Input_po">Input PO</a>
								<?php
								
								if($this->session->userdata('in') == "Ya" ) 
										{
									?>
											<a class="collapse-item <?php if($this->uri->segment(2)=="in"){echo "active";} ?>" href="<?php echo base_url();?>transaksi/in">In</a>
									<?php
										}
									?>
									<?php 
										if($this->session->userdata('out') == "Ya" ) 
										{
									?>
											<a class="collapse-item <?php if($this->uri->segment(2)=="out"){echo "active";} ?>" href="<?php echo base_url();?>transaksi/out">Out</a>
									<?php
										}
									?>
									<?php 
										if($this->session->userdata('ng') == "Ya" ) 
										{
									?>
											<a class="collapse-item <?php if($this->uri->segment(2)=="ng"){echo "active";} ?>" href="<?php echo base_url();?>transaksi/ng">NG</a>
									<?php
										}
									?>
									
							</div>
						</div>
						<?php 
						}else { }
					}else
						{
							
				?>
							<a class="nav-link <?php if($this->uri->segment(1)!="transaksi"){echo "collapsed";}?>" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
								<i class="fas fa-fw fa-book"></i>
								<span>Transaction</span>

							</a>
							 <div id="transaksi" class="collapse  <?php if($this->uri->segment(1)=="transaksi"){echo "show";} ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">

								<div class="bg-white py-2 collapse-inner rounded">
									<a class="collapse-item <?php if($this->uri->segment(2)=="Input_po"){echo "active";} ?>" href="<?php echo base_url() ; ?>transaksi/Input_po">Input PO</a>
									<a class="collapse-item <?php if($this->uri->segment(2)=="in"){echo "active";} ?>" href="<?php echo base_url() ; ?>transaksi/in">In</a>
									<a class="collapse-item <?php if($this->uri->segment(2)=="out"){echo "active";} ?>" href="<?php echo base_url() ; ?>transaksi/out">Out</a>
									<a class="collapse-item <?php if($this->uri->segment(2)=="ng"){echo "active";} ?>" href="<?php echo base_url() ; ?>transaksi/ng">NG</a>

		
								</div>

							</div>
				<?php
						}
				?>
              

            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=="laporan"){echo "active";} ?>">
               
<?php
					if($this->session->userdata('level') == "003" )
					{
						if($this->session->userdata('item') == "Ya" or $this->session->userdata('divisi') == "Ya" or $this->session->userdata('mix') == "Ya")
						{
				?>
				<a class="nav-link <?php if($this->uri->segment(1)!="laporan"){echo "collapsed";}?>" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="laporan">
							<i class="fas fa-fw fa-book"></i>
							<span>Report</span>
						</a>
							
							 	<div id="laporan" class="collapse <?php if($this->uri->segment(1)=="laporan"){echo "show";} ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
								
								<?php
								if($this->session->userdata('item') == "Ya" ) 
										{
									?>
											<a class="collapse-item <?php if($this->uri->segment(2)=="item"){echo "active";} ?>" href="<?php echo base_url();?>laporan/item">Item</a>
									<?php
										}
									?>
									<?php 
										if($this->session->userdata('divisi') == "Ya" ) 
										{
									?>
											<a class="collapse-item <?php if($this->uri->segment(2)=="divisi"){echo "active";} ?>" href="<?php echo base_url();?>laporan/divisi">Division</a>
									<?php
										}
									?>
									<?php 
										if($this->session->userdata('mix') == "Ya" ) 
										{
									?>
											<a class="collapse-item <?php if($this->uri->segment(2)=="mix"){echo "active";} ?>" href="<?php echo base_url();?>laporan/mix">Mix</a>
									<?php
										}
									?>
									
								</div>

							</div>
						<?php 
						}else
						{
							
						}
					}else
						{
							
				?>
							<a class="nav-link <?php if($this->uri->segment(1)!="laporan"){echo "collapsed";}?>" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="Laporan">
								<i class="fas fa-fw fa-book"></i>
								<span>Report</span>
							</a>
							  <div id="laporan" class="collapse <?php if($this->uri->segment(1)=="laporan"){echo "show";} ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">

								<div class="bg-white py-2 collapse-inner rounded">

									<a class="collapse-item <?php if($this->uri->segment(2)=="item"){echo "active";} ?>" href="<?php echo base_url() ; ?>laporan/item">Item</a>
									<a class="collapse-item <?php if($this->uri->segment(2)=="divisi"){echo "active";}?>" href="<?php echo base_url() ; ?>laporan/divisi">Division</a>

									<a class="collapse-item <?php if($this->uri->segment(2)=="mix"){echo "active";}?>" href="<?php echo base_url() ; ?>laporan/mix">Mix</a>

								</div>

							</div>
				<?php
						}
				?>
              

            </li>



        

            <!-- Nav Item - Charts -->

            <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url() ; ?>auth/logout">

                    <i class="fas fa-fw fa-lock"></i>

                    <span>Logout</span></a>

            </li>





            <!-- Divider -->

            <hr class="sidebar-divider d-none d-md-block">



            <!-- Sidebar Toggler (Sidebar) -->

            <div class="text-center d-none d-md-inline">

                <button class="rounded-circle border-0" id="sidebarToggle"></button>

            </div>



        </ul>
		
	