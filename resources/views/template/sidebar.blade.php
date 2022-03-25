<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a class="{{Request::path() == '/' ? 'active-menu' : ''}}" href="/"><i class="fa fa-dashboard"></i>
                    Dashboard</a>
            </li>
            <li>
                <a class="{{Request::path() == 'matkul' ? 'active-menu' : ''}}" href="/matkul"><i
                        class="fa fa-book"></i> Mata Kuliah</a>
            </li>
            <li>
                <a class="{{Request::path() == 'tugas' ? 'active-menu' : ''}}" href="/tugas"><i class="fa fa-tasks"></i>
                    Tugas</a>
            </li>
            <li>
                <a class="{{Request::path() == 'note' ? 'active-menu' : ''}}" href="/note"><i
                        class="fa fa-paperclip"></i> Catatan</a>
            </li>
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
