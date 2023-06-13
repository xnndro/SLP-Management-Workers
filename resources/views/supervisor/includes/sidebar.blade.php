<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.html"
            aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Pekerja</span></li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                    class="hide-menu">Tugas </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="{{route('schedule')}}" class="sidebar-link"><span
                            class="hide-menu"> Jadwal
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="{{route('workers')}}" class="sidebar-link"><span
                            class="hide-menu"> Data Pekerja
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="{{route('tasksReport')}}" class="sidebar-link"><span
                            class="hide-menu"> Laporan Kerja
                        </span></a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
            aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                class="hide-menu">Cuti </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="{{route('requestList')}}" class="sidebar-link"><span
                            class="hide-menu"> Pengajuan Cuti
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="{{route('paidLeaveList')}}" class="sidebar-link"><span
                            class="hide-menu"> Daftar Cuti
                        </span></a>
                </li>
            </ul>
        </li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">LAIN-LAIN</span></li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('supervisorPanduan') }}"
            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                class="hide-menu">Panduan</span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('supervisorInventaris')}}"
            aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                class="hide-menu">Inventaris</span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('keluhan')}}"
            aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span
                class="hide-menu">Keluhan</span></a>
        </li>

    </ul> 
</nav>