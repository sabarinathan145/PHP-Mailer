# PHP Mailer

 * This  shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 
 
* Gmail limits the number of recipients in a single email and the number of emails that can be sent per day. The current limit is 500 Emails in a day or 500 recipients in a single email. You can't really increase this limit. If you want to send above these limit, then you need to integrate with third-party email delivery platform like Pepipost Sendgrid etc.
* On reaching threshold limits, you won't be able to send messages for the next 24 hours. Once this temporary suspension period is over, the counter gets reset automatically, and the user can resume sending emails.
* By default, any third-party apps/codes are not allowed to send emails using your Gmail account. And, hence there are few settings which need to be done at your end 
 
 
# Set the SMTP port number:
- 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
- 587 for SMTP+STARTTLS

```sh
$mail->Port = 465; // or 587

Set the encryption mechanism to use:
 * SMTPS (implicit TLS on port 465) or
 * STARTTLS (explicit TLS on port 587)

```

## Debugger step-by-step output after sending email successfully
```sh
CLIENT -> SERVER: EHLO NL616
CLIENT -> SERVER: STARTTLS
CLIENT -> SERVER: EHLO NL616
CLIENT -> SERVER: AUTH LOGIN
CLIENT -> SERVER: <credentials hidden>
CLIENT -> SERVER: <credentials hidden>
CLIENT -> SERVER: MAIL FROM:<from-email@gmail.com>
CLIENT -> SERVER: RCPT TO:<recipient-email@domain>
CLIENT -> SERVER: RCPT TO:<cc-recipient-email@domain>
CLIENT -> SERVER: DATA
CLIENT -> SERVER: Date: Sun, 22 Sep 2019 05:11:15 +0000
CLIENT -> SERVER: To: recipient-name <recipient-email@domain>
CLIENT -> SERVER: From: PHP SMTP Mailer <from-email@gmail.com>
CLIENT -> SERVER: Cc: cc-recipient-name <cc-recipient-email@domain>
CLIENT -> SERVER: Reply-To: reply-to-name <reply-to-email@domain>
CLIENT -> SERVER: Subject: Test email using PHP mailer
CLIENT -> SERVER: Message-ID: <UlnH3mCpHcFVNBY3Lb3PR2tVs6tvdJlu2F8g5sPN4@NL616>
CLIENT -> SERVER: X-Mailer: PHPMailer 6.0.7 (https://github.com/PHPMailer/PHPMailer)
CLIENT -> SERVER: MIME-Version: 1.0
CLIENT -> SERVER: Content-Type: multipart/alternative;
CLIENT -> SERVER:  boundary="b1_UlnH3mCpHcFVNBY3Lb3PR2tVs6tvdJlu2F8g5sPN4"
CLIENT -> SERVER: Content-Transfer-Encoding: 8bit
CLIENT -> SERVER: This is a multi-part message in MIME format.
CLIENT -> SERVER: --b1_UlnH3mCpHcFVNBY3Lb3PR2tVs6tvdJlu2F8g5sPN4
CLIENT -> SERVER: Content-Type: text/plain; charset=us-ascii
CLIENT -> SERVER: This is a test email using PHP mailer class.
CLIENT -> SERVER: --b1_UlnH3mCpHcFVNBY3Lb3PR2tVs6tvdJlu2F8g5sPN4
CLIENT -> SERVER: Content-Type: text/html; charset=us-ascii
CLIENT -> SERVER: <b>This is a test email using PHP mailer class.</b>
CLIENT -> SERVER: --b1_UlnH3mCpHcFVNBY3Lb3PR2tVs6tvdJlu2F8g5sPN4--
CLIENT -> SERVER: QUIT
email sent.
```
