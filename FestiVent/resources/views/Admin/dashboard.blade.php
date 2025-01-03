<!doctype html>
<html lang="en">
<head>
    <title>Dashboard Admin</title>
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
                    <li class="active">
                        <a href="{{ route('admin.dashboard') }}"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/communities') }}"><span class="fa fa-user mr-3"></span> Community</a>
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

        <!-- ISI -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h1 class="mb-4">Admin Dashboard</h1>

            <!-- Summary Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Events</h5>
                            <h2 class="card-text">{{ $events->count() }}</h2>
                            <a href="{{ url('admin/event') }}" class="text-white">View Details →</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Communities</h5>
                            <h2 class="card-text">{{ $communities->count() }}</h2>
                            <a href="{{ url('admin/communities') }}" class="text-white">View Details →</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Active Promotions</h5>
                            <h2 class="card-text">{{ $promosi->count() }}</h2>
                            <a href="{{ url('admin/promosi') }}" class="text-white">View Details →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Events -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold">Recent Events</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events->take(5) as $event)
                                <tr>
                                    <td>{{ $event->nama_event }}</td>
                                    <td>{{ date('d M Y', strtotime($event->tanggal)) }}</td>
                                    <td>{{ $event->lokasi }}</td>
                                    <td>
                                        @if(strtotime($event->tanggal) > time())
                                            <span class="badge bg-success">Upcoming</span>
                                        @else
                                            <span class="badge bg-secondary">Past</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Active promo -->
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold">Active Promotions</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Promo Code</th>
                                    <th>Discount</th>
                                    <th>Valid Until</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promosi->take(5) as $promo)
                                <tr>
                                    <td>{{ $promo->judul }}</td>
                                    <td>{{ $promo->diskon }}%</td>
                                    <td>{{ date('d M Y', strtotime($promo->tanggal_selesai)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- ISI -->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main2.js') }}"></script>
</body>
</html>
