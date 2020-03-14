<?php

namespace KennyAlmendral\ContactForm\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use KennyAlmendral\ContactForm\Http\Requests\ContactStoreRequest;

use KennyAlmendral\ContactForm\Models\ContactForm;

use Mail;

class ContactFormController extends Controller
{
    public function index()
    {
        return view('contactform::contact');
    }

    public function sendMail(ContactStoreRequest $request)
    {
        ContactForm::create($request->all());

		$receiverName = 'Jane Doe'; // Change to your name
		$receiverEmail = 'janedoe@gmail.com'; // Change to your email

		$senderName = trim($request->name);
		$senderEmail = trim($request->email);
		$senderSubject = trim($request->subject);
		$senderMessage = trim($request->message);

		$to = $receiverEmail; 
		$subject = $senderSubject;
		$message = nl2br($senderMessage);

		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
		$headers[] = "To: $receiverName <$receiverEmail>";
		$headers[] = "From: $senderName <$senderEmail>";

		$sent = mail($to, $subject, $message, implode("\r\n", $headers));

		if (!$sent) {
			return redirect(route('contact'))->with(['error' => error_get_last()['message']]);
		}

        return redirect(route('contact'))->with(['message' => 'Thank you! Your mail has been sent successfully.']);
    }
}
