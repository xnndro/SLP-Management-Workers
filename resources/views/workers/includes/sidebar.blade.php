<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.html"
            aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                class="hide-menu">Dasbor</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Pekerja</span></li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                    class="hide-menu">Tugas </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="{{route('scheduleWorkers')}}" class="sidebar-link"><span
                            class="hide-menu"> Jadwal
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="{{route('tasks')}}" class="sidebar-link"><span
                            class="hide-menu"> Laporan Kerja
                        </span></a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('pengajuanCuti')}}"
                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                    class="hide-menu">Pengajuan Cuti</span></a>
        </li>

        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">LAIN-LAIN</span></li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('workersPanduan') }}"
                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                    class="hide-menu">Panduan</span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('workersInventaris') }}"
                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                    class="hide-menu">Inventaris</span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span
                    class="hide-menu">Keluhan </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="{{route('keluhanPelaporan')}}" class="sidebar-link"><span
                            class="hide-menu"> Laporan
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="{{route('keluhanPenanganan')}}" class="sidebar-link"><span
                            class="hide-menu"> Penanganan
                        </span></a>
                </li>
            </ul>
        </li>

    </ul> 
</nav>