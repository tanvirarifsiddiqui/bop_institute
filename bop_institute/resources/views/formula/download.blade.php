<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Formula</title>
</head>
<body>
<h1>Thank You for Your Purchase!</h1>
<p>Formula: {{ $formula->title }}</p>
<p>Your download is ready. Please click the link below:</p>
<a href="{{ $temporaryUrl }}" download>Download PDF</a>
<p>Note: The link will expire in 10 minutes.</p>
</body>

</html>
