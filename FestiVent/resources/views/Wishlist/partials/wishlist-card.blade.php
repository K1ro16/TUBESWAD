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
        
        <!-- Group Selection -->
        @if(isset($groups))
            <form action="{{ route('wishlist.moveToGroup', $item->id) }}" method="POST" class="mb-2">
                @csrf
                <div class="input-group">
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
        
        <!-- Remove Button -->
        <form action="{{ route('wishlist.remove', $item->event->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i> Remove from Wishlist
            </button>
        </form>
    </div>
</div> 