<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require '../phpmailer/src/Exception.php';
	require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';

    
    

    // user inputs
    $subject = $_POST['subject'];
    $designation = $_POST['designation'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ffname = $_POST['f-fname']; 
    $llname = $_POST['l-lname'];
    $postalcode = $_POST['postalcode'];
    $userphone = $_POST['phone'];
    $useremail = $_POST['email'];
    $inquiry = $_POST['inquiry'];
    // user input values


    $adminEmail = "aikido763@gmail.com";
    
    $mail = new PHPMailer(true);

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    
    //Enable SMTP debugging.
    $mail->SMTPDebug = 3;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "smtp.lolipop.jp";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = "dev@parijat.asia";                 
    $mail->Password = "password";          
    // $mail->Password = "7MS1fmvle7-g6ciN";                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "ssl";                           
    //Set TCP port to connect to
    $mail->Port = 465;                                   
    $mail->From = "dev@parijat.asia";
    $mail->FromName = "parijat";
    $mail->addAddress($adminEmail);
    $mail->isHTML(true);

    // mail for admin
    $mail->Subject = "ホームページにお問い合わせがありました。";
    $mail->AddAddress($adminEmail);
    $mail->Body = 
    "<html>
        

        <div>
            <b> admin 様</b> <br>
            
            この度は、company name <br>
            【xxxxxxxxxxxxxxxxxx】より<br>
            お客様のお問い合わせがありました。<br>
            
            下記の内容でお問い合わせを承りました。<br>
            -------------------------------------------------<br>
        </div>

        <p>
            <b>■ お名前: </b><br>
            $fname $lname
        </p>

        <p>
            <b> ■ 件名:</b><br>
            $subject
        </p>

        <p>
            <b> ■ 店舗指定:</b><br>
            $designation
        </p>

        <p>
            <b> ■ フリガナ:</b><br>
            $ffname $llname
        </p>

        <p>
            <b> ■ 郵便番号:</b><br>
            $postalcode
        </p>

        <p>
            <b> ■ 電話番号:</b><br>
            $userphone
        </p>

        <p>
            <b> ■ メールアドレス:</b><br>
            $useremail
        </p>

        <p>
            <b> ■ お問い合わせ内容:</b><br>
            $inquiry
        </p>
        
        <div>
            ===============================================<br>
            JOYCAL <br>
            adresss: xxxxxxxxx <br>
            TEL：xxx-xxxx-xxxx <br>
            URL : xxxxxxxxxxxxx <br>
            =============================================== <br>
        </div>
    
    </html>";
    $mail->send();



    // clear admin mail instance
    $mail->ClearAddresses();

    // mail for user
    $mail->Subject = "お問い合わせありがとうございます。";
    $mail->AddAddress($useremail);
    $mail->Body = 
    "<html>
        
        <div>
            【$fname $lname 様}】 お問い合わせいただきありがとうございます。
        </div>
        
        <p>
            この度は JOYCAL  の <br>
            (xxxxxxxx) より <br>
            お問い合わせいただき誠にありがとうございます。 <br>
            下記の内容を確認させて頂いた後、 <br>
            折り返し担当よりご連絡をさせていただきます。 <br>
            宜しくお願いします。 <br>
        
        ---------------------------------------------------------------------- <br>
        </p>
        
        <p>
            <b>■ お名前: </b><br>
            $fname $lname
        </p>

        <p>
            <b> ■ 件名:</b><br>
            $subject
        </p>

        <p>
            <b> ■ 店舗指定:</b><br>
            $designation
        </p>

        <p>
            <b> ■ フリガナ:</b><br>
            $ffname $llname
        </p>

        <p>
            <b> ■ 郵便番号:</b><br>
            $postalcode
        </p>

        <p>
            <b> ■ 電話番号:</b><br>
            $userphone
        </p>

        <p>
            <b> ■ メールアドレス:</b><br>
            $useremail
        </p>

        <p>
            <b> ■ お問い合わせ内容:</b><br>
            $inquiry
        </p>
        
        <div>
        ----------------------------------------------------------------------
        </div>
        

        <p>
            尚、3日経ってもご連絡がない場合、 <br>
            何かの問題でメールが届いていない可能性があります。 <br>
            大変恐縮ですが、その際は下記お電話番号まで <br>
            ご連絡をいただけますと幸いです。 <br>
            TEL : 000-0000-0000 <br> <br>
            
            ※本メールは、プログラムから自動で送信しています。 <br>
            心当たりの無い方は、お手数ですが削除してください。 <br>
            もしくは、そのまま送信元に返信していただければと思います。 <br>
            =============================================== <br>
            JOYCAL <br>
            address : xxxxxxxxxx <br>
            TEL： 000-0000-0000  <br>
            URL： www.example.com.jp <br>
            =============================================== <br>
        </p>
    </html>";
    ;
    $mail->Send();
?>