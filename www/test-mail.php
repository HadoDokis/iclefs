<?php 

include(__DIR__."/../init.php");

$mailHTML = new MailHTML();

$mailHTML->setSubject("[i-clefs] Réception de données");
$mailHTML->setFrom("no-reply@iclefs.test.adullact.org");
$mailHTML->setReturnPath("no-reply@iclefs.test.adullact.org");
$mailHTML->setTo("eric@sigmalis.com");

ob_start();

include(__DIR__."/../mail/data.php");

$content = ob_get_contents();
ob_end_clean();

$mailHTML->setHTMLContent($content);
$mailHTML->send();
