<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Callback</title>
    <script>
        window.opener.postMessage({
            data: "{{ $data }}",
            message: "{{ $message }}",
            access_token: "{{ $access_token }}",
            success: "{{ $success }}",
            error: "{{ $error }}",
            loginMessage: true,
        }, "*");
        window.close();
    </script>
</head>

<body>
</body>

</html>
