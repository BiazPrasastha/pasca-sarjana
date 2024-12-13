<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a class="logo logo-dark" href="index.html">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a class="logo logo-light" href="index.html">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover"
            type="button">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('dashboard.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <i class="ri-home-4-line"></i> <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                @can('user-admin')
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('admin.proposal.*') ? 'active' : '' }}"
                            href="{{ route('admin.proposal.index') }}">
                            <i class="ri-file-list-2-line"></i> <span data-key="t-proposal">Pengajuan Proposal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('admin.plagiarism.*') ? 'active' : '' }}"
                            href="{{ route('admin.plagiarism.index') }}">
                            <i class="ri-clipboard-line"></i> <span data-key="t-plagiarism">Plagiasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('admin.theses.*') ? 'active' : '' }}"
                            href="{{ route('admin.theses.index') }}">
                            <i class="ri-profile-line"></i> <span data-key="t-theses">Tesis</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('admin.judiciaries.*') ? 'active' : '' }}"
                            href="{{ route('admin.judiciaries.index') }}">
                            <i class="ri-medal-line"></i> <span data-key="t-judiciaries">Yudisium</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('admin.news.*') ? 'active' : '' }}"
                            href="{{ route('admin.news.index') }}">
                            <i class="ri-newspaper-line"></i> <span data-key="t-news">Berita</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('admin.announcement.*') ? 'active' : '' }}"
                            href="{{ route('admin.announcement.index') }}">
                            <i class="ri-pushpin-line"></i> <span data-key="t-announcement">Pengumuman</span>
                        </a>
                    </li>
                @endcan
                @can('user-student')
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('student.payment.*') ? 'active' : '' }}"
                            href="{{ route('student.payment.index') }}">
                            <i class="ri-bank-card-line"></i> <span data-key="t-payment">Pembayaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('student.theses.*') ? 'active' : '' }}"
                            href="{{ route('student.theses.index') }}">
                            <i class="ri-profile-line"></i> <span data-key="t-theses">Tesis</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('student.plagiarism.*') ? 'active' : '' }}"
                            href="{{ route('student.plagiarism.index') }}">
                            <i class="ri-clipboard-line"></i> <span data-key="t-plagiarism">Plagiasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('student.judiciaries.*') ? 'active' : '' }}"
                            href="{{ route('student.judiciaries.index') }}">
                            <i class="ri-medal-line"></i> <span data-key="t-judiciaries">Yudisium</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link menu-link" data-bs-toggle="collapse" href="#sidebarMultilevel" role="button"
                        aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="ri-share-line"></i> <span data-key="t-multi-level">Multi Level</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" data-key="t-level-1.1" href="#"> Level 1.1 </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" data-key="t-level-1.2"
                                    href="#sidebarAccount" role="button" aria-expanded="false"
                                    aria-controls="sidebarAccount"> Level 1.2
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" data-key="t-level-2.1" href="#">
                                                Level 2.1 </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="collapse" data-key="t-level-2.2"
                                                href="#sidebarCrm" role="button" aria-expanded="false"
                                                aria-controls="sidebarCrm"> Level 2.2
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCrm">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-key="t-level-3.1" href="#">
                                                            Level
                                                            3.1 </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-key="t-level-3.2" href="#">
                                                            Level
                                                            3.2 </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
