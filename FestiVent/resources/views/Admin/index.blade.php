<!doctype html>
<html lang="en">
  <head>
  	<title>Dashboard Community</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style_dash.css') }}">


  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
            <div class="p-4">
		  		<h1><a href="#" class="logo">FestiVent</a></h1>
                  <ul class="list-unstyled components mb-5">
                    <li>
                      <a href="{{ route('home') }}"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('communities.index') }}"><span class="fa fa-user mr-3"></span> Community</a>
                    </li>
                    <li>
                        <a href="{{ route('communities.create') }}"><span class="fa fa-sticky-note mr-3"></span> Add Community</a>
                    </li>
                    <li>
                        <a href="{{ route('event.index') }}"><span class="fa fa-briefcase mr-3"></span> Events</a>
                    </li>
                    <li>
                        <a href="{{ route('event.create') }}"><span class="fa fa-paper-plane mr-3"></span> Add Event</a>
                    </li>
                  </ul>

                  <div class="footer">
                    <p>
                        FestiVent Project
                    </p>
                </div>

        </div>
    	</nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5 ml-5">
            <h2 class="mb-4"><span style="font-weight: bold; font-style: italic;">All Community</span></h2>
            <p>Community System Management</p>

            <!-- Tabel Komunitas -->
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-striped">
                        {{-- Tabel Title --}}
                        <div class="text-left">
                            <h5 class="card-title">Community List</h5>
                        </div>
                        {{-- Button for add data mahasiswa --}}
                        <div class="text-right mb-3">
                            <a href="{{ route('communities.create') }}" class="btn btn-primary">New Community</a>
                        </div>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Komunitas</th>
                                <th>Asal Kota</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Looping data komunitas --}}
                            @php
                                $communities = App\Models\Community::all();
                            @endphp
                
                            @foreach ($communities as $community)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $community->nama_community }}</td>
                                <td>{{ $community->asal }}</td>
                                <td>{{ $community->deskripsi }}</td>
                                <td>
                                    <img src="{{ asset($community->gambar) }}" alt="{{ $community->nama_community }}" class="img-thumbnail" style="max-width: 100px; height: auto;">
                                </td>
                                <td>{{ $community->kategori }}</td>
                                <td>
                                    <a href="{{ route('communities.edit', $community->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('communities.destroy', $community->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus komunitas ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
            </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main2.js') }}"></script>
  </body>
</html>