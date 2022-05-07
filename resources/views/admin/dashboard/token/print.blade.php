<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 10mm auto;
            /* border: 1px #D3D3D3 solid; */
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            /* border: 2px black solid; */
            height: 257mm;
            /* outline: 2cm #FFEAEA solid; */
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

        .text-center {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="book">
        <div class="page">
            <div class="subpage">
                <div class="title">
                    <h1 class="text-center">{{ $token->token }}</h1>
                    <h3 class="text-center">Department: {{ $department->name }}</h3>
                    <h3 class="text-center">Description: {{ $department->description }}</h3>
                </div>
                <div class="description">

                </div>
            </div>
        </div>
    </div>

</body>
<script>
    // open print dialog with the A4 page size
    window.print();
</script>
</html>
