

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

            <!-- <div class="email-template-container" style="max-width: 550px; margin: 0 auto; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, .2); padding: 24px; border-radius: 3px;"> -->
                
                <h4 style="color: #000; font-size: 28px; margin-bottom: 24px;">Hi {{$firstName}} {{$lastName}} </h4>

                <p>You have Registered Successfully</p>
               
        <!-- </div> -->
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