<header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body border-top-0 bg-dark box-shadow-none">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
                            <a href="{{ route('frontend.home') }}">
                                <img alt="Porto" width="212" height="60"
                                     src="{{ asset('assets/frontend/img/gilisnorkeling-light01-01.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
                                        <li>
                                            <a href="{{ route('frontend.home') }}"
                                               class="">
                                                Home
                                            </a>

                                        </li>
                                        <li>
                                            <a href="{{ route('frontend.home') }}/#about-us" >
                                                About Us
                                            </a>

                                        </li>
                                        <li>
                                            <a href="{{ route('frontend.gallery') }}">
                                                Gallery
                                            </a>

                                        </li>

                                        <li>
                                            <a href="{{ route('frontend.faq') }}">
                                                FAQs
                                            </a>

                                        </li>

                                    </ul>
                                </nav>
                            </div>
                            <!--div class="actions">
                                <a class="btn btn-secondary" href="{{ route('frontend.booking.index') }}"><b>Book Now</b></a>
                            </div-->

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

