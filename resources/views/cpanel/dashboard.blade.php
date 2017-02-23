@extends('frontend.layouts.master')

@section('content')
    <div class="row">

       
        
        @foreach ( Auth::user()->enterprise->contracts as $contract)
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-database"></i> Base de Datos Asignada
                    </div>
                    <div class="panel-body">
                        {{$contract->database}}
                        {{Auth::user()->id}}
                    </div>
                </div>
            </div>
        @endforeach 
        @packet('briix')
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-home"></i> Briix activado
                    </div>

                    <div class="panel-body">
                        Usted puede entrara ver el modulo briix
                        
                                <li>{{ link_to_route('briix.dashboard', trans('navs.frontend.user.administration')) }}</li>
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth
         <div class="col-md-10 col-md-offset-1">
        @packet('crecursos')
                <div class="col-md-6">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-home"></i> Crecursos activado
                        </div>

                        <div class="panel-body">
                            Usted puede entrara ver el modulo Crecursos
                                <li>{{ link_to_route('crecursos.dashboard', trans('navs.frontend.user.administration')) }}</li>
                        </div>
                    </div><!-- panel -->

                </div><!-- col-md-10 -->
            @endauth
            @packet('cmovil')
                <div class="col-md-6">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-home"></i> Cmovil activado
                        </div>

                        <div class="panel-body">
                            Usted puede entrara ver el modulo Cmovil
                                <li>{{ link_to_route('cmovil.dashboard', trans('navs.frontend.user.administration')) }}</li>
                        </div>
                    </div><!-- panel -->

                </div><!-- col-md-10 -->
            @endauth
        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop