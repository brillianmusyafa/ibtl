<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><i class="fa fa-home"></i></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bidang <span class="caret"></span></a>
					
					<ul class="dropdown-menu">
						<li><a href="{{url('daftar',1)}}">BAPPEDA</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BPKAD <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{url('daftar',2)}}">Anggaran</a></li>
								<li><a href="{{url('daftar',3)}}">Bid Perbendaharaan Akuntansi</a></li>
								<li><a href="{{url('daftar',4)}}">Bid Aset Daerah</a></li>
							</ul>
						</li>
						<li><a href="{{url('daftar',5)}}">Inspektorat</a></li>
						<li><a href="{{url('daftar',6)}}">Bagian Pengadaan</a></li>
						<li><a href="{{url('daftar',7)}}">DISPERMADES</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bagian Keuangan <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{url('daftar',8)}}">SSH</a></li>
								<li><a href="{{url('daftar',9)}}">ASB</a></li>
							</ul>
						</li>
					</ul>
				</li>
				

				<li><a href="{{url('perpustakaan_keuangan_daerah')}}">Perpustakaan Keuangan Daerah</a></li>
				<li><a href="{{url('apbd')}}">APBD</a></li>
				<li><a href="{{url('daftar_pertanyaan')}}">Daftar Pertanyaan</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href='{{url("login")}}'>Login</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>


