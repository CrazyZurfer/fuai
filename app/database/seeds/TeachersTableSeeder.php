<?php
/*
use PHPHtmlParser\Dom;
use Feuai\Teachers\TeachersRepositoryInterface;

class TeachersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('teachers')->delete();
		$this->command->comment('Se borraron los profesores');

		$this->command->comment('Buscando lista de profesores...');

		$dom = new Dom;
		$dom->loadFromUrl('http://localhost/Profesores.html');

		$teachers = $dom->find('.items')[0]->find('.item');

		$this->command->info('Se encontraron ' . count($teachers) . ' profesores');

		foreach ($teachers as $index => $teacher) {
			$url = 'http://www.uai.cl' . $teacher->find('a')[0]->getAttribute('href');
			$this->saveTeacher($index, $url);
		}
	}

	public function saveTeacher($i, $url)
	{
		$this->command->info('Cargando ' . $url . '...');

		$teacher = [];

		$dom = new Dom;
		$dom->loadFromUrl($url);
		$content = $dom->find('div.content')[0];

		$teacher['name'] = $this->fixText($content->find('h1')[0]->innerHtml);

		$teacher['image'] = 'http://www.uai.cl' . $content->find('.img_perfil')[0]->getAttribute('src');

		$descriptions = $content->find('.cont_descripciones')[0]->find('div');

		foreach ($descriptions as $index => $description) {
			try {
				switch ($index) {
					case 1:
						$teacher['area'] = $this->fixText($description->find('span')[0]->innerHtml);
						break;

					case 2:
						$teacher['school'] = $this->fixText($description->find('span')[0]->innerHtml);
						break;

					case 3:
						$teacher['studies'] = $this->fixText($description->find('span')[0]->innerHtml);
						break;

					case 4:
						$teacher['email'] = $description->find('span')[0]->innerHtml;
						break;

					case 5:
						$teacher['location'] = $this->fixText($description->find('span')[0]->innerHtml);
						$teacher['building'] = $this->fixText($description->find('span')[1]->innerHtml);
						$teacher['office'] = $this->fixText($description->find('span')[2]->innerHtml);
						break;

					case 6:
						$description = trim($description->innerHtml);
						$teacher['description'] = $description;
						break;
				}
			} catch (Exception $e) {
				
			}
		}

		$teacher['url'] = $url;

		$repository = App::make('Feuai\Teachers\TeachersRepositoryInterface');
		$repository->create($teacher);

		$this->command->comment(($i + 1) . ' ' . $teacher['name'] . ' guardado');
	}

	public function fixText($text)
	{
		$text = trim($text);
	    //$texto = utf8_decode($texto);
	    $text = mb_strtolower($text);
	    $text = mb_convert_case($text, MB_CASE_TITLE);
	    $search = array("Iii", "Ii", "[suspendida]", "Ayud.", "Prueba", "Lab.", "Mba", "Mge", "Mms", "Msc", "Dpo", "uai", "Uai", " Y ", " De ", " En ", " Del ", "Emba", "Mie", "Amsa", "Mpo", "Tic", "Tics", "Examen", ' A ', ' La ', ' O ', ' Ó ', '[Suspendida]', ' E ', 'Ay. ');
	    $replace = array("III", "II", "", "", "", "Laboratorio", "MBA", "MGE", "MMS", "MSC", "DPO", "UAI", "UAI", " y ", " de ", " en ", " del ", "EMBA", "MIE", "AMSA", "MPO", "TIC", "TICS", "", ' a ', ' la ', ' o ', ' ó ', '', ' e ', '');
	    $text = str_replace($search, $replace, $text);
	    //$texto = utf8_encode($texto);
	    $text = trim($text);
		return $text;
	}
}
*/
