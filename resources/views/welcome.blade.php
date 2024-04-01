<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A joke a day keeps the doctor away</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        html,





        header {
            background-color: white;
            font-size: 0.8rem;
            text-align: center;
        }

        h1 {
            color: #56a742;
            font-weight: bold;
        }

        footer {
            margin-top: 30px;
            color: #888;
            font-size: 0.8rem;
            text-align: center;
        }

        .bg-success {
            --bs-bg-opacity: 1;
            background-color: rgb(15 176 101) !important;
        }

        .custom-text-color {
            color: #646464;

        }

        .ruler {
            width: 100%;
            height: 1px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            position: relative;
        }

        .ruler:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(to right, transparent 0, transparent 10%, #ccc 10%, #ccc 15%, transparent 15%, transparent 25%, #ccc 25%, #ccc 30%, transparent 30%, transparent 40%, #ccc 40%, #ccc 45%, transparent 45%, transparent 55%, #ccc 55%, #ccc 60%, transparent 60%, transparent 70%, #ccc 70%, #ccc 75%, transparent 75%, transparent 85%, #ccc 85%, #ccc 90%, transparent 90%);
        }

        img {
            display: block;
            max-width: 100%;
            height: auto;
        }


        body {
            overflow-x: hidden;
        }

        .image-container {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <header>
        <div class="d-flex bd-highlight mb-3" style="height:100px; ">
            <div class="p-2 bd-highlight h-20 " style="margin-left: 150px; ">
                <img src="{{ asset('images/logo_1.png') }}" alt="Logo 1" style="width:50%">
            </div>

            <div class="ms-auto p-2 bd-highlight h-20" style="margin-right: 150px; ">
                <div class="row">
                    <div class="col-6">
                        <h8 class="">handicrafted by</h8>
                        <p class="fw-bold">Jim HLS</p>
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('images/logo_2.jpg') }}" class="rounded-circle img-fluid" style="width:50%" alt="Logo 2">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="">

            <div class="p-3 mb-2 bg-success text-white ">
                <h2 class="text-center m-5">A joke a day keeps the doctor away</h1>
                    <p class="text-center">if you joke wrong way , your teeth have to pay. (Serious)</p>
            </div>

            <div>
                <div class="d-flex justify-content-center">
                    <div class="w-50 p-3">
                        <p class="text-center custom-text-color">
                            {{$joke}}

                        </p>
                    </div>
                </div>

                <form id="jokeVoteForm" action="{{ url('process_vote') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="d-flex justify-content-center" style="margin-bottom: 100px; ">
                        <div class="col-md-6 d-flex justify-content-end " style="margin-right: 10px; ">
                            <button type="submit" name="vote" value="funny" class="btn btn-primary " style="min-width: 200px;">
                                This is Funny!
                            </button>
                        </div>
                        <div class=" col-md-6" style="margin-left: 10px;">
                            <button type="submit" name="vote" value="not_funny" class="btn btn-success bg-success " style="min-width: 200px;">
                                This is not funny!
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>

        <div class="ruler"></div>
    </main>

    <footer>
        <div>
            <div class=" text-center">
                This website is created as part of Hisolutions program. The materials
                contained on this website are provided for general
            </div>

            <div class="text-center">
                information only and do not constitute any form of advice. HLS assumes
                no responsibility for the accuracy of any particular statement and
            </div>

            <div class="text-center">
                accepts no liability for any loss or damage which may arise from
                reliance on the information contained on this site.
            </div>
            <div>
                <h6>Copyright 2021 HLS</h2>
            </div>
        </div>

        <div class="ruler"></div>

    </footer>
</body>

</html>