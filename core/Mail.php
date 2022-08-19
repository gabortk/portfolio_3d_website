<?php

namespace Core;

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    /**
     * @var PHPMailer
     */
    private $mail;

    /**
     * @var \Core\Logger
     */
    private $logger;

    private $addresses = [];

    /**
     * Mail constructor.
     * @param $content
     */
    public function __construct($content) {
        $this->logger = new Logger();
        $this->mail = new PHPMailer(true);

        //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->Host = getenv('MAIL_HOST');
        $this->mail->SMTPAuth = true;
        $this->mail->Username = getenv('MAIL_USERNAME');
        $this->mail->Password = getenv('MAIL_PASSWORD');
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = getenv('MAIL_PORT');

        //Recipients
        $this->mail->setFrom(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'));
        // $this->mail->addAddress('ellen@example.com');               // Name is optional
        //$this->mail->addReplyTo('info@example.com', 'Information');
        //$this->mail->addCC('cc@example.com');
        //$this->mail->addBCC('bcc@example.com');

        // Content
        $this->mail->isHTML(true);
        $this->mail->Subject = $content['subject'];
        $this->mail->Body = $content['body'];//'This is the HTML message body <b>in bold!</b>';
        $this->mail->AltBody = $content['alt_body'];//'This is the body in plain text for non-HTML mail clients';
    }

    /**
     *
     */
    public function send() {

        foreach($this->addresses as $address) {
            $this->mail->addAddress($address);
        }

        try {
            $this->mail->send();
            $this->logger->log("Message has been sent", 'success');
        } catch (\Exception $e) {
            $this->logger->log("Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}", 'error');
        }
    }

    public function addAddress($address) {
        $this->addresses[] = $address;
    }
}