<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* Previous styles remain the same */
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .fun-card {
            background: white;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }
        .fun-card:hover {
            transform: translateY(-5px);
        }
        .form-control, .form-select {
            border-radius: 12px;
            border: 2px solid #e0e0e0;
            padding: 12px;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 15px rgba(13, 110, 253, 0.2);
            transform: scale(1.01);
        }
        .floating-label {
            position: absolute;
            pointer-events: none;
            left: 24px;
            top: 12px;
            transition: 0.2s ease all;
            color: #6c757d;
        }
        .form-control:focus ~ .floating-label,
        .form-control:not(:placeholder-shown) ~ .floating-label {
            transform: translateY(-20px) scale(0.8);
            color: #0d6efd;
            background: white;
            padding: 0 5px;
        }
        .submit-btn {
            border: none;
            padding: 12px 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        /* New styles for image preview */
        .file-upload {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        .file-upload input[type=file] {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }
        #imagePreview {
            max-width: 200px;
            max-height: 200px;
            margin: 10px auto;
            display: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .preview-container {
            text-align: center;
        }
    </style>
    </head>
<body>
<div class="container-fluid px-4 py-5">
    <!-- Previous header content remains the same -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="bg-light p-2 rounded-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="text-primary fw-bold mb-1">Register Your Community</h3>
                        <p class="text-muted mb-0 fs-8">FestiVent - Community System Management</p>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto" style="max-width: 1200px;">
        <div class="fun-card shadow p-5 animate__animated animate__fadeInUp">
            <h4 class="mb-4 text-dark fw-bold">Community Data ✨</h4>
            <form action="{{ route('communities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6 position-relative">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder=" " required value="{{ old('name') }}">
                        <span class="floating-label">👥 Community Name</span>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            <option value="Music" {{ old('category') == 'Music' ? 'selected' : '' }}>🎵 Music</option>
                            <option value="Art" {{ old('category') == 'Art' ? 'selected' : '' }}>🎨 Art</option>
                            <option value="Sport" {{ old('category') == 'Sport' ? 'selected' : '' }}>⚽ Sport</option>
                            <option value="Technology" {{ old('category') == 'Technology' ? 'selected' : '' }}>💻 Technology</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 position-relative">
                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder=" " required value="{{ old('city') }}">
                        <span class="floating-label">📍 City</span>
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 position-relative">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder=" " required>{{ old('description') }}</textarea>
                        <span class="floating-label">✏️ Description</span>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="file-upload">
                            <input type="file" name="logo" id="logoInput" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                            <div class="text-center p-4 border-2 border-dashed rounded-3">
                                <i class="fas fa-image fa-2x text-primary"></i>
                                <p class="mt-2">📸 Drop your community logo here!</p>
                            </div>
                            <div class="preview-container">
                                <img id="imagePreview" src="#" alt="Logo Preview">
                            </div>
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-end mt-4">
                            <button type="submit" class="submit-btn btn btn-primary rounded-pill">
                                <i class="fas fa-paper-plane me-2"></i> Register Community ✨
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
document.getElementById('logoInput').addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    const file = e.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
});
</script>
</body>
</html>