<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        body {
            margin-top: 20px;
        }

        .block-7 {
            border-radius: 4px;
            margin-bottom: 30px;
            padding: 0;
            overflow: hidden;
            background: #fff;
            -webkit-box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.05);
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -webkit-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        @media (max-width: 991.98px) {
            .block-7 {
                margin-top: 30px;
            }
        }

        .block-7 .img {
            height: 250px;
        }

        .block-7 .heading-2 {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .block-7 .price {
            margin: 0;
            padding: 0;
            display: block;
        }

        .block-7 .price sup {
            font-size: 24px;
            top: -1em;
            color: #b3b3b3;
        }

        .block-7 .price .number {
            font-size: 60px;
            font-weight: 600;
            color: #000000;
        }

        .block-7 .excerpt {
            margin-bottom: 0px;
            color: #00bd56;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .block-7 .label2 {
            text-transform: uppercase;
        }

        .block-7 .pricing-text,
        .block-7 .pricing-text li {
            padding: 0;
            margin: 0;
        }

        .block-7 .pricing-text li {
            list-style: none;
            padding-top: 10px;
            padding-bottom: 10px;
            color: #000000;
        }

        .block-7 .pricing-text li:nth-child(odd) {
            background: rgba(0, 0, 0, 0.05);
        }

        .block-7 .pricing-text li span.fa {
            color: #207dff;
        }

        .block-7 .btn-primary {
            color: #fff;
            text-transform: uppercase;
            font-style: 16px;
            font-weight: 600;
            letter-spacing: 1px;
            width: 60%;
            margin: 0 auto;
        }

        .block-7 .btn-primary:hover,
        .block-7 .btn-primary:focus {
            background: #00bd56 !important;
            color: #fff;
        }

        .block-7:hover,
        .block-7:focus {
            -webkit-box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.11);
            -moz-box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.11);
            box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.11);
        }
    </style>
</head>

<body>


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <h2>Affordable Packages</h2>
                </div>
            </div>
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate fadeInUp ftco-animated">
                    <div class="block-7">
                        <div class="img"
                            style="background-image: url(https://www.bootdey.com/image/350x280/FFB6C1/000000);"></div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block">Basic</span>
                            <span class="price"><sup>$</sup> <span class="number">49</span> <sub>/mos</sub></span>
                            <ul class="pricing-text mb-5">
                                <li><span class="fa fa-check mr-2"></span>5 Dog Walk</li>
                                <li><span class="fa fa-check mr-2"></span>3 Vet Visit</li>
                                <li><span class="fa fa-check mr-2"></span>3 Pet Spa</li>
                                <li><span class="fa fa-check mr-2"></span>Free Supports</li>
                            </ul>
                            <a href="{{ route('plans.checkout', $basic->plan_id) }}"
                                class="btn btn-primary d-block px-2 py-3">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate fadeInUp ftco-animated">
                    <div class="block-7">
                        <div class="img"
                            style="background-image: url(https://www.bootdey.com/image/350x280/87CEFA/000000);"></div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block">Professional</span>
                            <span class="price"><sup>$</sup> <span class="number">79</span> <sub>/mos</sub></span>
                            <ul class="pricing-text mb-5">
                                <li><span class="fa fa-check mr-2"></span>5 Dog Walk</li>
                                <li><span class="fa fa-check mr-2"></span>3 Vet Visit</li>
                                <li><span class="fa fa-check mr-2"></span>3 Pet Spa</li>
                                <li><span class="fa fa-check mr-2"></span>Free Supports</li>
                            </ul>
                            <a href="{{ route('plans.checkout', $professional->plan_id) }}"
                                class="btn btn-primary d-block px-2 py-3">Get Started</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate fadeInUp ftco-animated">
                    <div class="block-7">
                        <div class="img"
                            style="background-image: url(https://www.bootdey.com/image/350x280/FF7F50/000000);"></div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block">Enterprise</span>
                            <span class="price"><sup>$</sup> <span class="number">109</span> <sub>/mos</sub></span>
                            <ul class="pricing-text mb-5">
                                <li><span class="fa fa-check mr-2"></span>5 Dog Walk</li>
                                <li><span class="fa fa-check mr-2"></span>3 Vet Visit</li>
                                <li><span class="fa fa-check mr-2"></span>3 Pet Spa</li>
                                <li><span class="fa fa-check mr-2"></span>Free Supports</li>
                            </ul>
                            <a href="{{ route('plans.checkout', $enterprise->plan_id) }}"
                                class="btn btn-primary d-block px-2 py-3">Get Started</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
