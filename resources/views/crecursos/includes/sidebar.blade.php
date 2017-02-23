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
				<a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
			</div><!--pull-left-->
		</div><!--user-panel-->

		<!-- search form (Optional) -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="{{ trans('strings.backend.general.search_placeholder') }}" />
				<span class="input-group-btn">
					<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div><!--input-group-->
		</form>
		<!-- /.search form -->

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<li class="header">{{ trans('menus.crecursos.sidebar.general') }}</li>

			<!-- Optionally, you can add icons to the links -->
			<li class="{{ Active::pattern('crecursos/dashboard') }}">
				{{ link_to_route('crecursos.dashboard', trans('menus.crecursos.sidebar.dashboard')) }}
			</li>

			@permission('manage-users')
				<li class="{{ Active::pattern('crecursos/access/*') }}">
					{{ link_to_route('crecursos.access.user.index', trans('menus.crecursos.access.title')) }}
				</li>
			@endauth

			<!-- Administración -->
			<li class="{{ Active::pattern('crecursos/administration*') }} treeview">
				<a href="#">
					<span>{{ trans('menus.crecursos.administration.main') }}</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu {{ Active::pattern('crecursos/administration*', 'menu-open') }}" style="display: none; {{ Active::pattern('crecursos/administration*', 'display: block;') }}">
					<li class="{{ Active::pattern('crecursos/access/administration/enterprises/*') }}">
						<a href="{{route('crecursos.access.enterprise.index')}}">
							<i class="fa  fa-building-o"></i>
							{{ trans('menus.crecursos.administration.dashboard-enterprise') }}
						</a>
					</li>
					<li class="{{ Active::pattern('crecursos/access/administration/department/*') }}">
						<a href="{{route('crecursos.access.department.index')}}">
							<i class="fa fa-archive"></i>
							{{ trans('menus.crecursos.administration.dashboard-department') }}
						</a>
					</li>
						<!-- Competencias y habilidades -->
					<li class="{{ Active::pattern( 'crecursos/access/compettition/*') }}">
						<a href="{{route('crecursos.access.compettition.index')}}">
							<i class="fa fa-signal" aria-hidden="true"></i>
							{{ trans('menus.crecursos.compettition.main')}}
						</a>
					</li>
				</ul>
			</li>

			<!-- Gestión de Recursos Humanos -->
			<li class="{{ Active::pattern('crecursos/humanresources*') }} treeview">
				<a href="#">
					<span>{{ trans('menus.crecursos.humanresources.main') }}</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu {{ Active::pattern('crecursos/humanresources*', 'menu-open') }}" style="display: none; {{ Active::pattern('crecursos/log-viewer*', 'display: block;') }}">

					<li class="{{ Active::pattern('crecursos/humanresources*') }}">
						<a href="#"><i class="fa fa-cogs" aria-hidden="true"></i>
							{{ trans('menus.crecursos.humanresources.dashboard')}}
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>   
						</a>
						<ul class="treeview-menu {{ Active::pattern('crecursos/humanresources*', 'menu-open') }}" style="display: none; {{ Active::pattern('crecursos/humanresources*', 'display: block;') }}">
							<!-- Vacantes -->
							<li class="{{ Active::pattern('crecursos/access/vacancies/*') }}">
								<a href="{{route('crecursos.access.humanresources.index')}}"><i class="fa fa-folder-open" aria-hidden="true"></i>
										{{ trans('menus.crecursos.humanresources.vacancies')}}
								</a>
							</li>
							<!-- Candidato -->
							<li class="{{ Active::pattern('crecursos/access/candicate/*') }}">
								<a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>
									<span>
										{{ trans('menus.crecursos.candidate.main')}}
									</span>    
								</a>
								<ul class="treeview-menu {{ Active::pattern('crecursos/humanresources*', 'menu-open') }}" style="display: none; {{ Active::pattern('crecursos/humanresources*', 'display: block;') }}">
									<li>{{ link_to_route('crecursos.access.candidate.index', trans('menus.crecursos.candidate.all')) }}</li>             
   
									<li>{{ link_to_route('crecursos.access.candidate.create', trans('menus.crecursos.candidate.create')) }}</li> 

									<li>{{  link_to_route('crecursos.access.calendar.index', trans('menus.crecursos.candidate.Calendar')) }}</li> 
								</ul>
							</li>
						</ul>
					</li>
					<li class="{{ Active::pattern('crecursos/access/personal/*') }}">
						<a href="{{route('crecursos.access.personal.index')}}">
							<i class="fa fa-users"></i>
							{{ trans('menus.crecursos.humanresources.dashboard-personal') }}
						</a>
					</li>
					<li class="{{ Active::pattern('crecursos/access/job/*') }}">
						<a href="{{route('crecursos.access.job.index')}}">
							<i class="fa fa-sitemap" aria-hidden="true"></i>
							{{ trans('menus.crecursos.humanresources.dashboard-job') }}
						</a>
					</li>
				</ul>
			</li>

			<!-- Proyectos -->
			<li class="{{ Active::pattern('crecursos/projects*') }} treeview">
				<a href="#">
					<span>{{ trans('menus.crecursos.projects.main') }}</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu {{ Active::pattern('crecursos/projects*', 'menu-open') }}" style="display: none; {{ Active::pattern('crecursos/projects*', 'display: block;') }}">
					<li class="{{ Active::pattern('crecursos/access/project/project/*') }}">
						<a href="{{route('crecursos.access.project.index')}}">
							<i class="fa fa-laptop"></i>
							{{ trans('menus.crecursos.projects.dashboard-project') }}
						</a>
					</li>
					<li class="{{ Active::pattern('crecursos/access/project/advance/*') }}">
						<a href="{{route('crecursos.access.department.index')}}">
							<i class="fa fa-line-chart"></i>
							{{ trans('menus.crecursos.projects.dashboard-advance') }}
						</a>
					</li>
				</ul>
			</li>

		</ul><!-- /.sidebar-menu -->
	</section><!-- /.sidebar -->
</aside>