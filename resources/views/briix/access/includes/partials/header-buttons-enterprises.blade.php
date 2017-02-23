<div class="pull-right mb-10">
    
    <!--Menu para Administrar Empresas-->
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.briix.access.enterprises.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('briix.access.enterprise.index', trans('menus.briix.access.enterprises.all')) }}</li>
            
            @permission('manage-enterprises')
                <li>{{ link_to_route('briix.access.enterprise.create', trans('menus.briix.access.enterprises.create')) }}</li>
            @endauth
            <li class="divider"></li>
            <li>{{ link_to_route('briix.access.enterprise.deleted', trans('menus.briix.access.enterprises.deleted')) }}</li>
        </ul>
    </div><!--btn group-->

</div><!--pull right-->

<div class="clearfix"></div>
