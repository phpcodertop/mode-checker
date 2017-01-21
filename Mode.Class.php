<?php

/**
*  I love you so much
*  I love you so pain
*/
class ModeChecker 
{
	// These data would be stored in database

	// Define positive collection of keywords
	private $positiveKeywords = 
	[
		'love' , 'good' , 'peace' , 'calm' , 'much'
	];
	
	// Define negative collection of keywords
	private $negativeKeywords =
	[
		'pain' , 'hatred' , 'sad' , 'aggressive' , 'anxious' 
	];

	// Initialize empty string for text that would be used to be analyized
	public $analyizedString = '';

	// Initialize positive and negative counter
	private $counter;

	// Define max value of mode 100 %
	private $max = 100;

	// Method for outputting result to user
	public function processResult($analyizedString = ''){
		return 'Your mode is ' . $this->processString($analyizedString , 1)  . ' % Positive and '   . $this->processString($analyizedString , 2)  . ' % Negative .' ;
	}

	// Method for outputting result to user
	public function processString($string = '' ,  $vocabularyRef){
		$this->counter = 0;
		if ($vocabularyRef == 1) {
			$vocabulary = $this->positiveKeywords;
		}elseif ($vocabularyRef == 2) {
			$vocabulary = $this->negativeKeywords;
		}

		$words = explode(' ', $string);
		foreach ($vocabulary as $value) {
			// if( strpos( strtolower($string), $value ) !== false ) {
			// 	$this->counter++;
			// }

			// if( preg_match("/\b$value\b/i" , $string) ) {
			// 	$this->counter++;
			// }

			
			if (in_array($value , $words)){
			    $this->counter++;
			}
		}
		// print_r($this->counter);

		$percent = round((($this->counter / str_word_count($string)) * 100) , 2) ;
		return $percent;
	}



}

$check_mode = new ModeChecker();
echo $check_mode->processResult('I love you so much');

?>
