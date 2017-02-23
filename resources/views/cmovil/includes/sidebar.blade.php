<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.cmovil.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="{{ trans('strings.cmovil.general.search_placeholder') }}" />
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div><!--input-group-->
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.cmovil.sidebar.general') }}</li>

            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Active::pattern('cmovil/dashboard') }}">
                {{ link_to_route('cmovil.dashboard', trans('menus.cmovil.sidebar.dashboard')) }}
            </li>

            @cmpermission('manage-users')
                <li class="{{ Active::pattern('cmovil/access/*') }}">
                    {{ link_to_route('cmovil.access.user.index', trans('menus.cmovil.access.title')) }}
                </li>
            @endauth


            @cmpermission('manage-enterprises')
                <li class="{{ Active::pattern('cmovil/access/*') }}">
                    {{ link_to_route('cmovil.access.enterprise.index', trans('menus.cmovil.access.title2')) }}
                </li>
            @endauth

            @cmpermission('admin-roles')
                <li class="{{ Active::pattern('cmovil/access/*') }}">
                    {{ link_to_route('cmovil.access.role.index', trans('menus.cmovil.access.title5')) }}
                </li>
            @endauth

            @cmpermission('admin-lines')
                <li class="{{ Active::pattern('cmovil/access/*') }}">
                    {{ link_to_route('cmovil.access.line.index', trans('menus.cmovil.access.title7')) }}
                </li>
            @endauth

        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>