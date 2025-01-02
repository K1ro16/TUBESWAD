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
                    <li class="active">
                        <a href="#"><span class="fa fa-user mr-3"></span> Community</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/event') }}"><span class="fa fa-briefcase mr-3"></span> Events</a>
                    </li>
                    <li>
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
            <h1>Dashboard</h1>

            <div class="card shadow p-4 border-0 rounded">
                <h4 class="mb-4 text-dark fw-bold">List of Communities</h4>

                <!-- Export XLS Button -->
                <a href="{{ route('communities.export') }}" class="btn btn-success mb-3">
                    <i class="fa fa-file-excel-o"></i> Export to XLS
                </a>

                <table class="table table-hover align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Nama Komunitas</th>
                            <th>Kategori</th>
                            <th>Asal Kota</th>
                            <th>Deskripsi</th>
                            <th>Logo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($communities as $key => $community)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $community->name }}</td>
                                <td>{{ $community->category }}</td>
                                <td>{{ $community->city }}</td>
                                <td>{{ $community->description }}</td>
                                <td>
                                    @if ($community->image_path)
                                    <img src="{{ asset('storage/' . $community->image_path) }}" alt="Logo" width="50">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('communities.edit', $community->id) }}" class="btn btn-warning btn-sm me-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('communities.destroy', $community->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">No communities found.</td>
                            </tr>
                        @endforelse
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
