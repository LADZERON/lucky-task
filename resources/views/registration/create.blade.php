<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <h1>Registration</h1>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/registration">
            @csrf
            <div>
                <label for="name">Username:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            </div>
            <div>
                <label for="phone">Phonenumber:</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required>
            </div>
            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </body>
</html>