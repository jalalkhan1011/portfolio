
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
<section class="ml-5">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <p>From:<a href="mailto:{{ $userMail }}">{{ $userMail }}</a></p>
                    <p></p>
                    <p>Hi {{ $admin->name }},</p>
                    <p>{{ $userMessage }}</p>
                    <p></p>
                    <p>
                        Your regards,<br>
                        {{ $userName }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
