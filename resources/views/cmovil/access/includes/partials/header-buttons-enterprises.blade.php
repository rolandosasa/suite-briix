<div class="pull-right mb-10">
    
    <!--Menu para Administrar Empresas-->
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.cmovil.access.enterprises.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('cmovil.access.enterprise.index', trans('menus.cmovil.access.enterprises.all')) }}</li>
            
            @permission('manage-enterprises')
                <li>{{ link_to_route('cmovil.access.enterprise.create', trans('menus.cmovil.access.enterprises.create')) }}</li>
            @endauth
            <li class="divider"></li>
            <li>{{ link_to_route('cmovil.access.enterprise.deleted', trans('menus.cmovil.access.enterprises.deleted')) }}</li>
        </ul>
    </div><!--btn group-->

</div><!--pull right-->

<div class="clearfix"></div>
