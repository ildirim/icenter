<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li>
				<a href="{{ route('homeslider.index') }}"><i class="fa fa-circle nav_icon"></i>Ana səhifə</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-user nav_icon"></i>Haqqımızda<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ route('commoninfo.index') }}">Ümumi məlumat</a>
					</li>
					<li>
						<a href="{{ route('directories.index') }}">Rəhbərlik</a>
					</li>
					<li>
						<a href="{{ route('structures.index') }}">Struktur</a>
					</li>
					<li>
						<a href="{{ route('partners.index') }}">Partnyor</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
			<li>
				<a href="#"><i class="fa fa-laptop nav_icon"></i>Xidmətlər<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ route('index', 'asan') }}">Asan kommunal</a>
					</li>
					<li>
						<a href="{{ route('index', 'telim') }}">Təlimlər ve kurslar</a>
					</li>
					<li>
						<a href="{{ route('index', 'seyyar') }}">Səyyar asan xidmət</a>
					</li>
					<li>
						<a href="{{ route('index', 'it') }}">IT xidmətlər</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
			<li>
				<a href="#"><i class="fa fa-cog nav_icon"></i>Məhsullar<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ route('mediaIndex', 'pay') }}">ASAN ödəniş</a>
					</li>
					<li>
						<a href="{{ route('mediaIndex', 'radio') }}">ASAN radio</a>
					</li>
					<li>
						<a href="{{ route('mediaIndex', 'visa') }}">ASAN viza</a>
					</li>
					<li>
						<a href="{{ route('mediaIndex', 'electron') }}">Elektron növbə sistemi</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
			<li>
				<a href="{{ route('news.index') }}"><i class="fa fa-align-justify nav_icon"></i>Xəbərlər</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-check-square-o nav_icon"></i>WSA<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ route('contentAboutContextIndex', 'about') }}">WSA  haqqında</a>
					</li>
					<li>
						<a href="{{ route('contentAboutContextIndex', 'context') }}">WSA kontekst</a>
					</li>
					<li>
						<a href="{{ route('priPartTarIndex', 'price') }}">Qiymətləndirmə prosesi</a>
					</li>
					<li>
						<a href="{{ route('priPartTarIndex', 'partner') }}">iCenter ilə  əməkdaşlıq</a>
					</li>
					<li>
						<a href="{{ route('priPartTarIndex', 'target') }}">WSA-ın hədəfləri</a>
					</li>
					<li>
						<a href="{{ route('gallery.index') }}">Qalereya</a>
					</li>
					<li>
						<a href="{{ route('priPartTarIndex', 'global') }}">WSA qlobal tərəfdaşlıq</a>
					</li>
					<li>
						<a href="{{ route('priPartTarIndex', 'rule') }}">WSA qaydalar və şərtlər</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>