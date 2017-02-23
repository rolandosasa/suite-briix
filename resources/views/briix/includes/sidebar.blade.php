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
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.briix.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="{{ trans('strings.briix.general.search_placeholder') }}" />
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div><!--input-group-->
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.briix.sidebar.general') }}</li>

            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Active::pattern('briix/dashboard') }}">
                {{ link_to_route('briix.dashboard', trans('menus.briix.sidebar.dashboard')) }}
            </li>

            @permission('manage-users')
                <li class="{{ Active::pattern('briix/access/*') }}">
                    {{ link_to_route('briix.access.user.index', trans('menus.briix.access.title')) }}
                </li>
            @endauth


            @permission('manage-enterprises')
                <li class="{{ Active::pattern('briix/access/*') }}">
                    {{ link_to_route('briix.access.enterprise.index', trans('menus.briix.access.title2')) }}
                </li>
            @endauth

            @permission('manage-contracts')
                <li class="{{ Active::pattern('briix/access/*') }}">
                    {{ link_to_route('briix.access.contract.index', trans('menus.briix.access.title3')) }}
                </li>
            @endauth

            @permission('manage-rateplans')
                <li class="{{ Active::pattern('briix/access/*') }}">
                    {{ link_to_route('briix.access.ratePlan.index', trans('menus.briix.access.title4')) }}
                </li>
            @endauth

            @permission('manage-rateplans')
                <li class="{{ Active::pattern('briix/access/*') }}">
                    {{ link_to_route('briix.access.discountPlan.index', trans('menus.briix.access.discountPlans.main')) }}
                </li>
            @endauth

            @permission('manage-roles')
                <li class="{{ Active::pattern('briix/access/*') }}">
                    {{ link_to_route('briix.access.role.index', trans('menus.briix.access.title5')) }}
                </li>
            @endauth

            @permission('manage-packets')
                <li class="{{ Active::pattern('briix/access/*') }}">
                    {{ link_to_route('briix.access.packet.index', trans('menus.briix.access.title6')) }}
                </li>
            @endauth

            <li class="{{ Active::pattern('briix/log-viewer*') }} treeview">
                <a href="#">
                    <span>{{ trans('menus.briix.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('briix/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('briix/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('briix/log-viewer') }}">
                        {{ link_to('briix/log-viewer', trans('menus.briix.log-viewer.dashboard')) }}
                    </li>
                    <li class="{{ Active::pattern('briix/log-viewer/logs') }}">
                        {{ link_to('briix/log-viewer/logs', trans('menus.briix.log-viewer.logs')) }}
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>