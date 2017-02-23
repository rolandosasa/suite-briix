<div class="pull-right mb-10">
    
    <!--Menu para Administrar Lineas-->
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.cmovil.access.lines.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('cmovil.access.line.index', trans('menus.cmovil.access.lines.all')) }}</li>
            
            @permission('manage-lines')
                <li>{{ link_to_route('cmovil.access.line.create', trans('menus.cmovil.access.lines.create')) }}</li>
            @endauth
            <li class="divider"></li>
            <li>{{ link_to_route('cmovil.access.line.deleted', trans('menus.cmovil.access.lines.deleted')) }}</li>
        </ul>
    </div><!--btn group-->

</div><!--pull right-->

<div class="clearfix"></div>
