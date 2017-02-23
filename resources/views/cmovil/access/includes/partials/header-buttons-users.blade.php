<div class="pull-right mb-10">
    
    <!--Menu para Administrar los Usuarios-->
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.cmovil.access.users.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('cmovil.access.user.index', trans('menus.cmovil.access.users.all')) }}</li>

            @permission('manage-users')
                <li>{{ link_to_route('cmovil.access.user.create', trans('menus.cmovil.access.users.create')) }}</li>
            @endauth

            <li class="divider"></li>
            <li>{{ link_to_route('cmovil.access.user.deactivated', trans('menus.cmovil.access.users.deactivated')) }}</li>
            <li>{{ link_to_route('cmovil.access.user.deleted', trans('menus.cmovil.access.users.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
    
</div><!--pull right-->

<div class="clearfix"></div>
