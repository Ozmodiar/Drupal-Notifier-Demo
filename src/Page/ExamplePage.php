<?php

namespace Drupal\notifier_demo\Page;

use Notifier\Mail\ParameterBag\MailMessageParameterBag;
use Notifier\Mail\ParameterBag\MailRecipientParameterBag;
use Notifier\Message\Message;
use Notifier\Notifier;
use Notifier\Recipient\Recipient;
use Drupal\notifier_demo\Type\RecoverPasswordType;
use Drupal\notifier_display\ParameterBag\DisplayMessageParameterBag;
use Drupal\notifier_display\ParameterBag\DisplayRecipientParameterBag;

class ExamplePage {

  /**
   * @var Notifier
   */
  private $notifier;

  public function __construct(Notifier $notifier) {
    $this->notifier = $notifier;
  }

  public function buildMenu() {
    return array(
      'notifier/example' => array(
        'title' => 'Notifier Example',
        'description' => 'This page shows a notifier example page.',
        'page callback' => 'notifier_demo_example_page',
        'access arguments' => array('access administration pages'),
        'weight' => 0,
        'file' => 'includes/notifier_demo.pages.inc',
      ),
    );
  }

  public function buildPage() {
    $message = new Message(new RecoverPasswordType());
    $message->addParameterBag(new MailMessageParameterBag('Mail subject', 'Body...'));
    $message->addParameterBag(new DisplayMessageParameterBag('Woop!'));

    $recipient = new Recipient();
    $recipient->addParameterBag(new MailRecipientParameterBag('joeri.vandooren@gmail.com'));
    $recipient->addParameterBag(new DisplayRecipientParameterBag());

    $this->notifier->sendMessage($message, array($recipient));

    return 'woot';
  }
}
