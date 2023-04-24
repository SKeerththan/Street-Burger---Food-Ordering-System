<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Order Bill</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png" />
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <style>
        #box {
            display: block;

        }

        * {
            box-sizing: border-box;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            word-break: break-all;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        .h4-14 h4 {
            font-size: 12px;
            margin-top: 0;
            margin-bottom: 5px;
        }

        .img {
            margin-left: "auto";
            margin-top: "auto";
            height: 30px;
        }

        pre,
        p {
            /* width: 99%; */
            /* overflow: auto; */
            /* bpicklist: 1px solid #aaa; */
            padding: 0;
            margin: 0;
        }

        table {
            font-family: arial, sans-serif;
            width: 100%;
            border-collapse: collapse;
            padding: 1px;
        }

        .hm-p p {
            text-align: left;
            padding: 1px;
            padding: 5px 4px;
        }

        td,
        th {
            text-align: left;
            padding: 8px 6px;
        }

        .table-b td,
        .table-b th {
            border: 1px solid #ddd;
        }

        th {
            /* background-color: #ddd; */
        }

        .hm-p td,
        .hm-p th {
            padding: 3px 0px;
        }

        .cropped {
            float: right;
            margin-bottom: 20px;
            height: 100px;
            /* height of container */
            overflow: hidden;
        }

        .cropped img {
            width: 400px;
            margin: 8px 0px 0px 80px;
        }

        .main-pd-wrapper {
            box-shadow: 0 0 10px #ddd;
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
        }

        .invoice-items {
            font-size: 14px;
            border-top: 1px dashed #ddd;
        }

        .invoice-items td {
            padding: 14px 0;

        }
    </style>
</head>

<body>
    <br>
    <section class="main-pd-wrapper" style="width: 450px; margin: auto">
        <div style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                ">

            <img src="images/Logo.jpg" width="100px" height="100px" viewBox="0 0 272 73" fill="none" alt="">

            <p style="font-weight: bold; color: #000; margin-top: 15px; font-size: 18px;">
                Invoice/Bill Of Orders <br>🍔Sreet Burger🍔
            </p>
            <p style="margin: 15px auto;">
                Street Burger, M289+XFR, <br>
                Jaffna, Sri Lanka <br>
                Tel : 123-4567890
            </p>
            <p>
                <b>User:</b> 0987653456789
            </p>
            <p>
                <b>Order ID:</b> 0987653456789
            </p>

            <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
        </div>
        <table style="width: 100%; table-layout: fixed">
            <thead>
                <tr>
                    <th style="width: 50px; padding-left: 0;">Sn.</th>
                    <th style="width: 220px;">Item Name</th>
                    <th>QTY</th>
                    <th style="text-align: right; padding-right: 0;">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr class="invoice-items">
                    <td>01</td>
                    <td>Tropicana Purenectar Pomegr</td>
                    <td>5 PC</td>
                    <td style="text-align: right;">₹ 100</td>
                </tr>
                <tr class="invoice-items">
                    <td>02</td>
                    <td>Tropicana Purenectar Pomegr</td>
                    <td>5 PC</td>
                    <td style="text-align: right;">₹ 100</td>
                </tr>
                <tr class="invoice-items">
                    <td>03</td>
                    <td>Tropicana Purenectar Pomegr</td>
                    <td>5 PC</td>
                    <td style="text-align: right;">₹ 100</td>
                </tr>
                <tr class="invoice-items">
                    <td>04</td>
                    <td>Tropicana Purenectar Pomegr</td>
                    <td>5 PC</td>
                    <td style="text-align: right;">₹ 100</td>
                </tr>

            </tbody>
        </table>

        <table style="width: 100%;
              background: #fcbd024f;
              border-radius: 4px;">
            <thead>
                <tr>
                    <th>Total</th>
                    <th style="text-align: center;">Item (10)</th>
                    <th>&nbsp;</th>
                    <th style="text-align: right;">₹ 396</th>

                </tr>
            </thead>

        </table>
        <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
        <div style="text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;">
            <p>
                🌟🌟🌟🌟🌟 <br>
                <b>Thank You For Your Purchase</b>🙏
            </p>

            <!-- <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto"> -->
            <p>
                <b>Eat clean, stay fit, and have a burger to stay sane.</b>

            </p>
        </div>


        <hr style=" border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
        <div style="text-align: right;" id="box">
            <button type="submit" class="btn btn-light" onclick="handleRadioClick();" name="btnPdfOrders" class="fa fa-bars" id="show"> <i class="fa fa-solid fa-print"></i> &nbsp Print Bill </button>

        </div>




    </section>
    <script>
        const box = document.getElementById('box');

        function handleRadioClick() {
            box.style.display = 'none';
            window.print();


            box.style.display = 'block';



        }

        const radioButtons = document.querySelectorAll('input[name="btnPdfOrders"]');
        radioButtons.forEach(radio => {
            radio.addEventListener('click', handleRadioClick);
        });
    </script>
</body>

</html>