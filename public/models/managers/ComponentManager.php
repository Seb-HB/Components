<?php 
class ComponentManager extends Database implements Crud{


	/**
	 */
	public function findAll() {
        $request=$this->bdd->prepare("SELECT * FROM components");
        $request->execute();
        $retour=$request->fetchAll();
        return $this->transformDatas($retour);
	}



    public function findBy($field, $value){
        $request=$this->bdd->prepare("SELECT * FROM components WHERE ".$field."=:filter ORDER BY dateAjout");
        $request->execute(['filter'=>$value]);
        $retour=$request->fetchAll();
        return $this->transformDatas($retour);
    }
	
	/**
	 *
	 * @param mixed $id 
	 */
	public function Delete($id) {
        $request=$this->bdd->prepare("DELETE * FROM components WHERE id = :id");
        $request->execute([':id' => $id]);
	}
	
	/**
	 *
	 * @param mixed $object 
	 *
	 * @return mixed
	 */
	public function update($component) {
		$request=$this->bdd->prepare("UPDATE components SET designation:designation, filePHP:filePHP, primaryFileCSS:priCSS,
         secondaryFileCSS:secondCSS, scriptJS:script, fullWidth:full, dateAjout:dateAjout, 
         useCSS:CSS, useJS:JS, useAPI:API WHERE id = :id");
        $request->execute([':id' => $component->getId(),
                            ':designation'=> $component->getDesignation(),
                            ':filePHP'=> $component->getFilePHP(),
                            ':priCSS'=> $component->getPrimaryCSSFile(),
                            ':secondCSS'=> $component->getSecondaryCSSFile(),
                            ':script'=> $component->getScriptJS(),
                            ':full'=> $component->getFullWidth(),
                            ':dateAjout'=> $component->getDateAjout(),
                            ':CSS'=> $component->getUseCSS(),
                            ':JS'=> $component->getUseJS(),
                            ':API'=> $component->getUseAPI()]);
	}
	
	/**
	 *
	 * @param mixed $objet 
	 */
	public function insert($component) {
		$request=$this->bdd->prepare("INSERT INTO components(`designation`, `filePHP`, `primaryFileCSS`, `secondaryFileCSS`, `scriptJS`, `fullWidth`, `dateAjout`, `useCSS`, `useJS`, `useAPI`) 
        VALUES (:designation, :filePHP, :priCSS, :secondCSS, :script, :full, :dateAjout, :CSS, :JS, :API)");
        $request->execute([':designation'=> $component->getDesignation(),
                            ':filePHP'=> $component->getFilePHP(),
                            ':priCSS'=> $component->getPrimaryCSSFile(),
                            ':secondCSS'=> $component->getSecondaryCSSFile(),
                            ':script'=> $component->getScriptJS(),
                            ':full'=> $component->getFullWidth(),
                            ':dateAjout'=> $component->getDateAjout(),
                            ':CSS'=> $component->getUseCSS(),
                            ':JS'=> $component->getUseJS(),
                            ':API'=> $component->getUseAPI()]);
    }



    public function transformDatas($datas){
        $components=[];
        foreach($datas as $component) {
            $components[]=new Component($component['designation'], $component['filePHP'], $component['primaryFileCSS'], $component['secondaryFileCSS'],
                                        $component['scriptJS'], $component['fullWidth'],$component['dateAjout'], $component['useCSS'],$component['useJS'],
                                        $component['useJS'],$component['useAPI'],$component['id']);
        }
        return $components;
    }
}

?>