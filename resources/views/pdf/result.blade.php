<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font-size: 12px;
            line-height: 20px;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 5mm;
            margin: 5mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            border: .5px #eee solid;
            height: 257mm;
            /* outline: 0.5cm #eee solid; */
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
    </style>


</head>

<body>



    <div class="book">

        <div class="page">
            <div class="subpage">












                <style>
                    td {
                        background-color: #eee;
                        border: white;
                    }
                </style>
                <table style="width: 100%;">

                    <tr>
                        <td colspan="2">
                            &nbsp;
                        </td>
                        <td colspan="10">
                            SHAHJALAL UNIVERSITY OF SCIENCE & TECHNOLOGY, SYLHET, BANGLADESH
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/BMW_logo_%28gray%29.svg/2048px-BMW_logo_%28gray%29.svg.png" alt=""  style="height: 60px; width: 60px;">
                        </td>
                        <td colspan="4">
                            <div>Grade Certificate </div>
                            <div>B.Sc. (Engg.) Examination </div>
                            <div>Numerical Grade Letter Grade Grade Point </div>
                            <div>Session: 2015-16 </div>

                        </td>
                        <td colspan="6" rowspan="2"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente perspiciatis velit quos suscipit modi inventore asperiores commodi, assumenda harum sequi quidem nam dignissimos tempore eum ut? Mollitia harum omnis quas sit quibusdam. Deleniti ipsum beatae quas hic sed alias quibusdam ipsa accusantium fuga dicta cupiditate tempore quod, ab nostrum velit. D</td>
                    </tr>
                    <tr>
                        <td colspan="6"> Lorem ipsum dolor sit amet.  </td> 
                    </tr>







                </table>








            </div>
        </div>






        <div class="page">
            <div class="subpage">Page 2/2</div>
        </div>
    </div>

</body>

</html>