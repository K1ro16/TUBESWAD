<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            @foreach($communities as $community)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $community->image_path) }}" class="card-img-top" alt="{{ $community->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $community->name }}</h5>
                            <p class="card-text">{{ $community->description }}</p>
                            <a href="{{ route('communities.show', $community->id) }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
