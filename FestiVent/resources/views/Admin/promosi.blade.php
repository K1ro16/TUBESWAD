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
        <nav id="sidebar">
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
                        <a href="{{ route('admin.dashboard') }}"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-user mr-3"></span> Community</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/event') }}"><span class="fa fa-briefcase mr-3"></span> Events</a>
                    </li>
                    <li class="active">
                        <a href="{{ url('admin/promosi') }}"><span class="fa fa-user mr-3"></span> Promotion</a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}"><span class="fa fa-arrow-left mr-3"></span> Back to Home</a>
                    </li>
                </ul>
                <div class="footer">
                    <p>FestiVent Project</p>
                </div>
            </div>
        </nav>

        <!-- Main content -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h1>Promotion</h1>

            <div class="container mt-5">
                <h2 class="mb-4">Tambah Promosi</h2>
                <form action="{{ route('promosi.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <span class="floating-label">🏷️ Promo Code</span>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul promosi" required>
                    </div>
                    <div class="mb-3">
                        <span class="floating-label">✏️ Description</span>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi promosi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <span class="floating-label">💰 Discount (%)</span>
                        <input type="number" class="form-control" id="diskon" name="diskon" placeholder="Masukkan diskon dalam persen" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan ✨</button>
                </form>
            </div>

            <!-- Looping all data from databse promosi to a table -->
            <div class="container mt-5">
                <h2 class="mb-4">Daftar Promosi</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Promo</th>
                            <th>Deskripsi</th>
                            <th>Diskon</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($promosi as $promo)
                        <tr>
                            <td>{{ $promo->judul }}</td>
                            <td>{{ $promo->deskripsi }}</td>
                            <td>{{ $promo->diskon }}%</td>
                            <td>{{ $promo->tanggal_mulai }}</td>
                            <td>{{ $promo->tanggal_selesai }}</td>
                            <td>
                                <form action="{{ route('promosi.destroy', $promo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                    <!-- add edit button for update data promosi -->
                                    <a href="{{ route('promosi.edit', $promo->id) }}" class="btn btn-primary">Edit</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            

        </div> <!-- End of Content -->
    </div> <!-- End of Wrapper -->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main2.js') }}"></script>
</body>
</html>