<div class="pull-right mb-10">
    <!--Menu para Administrar los Roles-->
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.cmovil.access.roles.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('cmovil.access.role.index', trans('menus.cmovil.access.roles.all')) }}</li>

            @permission('manage-roles')
                <li>{{ link_to_route('cmovil.access.role.create', trans('menus.cmovil.access.roles.create')) }}</li>
            @endauth
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
