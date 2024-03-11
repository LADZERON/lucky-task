<html>
    <head>
        <title>User Page</title>
    </head>
    <body>
        <h1>User Page</h1>
        <p>Welcome to the user page, {{ $user->getName() }}!</p>
        <div>
            <a href="{{ route('logout', ['token' => $token]) }}">Logout</a>
            <a href="{{ route('refresh', ['token' => $token]) }}">Refresh</a>
        </div>
        <div>
            <button onClick="sendRequest('{{ route('lucky_number') }}')">Imfeelinglucky</button>
            <button onClick="sendRequest('{{ route('history') }}')">History</button>
        </div>
    </body>
    <script>
        function sendRequest(url) {
            fetch(url,
                {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer {{ $token }}',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(typeof data.data === 'object') {
                        alert(data.data.map(item => item.data).join(';'));
                    } else {
                        alert(data.data);
                    }
                })
                .catch(error => console.error(error));
        }
    </script>
</html>
