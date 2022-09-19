


<?php $name = $firstName. " " .$lastName ?><h2></h2>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-weight: 500;
            font-family: Arial, sans-serif;
        }
        .btn {margin: 10px 0px;
            border-radius: 4px;
            text-decoration: none;
            color: #fff !important;
            height: 46px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            background-image: linear-gradient(to right top, #38c9ff,#38c9ff, #38c9ff, #38c9ff, #38c9ff) !important;
        }
        .btn:hover {
            text-decoration: none;
            opacity: .8;
        }
        .ii a[href] {
           color: #38c9ff !important;
        }
    </style>
</head>
<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation"
                    style="width:600px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align: left;">
                    <tr style="border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;">
                        <td style="padding: 10px 25px;background: #fff;text-align: left;">
                             <span style="font-weight: bold; padding-top: 10px;font-size: 18px;">Survey Invitation </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:36px 30px 42px 30px;">
                            <table role="presentation"
                                style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 36px 0;color:#153643;">
                                        <p style="font-weight:bold;margin:0 0 20px 0;font-family:Arial,sans-serif;">
                                            Hello '.$name.',</h1>
                                            
                                        <p
                                            style="margin:0 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
                                            Would you like to fill up a short survey to help us improve our services? it will take only 2 minutes!
                                            </p>
                                          

                                        <p style="text-align: center;margin: 28px 0 !important;">
                                            <a href="http://wellspringinfotech.com/pathports/feedback/?surv_cat='.$survey_category.'&surv='.$survey_list.'&user_id='.$user_id.'" class="btn">Survey Link</a>
                                        </p>
                                         <p
                                            style="margin:10px 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
                                         Thank you in advance for your valuable insights. Your input will be used to ensure that we continue to meet your needs.
                                        </p>

                                         <p
                                            style="margin:10px 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
                                       We appreciate your trust in us and look and look forward to savings you in future. For any questions, contact our <span style="color:#38c9ff;">admin@pathports.com</span>
                                        </p>

                                        <p style="margin:0px 0 12px 0 !important;padding-top: 15px;font-size:14px !important;font-family:Arial,sans-serif;">
                                            Thank
                                            you, </p>
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>