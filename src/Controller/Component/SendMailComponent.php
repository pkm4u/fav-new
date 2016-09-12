<?php 
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;

class SendMailComponent extends Component
{
    public function sendmail($config)
    {
        $email = new Email();
		$email->profile('smtp');
		$email->viewVars($config['viewVars']);
		$email->template($config['template'], 'default')
			->emailFormat('html')
			->to($config['toemail'])
			->from('info@wikivillage.in','wikivillage.in')
			->subject($config['subject'])
			->send();
    }
}
