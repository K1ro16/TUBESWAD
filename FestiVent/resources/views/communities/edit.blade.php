<!doctype html>
<html lang="en">
  <head>
  	<title>Edit Community</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
                    <li>
                        <a href="{{ route('communities.index') }}"><span class="fa fa-user mr-3"></span> Communities</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('communities.create') }}"><span class="fa fa-sticky-note mr-3"></span> Add Community</a>
                    </li>
                    <li>
                        <a href="{{ route('eventreq.index') }}"><span class="fa fa-briefcase mr-3"></span> Events</a>
                    </li>
                    <li>
                        <a href="{{ route('eventreq.create') }}"><span class="fa fa-paper-plane mr-3"></span> Add Event</a>
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
        <div id="content" class="p-4 p-md-5 pt-5  ml-5">
            <h2 class="mb-4">Menu, <span style="font-weight: bold; font-style: italic;">Add Community</span></h2>
            <p>Community System Management</p>

            {{-- Form Input  --}}
            <div class="container-md mt-5 border rounded-3 p-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                <form class="row g-3" method="POST" action="{{ route('communities.update', $community->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h3 class="mb-2">Edit Data</h3>
                    <div class="col-12">
                      <label for="nama_community" class="form-label">Nama Komunitas</label>
                      <input type="text" class="form-control border" id="nama_community" name="nama_community" value="{{ $community->nama_community }}">
                    </div>
                    <div class="col-md-6">
                      <label for="asal" class="form-label">Asal Kota</label>
                      <input type="text" class="form-control border" id="asal" name="asal" value="{{ $community->asal }}">
                    </div>
                    <div class="col-md-6">
                      <label for="kategori" class="form-label">Kategori</label>
                      <select id="kategori" name="kategori" class="form-select border">
                        <option disabled>Pilih...</option>
                        <option value="Live Show" {{ $community->kategori == 'Live Show' ? 'selected' : '' }}>Live Show</option>
                        <option value="Music" {{ $community->kategori == 'Music' ? 'selected' : '' }}>Music</option>
                        <option value="Sport" {{ $community->kategori == 'Sport' ? 'selected' : '' }}>Sport</option>
                        <option value="Festival" {{ $community->kategori == 'Festival' ? 'selected' : '' }}>Festival</option>
                        <option value="Lainnya" {{ $community->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>                    
                    </div>
                    <div class="col-md-6">
                      <label for="deskripsi" class="form-label">Deskripsi Komunitas</label>
                      <input type="text" class="form-control border" id="deskripsi" name="deskripsi" value="{{ $community->deskripsi }}">
                    </div>
                    <div class="col-md-6">
                        <label for="gambar" class="form-label">Gambar/Logo</label>
                        <input type="file" class="form-control border" id="gambar" name="gambar">
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary mt-5">Update</button>
                    </div>
                </form>
            </div>
                
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>