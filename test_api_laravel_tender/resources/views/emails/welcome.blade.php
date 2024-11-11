<!DOCTYPE html>
<html>
<head>
    <title>Welcome to {{ config('app.name') }}</title>
</head>
<body>
    <h1>Welcome, {{ $firstName }} {{ $lastName }}!</h1>
    <p>Thank you for registering at {{ config('app.name') }}.</p>
</body>
</html>
