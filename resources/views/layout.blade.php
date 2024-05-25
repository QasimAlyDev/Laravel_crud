<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRUD</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <link href="//cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <style>
        *[role="form"] {
            max-width: 530px;
            padding: 15px;
            margin: 0 auto;
            /* background-color: #a0cbdf; */
            border: 1px solid black;
            border-radius: 0.3em;
        }

        .form-horizontal .form-group textarea {
            width: 100%;
            resize: none;
            /* Disable textarea resizing */
        }

        *[role="form"] h2 {
            margin-left: 5em;
            margin-bottom: 1em;
        }

        .urduCursor {
            direction: rtl;
            /* Right-to-left direction for Urdu */
        }

        .englishCursor {
            direction: ltr;
            /* Left-to-right direction for English */
        }

        footer {
            background-color: #f5f5f5;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #ddd;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Laravel Crud</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <!-- Content Section -->
        @yield('content')
    </div>
    <!-- ./container -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 , Creator : <span style="color: rgb(3, 3, 107)">Qasim Ali PHP Laravel Developer.</span></p>
        </div>
    </footer>
    <!-- ./footer -->
</body>

</html>
<script src="{{ asset('assets/js/cursor_direction_handeling.js') }}"></script>
