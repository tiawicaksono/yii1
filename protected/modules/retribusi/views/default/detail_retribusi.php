<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            @media print {
                html, body {
                    width: 35.7cm; /* was 8.5in */
                    height: 10cm; /* was 5.5in */
                    display: block;
                    font-family: "Calibri";
                    /*font-size: auto; NOT A VALID PROPERTY */
                }

                @page {
                    size: 35.7cm 10cm /* . Random dot? */;
                    size: 5.5in 8.5in /* . Random dot? */;
                }
            }
            /*            .pages {
                            width: 23cm;
                            height: 34cm;
                            margin-left: 1cm;
                        }*/
            @pages {
                size: 35cm 10cm;
            }
/*            @media print {
                .pages {
                    page-break-after: always;
                }
            }*/
            table{
                table-layout: fixed;
                border-collapse: collapse;
            }
            td{
                word-wrap:break-word;
                width:auto;
                max-width:14.6cm;
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
    </head>

    <body class="print-body">
    <well class="pages">
        <table style="font-family:arial;line-height:1.2em;font-size:16px;">
            <tr style="visibility:hidden;">
                <td colspan="3">Kolom Ini Tidak Tampak</td>
            </tr>
            <tr>
                <td style="text-align: left;vertical-align:top;padding-left:5px;">SB 123456 K</td>
                <td style="text-align: left;vertical-align:top;padding-left:5px;">SB 123456 K</td>
                <td style="text-align: left;vertical-align:top;padding-left:5px;">SB 123456 K</td>
            </tr>
        </table>			
    </well>

</body>
</html>