<div class="card h-100">
    <!-- nampilin gambar poster event -->
    @if($item->event->poster)
        <img src="{{ Storage::url($item->event->poster) }}" class="card-img-top" alt="{{ $item->event->nama_event }}">
    @else
        <!-- nampilin gambar placeholder jika tidak ada poster -->
        <img src="/api/placeholder/400/200" class="card-img-top" alt="No Image Available">
    @endif
    
    <!-- Bikin card body -->
    <div class="card-body">
        <!-- Judul event -->
        <h5 class="card-title">{{ $item->event->nama_event }}</h5>
        <!-- Deskripsi event -->
        <p class="card-text">{{ Str::limit($item->event->deskripsi, 100) }}</p>
        
        <!-- Informasi detail event -->
        <div class="mb-3">
            <small class="text-muted">
                <i class="bi bi-geo-alt"></i> {{ $item->event->lokasi }}<br>
                <i class="bi bi-calendar"></i> {{ $item->event->tanggal }}<br>
                <i class="bi bi-clock"></i> {{ $item->event->waktu }}<br>
                <i class="bi bi-cash"></i> Rp {{ number_format($item->event->harga, 0, ',', '.') }}
            </small>
        </div>
        
        <!-- nampilin group -->
        @if(isset($groups))
            <form action="{{ route('wishlist.moveToGroup', $item->id) }}" method="POST" class="mb-2">
                @csrf
                <div class="input-group">
                    <!-- Dropdown milih grup -->
                    <select name="group_id" class="form-select">
                        <option value="">Select Group</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-outline-secondary">Move</button>
                </div>
            </form>
        @endif
        
        <!-- button hapus wishlist -->
        <form action="{{ route('wishlist.remove', $item->event->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this item?');">
                <i class="bi bi-trash"></i> Remove from Wishlist
            </button>
        </form>
    </div>
</div> 