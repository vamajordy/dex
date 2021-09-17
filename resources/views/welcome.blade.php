<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dex Digital</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <!-- load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>
<body>

<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>Dex Digital</strong>
            </a>
        </div>
    </div>
</header>

<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Payment request</h1>
                <p>
                <form action="javascript:void(0)">
                    <label>
                        Choose request status:
                        <strong>success</strong>
                        <input type="radio" name="status" value="success" checked>
                        <strong>fail</strong>
                        <input type="radio" name="status" value="fail">
                    </label>
                    <input id="send_form" class="btn btn-primary" type="submit" value="Test Request">
                </form>
                </p>
            </div>
        </div>
    </section>

</main>

<script>
    //-----------------
    $(document).ready(function(){
        $('#send_form').click(function(e){
            e.preventDefault();
            /*Ajax Request Header setup*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#send_form').html('Sending..');

            /* Submit form data using ajax*/
            $.ajax({
                url: "{{ route('pay')  }}",
                method: 'post',
                data: {
                    "status": document.querySelector('input[name="status"]:checked').value,
                    "pay_form": {
                        "token": "xxx",
                        "design_name": "des1"
                    },
                    "transactions": {
                        "12345-7891234567": {
                            "id": "12345-7891234567",
                            "operation": "pay",
                            "status": "fail",
                            "descriptor": "FAKE_PSP",
                            "amount": 2345,
                            "currency": "USD",
                            "fee": {
                                "amount": 0,
                                "currency": "USD"
                            },
                            "card": {
                                "bank": "CITIZENS STATE BANK",
                            }
                        }
                    },
                    "error": {
                        "code": "6.01",
                        "messages": [
                            "Unknown decline code"
                        ],
                        "recommended_message_for_user": "Unknown decline code"
                    },
                    "order": {
                        "order_id": "12345-7891234567",
                        "status": "declined",
                        "amount": 2345,
                        "refunded_amount": 0,
                        "currency": "USD",
                        "marketing_amount": 2345,
                        "marketing_currency": "USD",
                        "processing_amount": 2345,
                        "processing_currency": "USD",
                        "descriptor": "FAKE_PSP",
                        "fraudulent": false,
                        "total_fee_amount": 0,
                        "fee_currency": "USD"
                    },
                    "transaction": {
                        "id": "12345-7891234567",
                        "operation": "pay",
                        "status": "fail"
                    }
                },

                success: function(response){
                    window.location.href = response.url;
                }})
        });
    });
    //-----------------
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>

