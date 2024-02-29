<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Registration Notification</title>
</head>
<body>
    <p>Hello Admin,</p>
    <p>A new user has registered:</p>
    <ul>
        <li>Name: {{ $userData['name'] }}</li>
        <li>Email: {{ $userData['email'] }}</li>
        <!-- Add more user data as needed -->
    </ul>
    <!-- Add more content as needed -->
</body>
</html>
