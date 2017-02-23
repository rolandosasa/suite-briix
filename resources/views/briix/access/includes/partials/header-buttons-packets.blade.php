<div class="pull-right mb-10">

    <!--Menu para Administrar los Contratos-->
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.briix.access.packets.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('briix.access.packet.index', trans('menus.briix.access.packets.all')) }}</li>
            
            @permission('manage-packets')
                <li>{{ link_to_route('briix.access.packet.create', trans('menus.briix.access.packets.create')) }}</li>
            @endauth
            <li class="divider"></li>
           
        </ul>
    </div><!--btn group-->

</div><!--pull right-->

<div class="clearfix"></div>
