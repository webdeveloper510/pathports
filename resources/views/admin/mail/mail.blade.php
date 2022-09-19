

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Email Template</title>
</head>
<body>
    <section class="email-template">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">

            <div class="email-template-container" style="max-width: 550px; background-color: #f0f0f0; box-shadow: 0 0 10px rgba(0, 0, 0, .2); padding: 24px; border-radius: 3px;">
                
                <h2 style="color: #000; font-size: 28px; margin-bottom: 20px;">Hi  {{ $to_user_names }}</h2>

                
                <p style="margin-bottom: 15px; color: #484848;">{{ $from_user_name }} has invited you to join a video meeting on Google Meets</p>
                <p style="margin-bottom: 15px; color: #484848; font-weight: bold; margin-bottom: 0;" class="details">Below are the details: </p>
                <div class="email-content">
                    <div style="font-weight: bold; margin: 5px 0;" class="content">Meeting Title:- <span style="font-weight: normal;">{{ $meeting_title }}</span></div>
                    <div style="font-weight: bold; margin: 5px 0;" class="content">Meeting Description:- <span style="font-weight: normal;">{{ $meeting_description }}</span></div>
                    <div style="font-weight: bold; margin: 5px 0;" class="content">Start Date:- <span style="font-weight: normal;">{{ $start_date }}</span></div>
                    <div style="font-weight: bold; margin: 5px 0;" class="content">Start Time:- <span style="font-weight: normal;">{{ $start_time }}</span></div>
                    <div style="font-weight: bold; margin: 5px 0;" class="content">End Date:- <span style="font-weight: normal;">{{ $end_date }}</span></div>
                    <div style="font-weight: bold; margin: 5px 0;" class="content">End Time:- <span style="font-weight: normal;">{{ $end_time }}</span></div>
                    <div style="font-weight: bold; margin: 5px 0;" class="content">Link:- <a href="">meet.google.con/hpw-txpw-wnn</a></div>
                </div>
                <p style="margin-bottom: 15px; color: #484848;">Or open Meet and enter this code:- <span style="text-decoration: underline; font-weight: bold; color: #000; margin-bottom: 0;" class="code">hpw-txpw-wnn</span></p>
            </div>
        </div>
    </section>
</body>
</html>

<style>


@media only screen and (min-width: 768px) {
    section.email-template .email-template-container {
        padding: 40px;
    }

    section.email-template .email-template-container .email-content .content {
        font-size: 20px;
    }

    section.email-template h2 {
        font-size: 36px;
    }

    section.email-template .email-template-container .code {
        font-size: 20px;
    }

    section.email-template .email-template-container p {
        font-size: 17px;
    }
}
	</style>