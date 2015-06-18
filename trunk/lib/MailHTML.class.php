<?php
/**
 * Permet d'envoyer un mail en HTML avec des images attachées directement dans l'email
 * @author Eric Pommateau
 * @copyright Sigmalis 2015
 *
 */
class MailHTML {
		
	const DEFAULT_CHARSET = 'ISO-8859-15';
	const BOUNDARY_BEGIN_TEXT =  '_sigmalis_html_mail_';
	
	private $charset;
	private $return_path;
	
	private $from_address;
	private $from_name;
	
	private $to_address;
	private $to_name;
	
	private $subject;
	
	private $content;
	private $image_related = array();
	private $txt_content;
	
	public function setCharset($charset){
		$this->charset = $charset;
	}
	
	/**
	 * Le return-path est utilisé par les serveurs de mail en cas d'erreur
	 * Si celui-ci n'est pas précisé, c'est l'adresse from qui sera utilisé comme return-path
	 * @param string $return_path
	 */
	public function setReturnPath($return_path){
		$this->return_path = $return_path;
	}
	
	public function setFrom($from_address,$from_name = false){
		$this->from_address = $from_address;
		$this->from_name = $from_name;
	}
	
	public function setTo($to_address,$to_name=false){
		$this->to_address = $to_address;
		$this->to_name = $to_name;
	}
	
	/**
	 * Permet de renseigner tous le contenu du mail sous forme d'un tableau 
	 * @param array $content_info('subject'=>$subject,'mail_content'=>$html,'mail_txt_content'=>$txt,'image'=>array('cid1'=>image1_path,...))
	 */
	public function setContentInfo(array $content_info){
		$this->setSubject($content_info['subject']);
		$this->setHTMLContent($content_info['mail_content']);
		$this->setTxtContent($content_info['mail_txt_content']);
		foreach($content_info['image'] as $cid=>$image_path){
			$this->addRelatedImage($cid,$image_path);
		}
	}
	
	public function setSubject($subject){
		$this->subject = $subject;
	}
	
	public function setHTMLContent($content){
		$this->content = $content;
	}
	
	
	/**
	 * Attache un fichier image au mail
	 * @param string $content_id La chaine est est utilisé dans le fichier html comme cid : cid:$content_id
	 * @param string $file_path emplacement de l'image 
	 */
	public function addRelatedImage($content_id,$file_path){
		$this->image_related[$content_id] = $file_path;
	}
	
	public function setTxtContent($txt_content){
		$this->txt_content = $txt_content;
	}
	
	public function send(){
		if (! $this->to_address){
			throw new Exception("L'adresse de destination est obligatoire");
		}
		$boundary = $this->getBoundary();
		$message = $this->getHTMLContent($boundary);
		$entete = $this->getEntete($boundary);
		$return_path = $this->getReturnPath();
		$subject = $this->getSubject();
			
		mail($this->to_address,$subject,$message,$entete,$return_path);
	}
	
	private function getEntete($boundary){
		$entete =	"From: ".$this->getFrom().PHP_EOL.
		"To: ".$this->getTo().PHP_EOL.
		"Reply-To: ".$this->getFrom().PHP_EOL.
		"MIME-Version: 1.0".PHP_EOL.
		"Content-Type: multipart/alternative; boundary=\"$boundary\"";
		return $entete;
	}
	
	private function getHTMLContent($boundary){
		$boundary_related = $this->getBoundary();
		
		$message = "--".$boundary.PHP_EOL .
		"Content-Type: text/plain; charset=\"".$this->getCharset()."\"".PHP_EOL.
		"Content-Transfer-Encoding: 8bit".PHP_EOL.
		PHP_EOL.
		$this->txt_content.PHP_EOL.
		PHP_EOL.
		"--".$boundary.PHP_EOL.
		"Content-Type: multipart/related; boundary=\"$boundary_related\"".PHP_EOL.
		PHP_EOL.
		"--".$boundary_related.PHP_EOL.
		"Content-Type: text/html; charset=\"".$this->getCharset()."\"".PHP_EOL.
		"Content-Transfer-Encoding: 8bit".PHP_EOL.
		PHP_EOL.
		$this->content.PHP_EOL.
		PHP_EOL;
		$i = 0;
		foreach($this->image_related as $content_id => $filepath){
			$content_type = $this->getContentType($filepath);
			$filename = basename($filepath);
		
			$message .= "--".$boundary_related.PHP_EOL.
			"Content-type: $content_type; filename=\"$filename\"".PHP_EOL.
			"Content-ID: <$content_id>".PHP_EOL.
			"Content-transfer-encoding: base64".PHP_EOL.
			"Content-Disposition: inline; filename=\"$filename\"".PHP_EOL.
			PHP_EOL.
			chunk_split(base64_encode(file_get_contents($filepath)));
			$i++;
		}
		$message .=
		"--".$boundary_related."--".
		PHP_EOL.PHP_EOL.
		"--".$boundary."--";
		return $message;
	}
	
	private function getReturnPath(){
		if ($this->return_path){
			return "-f".$this->return_path;
		}
		return "";
	}
	
	protected function getContentType($file_path){
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$content_type = finfo_file($finfo, $file_path);
		finfo_close($finfo);
		return $content_type;
	}
	
	private function getSubject(){
		if (! $this->subject) {
			return "(pas de sujet)";
		}
		return $this->getFormatedMimeHeadder($this->subject);
	}
	
	private function getFormatedMimeHeadder($value){
		$preferences = array(
				"input-charset" => $this->getCharset(),
				"output-charset" => "UTF-8",
				"line-break-chars" => PHP_EOL,
				"scheme"=>'Q',
		);
		$formated_header = substr(iconv_mime_encode("",$value,$preferences),2);
		return $formated_header;
	}
	
	private function getFrom(){
		return $this->getFormatedAddress($this->from_address, $this->from_name);
	}
	
	private function getTo(){
		return $this->getFormatedAddress($this->to_address, $this->to_name);
	}
	
	private function getFormatedAddress($address,$name){
		if ($name){
			return $this->getFormatedMimeHeadder($name)." <$address>";
		} else {
			return $address;
		}
	}
	
	private function getCharset(){
		return $this->charset?:self::DEFAULT_CHARSET;
	}
	
	private function getBoundary(){
		return self::BOUNDARY_BEGIN_TEXT .
		substr(sha1( self::BOUNDARY_BEGIN_TEXT . microtime().mt_rand(0,mt_getrandmax())), 0, 12);
	}
	
}