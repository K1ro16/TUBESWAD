<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Wishlist - FestiVent</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
</head>

<body>
  <!-- Header -->
  <header class="bg-light py-3 mb-4">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="h4 mb-0">My Wishlist</h1>
        <a href="{{ route('home') }}" class="btn btn-outline-primary">
          <i class="bi bi-arrow-left"></i> Back to Home
        </a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
      @forelse($wishlist_items as $item)
        <div class="col">
          <div class="card h-100">
            @if($item->event->poster)
              <img src="{{ Storage::url($item->event->poster) }}" class="card-img-top" alt="{{ $item->event->nama_event }}">
            @else
              <img src="/api/placeholder/400/200" class="card-img-top" alt="No Image Available">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $item->event->nama_event }}</h5>
              <p class="card-text">{{ Str::limit($item->event->deskripsi, 100) }}</p>
              
              <div class="mb-3">
                <small class="text-muted">
                  <i class="bi bi-geo-alt"></i> {{ $item->event->lokasi }}<br>
                  <i class="bi bi-calendar"></i> {{ $item->event->tanggal }}<br>
                  <i class="bi bi-clock"></i> {{ $item->event->waktu }}<br>
                  <i class="bi bi-cash"></i> Rp {{ number_format($item->event->harga, 0, ',', '.') }}
                </small>
              </div>
              
              <form action="{{ route('wishlist.remove', $item->event->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash"></i> Remove from Wishlist
                </button>
              </form>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <div class="alert alert-info text-center">
            Your wishlist is empty. Browse events to add some!
          </div>
        </div>
      @endforelse
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>