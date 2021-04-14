<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>Mailer</title>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    </style>
</head>

<body>
    <main>
        <header class="mt-10 text-center" id="header">
            <h1 class="text-5xl"> Mailer </h1>
        </header>
        <section class="mt-10 container mx-auto">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mt-4 w-full">
                    <label class="w-full" for="your-email">Your email</label>
                    <input name="sender_email" type="email" class="rounded p-2 border w-full mt-1"
                        placeholder="Your email" />
                </div>
                <div class="mt-4 w-full">
                    <label class="w-full" for="Subject">Subject</label>
                    <input name="subject" type="text" class="rounded p-2 border w-full mt-1" placeholder="Subject" />
                </div>
                <div class="mt-4 w-full">
                    <label class="w-full" for="Email"> Message</label>
                    <textarea name="message" type="text" class="border mt-1 p-2 w-full rounded text-black"
                        placeholder="Message" rows="4" cols="50">
                </textarea>
                </div>
                <div class="mt-4 w-full">
                    <label class="w-full" for="Email"> Emails of recipients</label>
                    <textarea name="recipients" class="border mt-1 p-2 w-full rounded text-black" placeholder="Email"
                        rows="4" cols="50">
                </textarea>
                </div>
                <div class="mt-4 text-center">
                    <button type="submit" name="submit" class="bg-green-700 text-white rounded px-12 py-4"> Send
                    </button>
                </div>
            </form>
            <?php
                if(isset($_POST['submit']))
                {

                    $subject = $_POST['subject'];
                    
                    $message =  $_POST['message'];

                    $header = "From:tarekhassan410@gmail.com \r\n";
                    $recipients = $_POST['recipients'];
                    $recipients_list = explode(",", $recipients);

                    foreach ($recipients_list as $recipient) {
                         $retval = mail ($recipient,$subject,$message,$header);
         
                        if( $retval == true ) {
                        echo "Message sent successfully...";
                        }else {
                        echo "Message could not be sent...";
                        }
                            
                    }
                }
            ?>

        </section>
    </main>
</body>

</html>