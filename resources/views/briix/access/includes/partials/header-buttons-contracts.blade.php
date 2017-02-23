<div class="pull-right mb-10">

    <!--Menu para Administrar los Contratos-->
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.briix.access.contracts.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('briix.access.contract.index', trans('menus.briix.access.contracts.all')) }}</li>
            
            @permission('manage-contracts')
                <li>{{ link_to_route('briix.access.contract.create', trans('menus.briix.access.contracts.create')) }}</li>
            @endauth
            <li class="divider"></li>
            <li>{{ link_to_route('briix.access.contract.deleted', trans('menus.briix.access.contracts.deleted')) }}</li>
        </ul>
    </div><!--btn group-->

</div><!--pull right-->

<div class="clearfix"></div>
