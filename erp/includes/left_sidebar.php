<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">
					<nav>
						<!-- start: SEARCH FORM -->
						<div class="search-form">
							<a class="s-open" href="#">
								<i class="ti-search"></i>
							</a>
							<form class="navbar-form" role="search">
								<a class="s-remove" href="#" target=".navbar-form">
									<i class="ti-close"></i>
								</a>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search...">
									<button class="btn search-button" type="submit">
										<!-- <i class="ti-search"></i> -->
									</button>
								</div>
							</form>
						</div>
						<!-- end: SEARCH FORM -->
						<!-- start: MAIN NAVIGATION MENU -->
						<div class="navbar-title">
							<span>Main Navigation</span>
						</div>
						<?php if($_SESSION['sess_user_type'] =='Agent')
								{ ?>
									<ul class="main-navigation-menu">
										<li>
											<a href>
												<div class="item-content">
													<div class="item-media">
														<i class="ti-home"></i>
													</div>
													<div class="item-inner">
														<span class="title"> Dashboard </span>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<div class="item-content">
													<div class="item-media">
														<i class="ti-user"></i>
													</div>
													<div class="item-inner">
														<span class="title">User </span><i class="icon-arrow"></i>
													</div>
												</div>
											</a>
											<ul class="sub-menu">
												<li>
													<a href="change_password.php">
														<span class="title"> Change Password</span>
													</a>
												</li>
												
											</ul>								
										</li>
									<!-- 	<li>
                                <a href="item.php">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-harddrives"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Items
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li> -->
                                
                            <li>
                                <a href="customer.php">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-agenda"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Customer
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>


							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-money"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Sale </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
								<!-- 	<li>
										<a href="estimate-list.php">
											<span class="title"> Estimate </span>
										</a>
									</li> -->
									<li>
										<a href="invoice-list.php">
											<span class="title"> Invoice </span>
										</a>
									</li>
									
								 <!-- 	<li>
                                        <a href="purchase.php">
                                            <span class="title"> purchase </span>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="payment-list.php">
                                            <span class="title"> Payment </span>
                                        </a>
                                    </li> -->
								</ul>
							</li>

													
									</ul>
						<?php 	} else
						if($_SESSION['sess_user_type'] =='MANAGER'  && $_SESSION['sess_user_id'] != 3)
						{

						?>
						<ul class="main-navigation-menu">
							<li>
								<a href="welcome.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-home"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Dashboard </span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title">User </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<!--<li>
										<a href="user_create.php">
											<span class="title"> User Create</span>
										</a>
									</li>
									<li>
										<a href="admin_user_list.php">
											<span class="title"> User List </span>
										</a>
									</li>-->
                                    <li>
                                        <a href="change_password.php">
                                            <span class="title"> Change Password</span>
                                        </a>
                                    </li>
                                       <!--<li>
                                        <a href="group.php">
                                            <span class="title"> Create Group</span>
                                        </a>-->
                                    </li>
									
									
								</ul>								
							</li>
                            <li>
                                <a href="item.php">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-harddrives"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Items
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                                  <li>
                                <a href="vendors">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-agenda"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Vendor
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="customer.php">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-agenda"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Customer
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>


							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-money"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Sale </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="estimate-list.php">
											<span class="title"> Estimate </span>
										</a>
									</li>
									<li>
										<a href="invoice-list.php">
											<span class="title"> Invoice </span>
										</a>
									</li>
                                    <li>
                                        <a href="payment-list.php">
                                            <span class="title"> Payment </span>
                                        </a>
                                    </li>
									  <li>
                                        <a href="purchase.php">
                                            <span class="title"> purchase </span>
                                        </a>
                                    </li>
								</ul>
							</li>
							
							<!-- <li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-money"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Reports </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="reports.php">
											<span class="title"> Report </span>
										</a>
									</li>
									
								</ul>
							</li> -->
								</ul>
						<?php }else if($_SESSION['sess_user_type'] =='Admin' || $_SESSION['sess_user_id'] == 3)
						{
							
						?>
						<ul class="main-navigation-menu">
							<li>
								<a href="welcome.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-home"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Dashboard </span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title">User </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
									<ul class="sub-menu">
									<li>
										<a href="user_create.php">
											<span class="title"> User Create</span>
										</a>
									</li>
									<li>
										<a href="admin_user_list.php">
											<span class="title"> User List </span>
										</a>
									</li>
                                    <li>
                                        <a href="change_password.php">
                                            <span class="title"> Change Password</span>
                                        </a>
                                    </li>
                                       <li>
                                        <a href="group.php">
                                            <span class="title"> Create Group</span>
                                        </a>
                                    </li>
									
									
								</ul>								
							</li>
                            <li>
                                <a href="item.php">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-harddrives"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Items
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                                  <li>
                                <a href="vendors">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-agenda"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Vendor
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
							
                            <li>
                                <a href="customer.php">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-agenda"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Customer
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>


							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-money"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Sale </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								
								<ul class="sub-menu">
									<li>
										<a href="invoice-list.php">
											<span class="title"> Invoice </span>
										</a>
									</li>
									<li>
										<a href="estimate-list.php">
											<span class="title"> Estimate </span>
										</a>
									</li>
									
                                    <li>
                                        <a href="payment-list.php">
                                            <span class="title"> Payment </span>
                                        </a>
                                    </li>
									  <li>
                                        <a href="purchase.php">
                                            <span class="title"> purchase </span>
                                        </a>
                                    </li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-money"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Website Manager </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="contact_query.php">
											<span class="title"> Contact Query </span>
										</a>
									</li>
									<li>
										<a href="subscriber.php">
											<span class="title">Subscriber </span>
										</a>
									</li>
									<li>
										<a href="portfolio.php">
											<span class="title">Portfolio </span>
										</a>
									</li>
									
								</ul>
							</li>
							
							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-money"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Reports </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="reports.php">
											<span class="title"> Report </span>
										</a>
									</li>
									
								</ul>
							</li>
						</ul>

					<?php  
				}else{
					echo "unauthorised access! you have been captured!" ;
				}
				?>
						<!-- end: MAIN NAVIGATION MENU -->
						
					</nav>
				</div>
			</div>