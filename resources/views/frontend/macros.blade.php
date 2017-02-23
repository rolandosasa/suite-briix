@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('labels.frontend.macros.macro_examples') }}</div>

                <div class="panel-body">
                    <p>Bienvenidos a briix estos son los productos que ofrece la suite de aplicaciones briix.</p>
                </div>

                

            </div><!-- panel -->

            <div class="row">
                  <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <img border="0" alt="" src="img/seguimiento.png" >
                      <div class="caption">
                        <h3>Sistema de seguimiento y control</h3>
                        <p>Descripción del proyecto</p>
                        <p>
                          <a href="#" class="btn btn-primary" role="button">Probar Demo</a>
                          <a href="http://seva.com.mx/" class="btn btn-default" role="button">Ir al sitio original</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

        </div><!-- col-md-10 -->

    </div><!-- row -->

@endsection