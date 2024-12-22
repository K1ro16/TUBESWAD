<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include any common CSS files here -->
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('eventreq.index') }}">Event List</a>
            <a href="{{ route('eventreq.create') }}">Create Event</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Event Management</p>
    </footer>
</body>
</html>
