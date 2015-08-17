<?php
/*
@name Yana une blague
@author linquant <linquant@gmail.com>
@link 
@licence CC by nc sa
@version 1.0.0
@description Yana a mangé un clown
*/



function blague_vocal_command(&$response,$actionUrl){
	global $conf;
	$response['commands'][] = array('command'=>$conf->get('VOCAL_ENTITY_NAME').', blague','url'=>$actionUrl.'?action=blague_action','confidence'=>'0.88');
}

function blague_action(){
	global $_,$conf;

	switch($_['action']){
		case 'blague_action':
			global $_;

				$possible_answers = array(
					'Je ne suis pas douée pour raconter les blagues',

					'A la piscine, un nageur se fait enguirlander parce qu\'il a fait pipi dans l\'eau. Mais enfin, proteste-t-il, vous exagérez, je ne suis pas le seul à faire ça! Si, monsieur, du haut du plongeoir, vous êtes le seul! ',

					' Allô Police ! Je viens d\'écraser un poulet. Que dois-je faire ? Et bien , plumez-le et faites-le cuire à thermostat 6. Ah bon ! Et qu\'est-ce que je fais de la moto ?',
					
					'C\'est l\'histoire de paf le chien qui traverse la rue. Et paf le chien.',

					'C\'est l\'histoire d\'un petit manchot qui veut du chocolat. Mais pas de bras pas de chocolat.',

					'C\'est l\'histoire d\’un pingouin qui respire par les fesses. Un jour il s\'assit et il meurt .',

                    'Ou est fabriqué le viagra ? Au Bouquistan !',

                    'C\'est la fesse droite qui dit à la fesse gauche : ça sent mauvais dans le couloir.',

                    'C\'est l\'histoire de l\'eunuque décapité Une histoire sans queue ni tête.',

					'Quelle est la différence entre une blonde et une patate ? La patate est cultivée.',

					'Une blonde dit à son mari : Tu as vu chéri, des chevals !! Le mari répond :  Non, ce sont des chevaux ! Et la blonde répond : Ah bon, pourtant ça ressemble trop à des chevals !!',

					'On ne dit pas "Le petit Poucet" mais "Le garçon était constipé".',

					'Comment reconnaît-on une femme de ménage belge ? C \'est la seule qui nettoie l`\'ascenseur à tous les étages !',
				);

				$affirmation = $possible_answers[rand(0,count($possible_answers)-1)];
				$response = array('responses'=>array(array('type'=>'talk','sentence'=>$affirmation)));


				$json = json_encode($response);
				echo ($json=='[]'?'{}':$json);




		break;
	}
}



Plugin::addCss("/css/style.css"); 
//Plugin::addJs("/js/main.js"); 


Plugin::addHook("vocal_command", "blague_vocal_command");
Plugin::addHook("action_post_case", "blague_action");

?>
