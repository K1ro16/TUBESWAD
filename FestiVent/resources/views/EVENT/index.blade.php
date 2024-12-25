<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard Event</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style_dash.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
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
                        <a href="{{ route('communities.index') }}"><span class="fa fa-user mr-3"></span> Community</a>
                    </li>
                    <li>
                        <a href="{{ route('communities.create') }}"><span class="fa fa-sticky-note mr-3"></span> Add Community</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('event.index') }}"><span class="fa fa-briefcase mr-3"></span> Events</a>
                    </li>
                    <li>
                        <a href="{{ route('event.create') }}"><span class="fa fa-paper-plane mr-3"></span> Add Event</a>
                    </li>
                </ul>

                <div class="footer">
                    <p>FestiVent Project</p>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold">Daftar Event</h1>
                    <a href="{{ route('event.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Tambah Event
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($events as $event)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            @if($event->poster)
                                <img src="{{ Storage::url($event->poster) }}" alt="{{ $event->nama_event }}" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-4">
                                <h2 class="text-xl font-bold mb-2">{{ $event->nama_event }}</h2>
                                <p class="text-gray-600 mb-2">{{ Str::limit($event->deskripsi, 100) }}</p>
                                <div class="text-sm text-gray-500">
                                    <p>📍 {{ $event->lokasi }}</p>
                                    <p>📅 {{ $event->tanggal }}</p>
                                    <p>⏰ {{ $event->waktu }}</p>
                                    <p>💰 Rp {{ number_format($event->harga, 0, ',', '.') }}</p>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <a href="{{ route('event.show', $event->id) }}" class="text-blue-500 hover:text-blue-700">
                                        Detail
                                    </a>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('event.edit', $event->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                            Edit
                                        </a>
                                        <form action="{{ route('event.destroy', $event->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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