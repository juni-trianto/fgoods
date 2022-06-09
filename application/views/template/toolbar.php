<ul class="navbar-nav ml-auto">

                      

                        <!-- Nav Item - Alerts -->
                        

                        <!-- Nav Item - Messages -->
                        
<li class="nav-item dropdown no-arrow ">
                         
                            <!-- Dropdown - Messages -->
                            <div class="nav-link"
                                aria-labelledby="searchDropdown">
								<?php if($this->uri->segment(1)=="transaksi"){ ?>
                                <form class="form-inline mr-auto w-100 navbar-search" action="<?php echo base_url() ; ?>search" method="GET">
								
								<input type="hidden" class="form-control form-control-user" name="jns_trans" id="jns_trans" value="<?php echo strtoupper($this->uri->segment(2));?>">
                                    <div class="input-group">
											
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Transaction Search <?php echo strtoupper($this->uri->segment(2));?>" aria-label="Search" name="txt_cari" id="txt_cari"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
								<?php } ?>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
						<!-- Nav Item - User Information -->
                       

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama') ; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url() ; ?>assets/images/globeindo.1.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url() ; ?>auth/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>