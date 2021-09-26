<?php 
class MockupManager extends Database implements Crud{


	public function findAll() {
        $request=$this->bdd->prepare("SELECT * FROM mockups");
        $request->execute();
        $retour=$request->fetchAll();
        return $this->transformDatas($retour);
	}


	public function findOne($id) {
        $request=$this->bdd->prepare("SELECT * FROM mockups WHERE id=:id");
        $request->execute(['id'=>$id]);
        $retour=$request->fetch();
        return new Mockup($retour['title'], $retour['description'], $retour['specifications'], $retour['miniature'],
        $retour['img_full'], $retour['is_integrated'], $retour['img_second'],$retour['img_third'], 
        $retour['img_responsive'],$retour['video'],$retour['id']);
	}


    public function findXOthers($idExclu, int $nb){
        $request=$this->bdd->prepare("SELECT * FROM mockups WHERE id!=:id LIMIT 3");
        $request->execute([
            'id'=>$idExclu,
        ]);
        $retour=$request->fetchAll();
        return $this->transformDatas($retour);
    }



    public function findBy($field, $value){
        $request=$this->bdd->prepare("SELECT * FROM mockups WHERE ".$field."=:filter ORDER BY dateAjout");
        $request->execute(['filter'=>$value]);
        $retour=$request->fetchAll();
        return $this->transformDatas($retour);
    }
	
	/**
	 *
	 * @param mixed $id 
	 */
	public function Delete($id) {
        $request=$this->bdd->prepare("DELETE * FROM mockups WHERE id = :id");
        $request->execute([':id' => $id]);
	}
	
	/**
	 *
	 * @param mixed $object 
	 *
	 * @return mixed
	 */
	public function update($mockup) {
		$request=$this->bdd->prepare("UPDATE mockups SET title:title, decription:decription, specifications:spe,
         miniature:miniature, img_full:fullImg, img_second:second, img_third:third, 
         img_responsive:resp, is_integrated:integrated, video:video WHERE id = :id");
        $request->execute([':id' => $mockup->getId(),
                            ':designation'=> $mockup->getDesignation(),
                            ':filePHP'=> $mockup->getFilePHP(),
                            ':priCSS'=> $mockup->getPrimaryCSSFile(),
                            ':secondCSS'=> $mockup->getSecondaryCSSFile(),
                            ':script'=> $mockup->getScriptJS(),
                            ':full'=> $mockup->getFullWidth(),
                            ':dateAjout'=> $mockup->getDateAjout(),
                            ':CSS'=> $mockup->getUseCSS(),
                            ':JS'=> $mockup->getUseJS(),
                            ':API'=> $mockup->getUseAPI()]);
	}
	
	/**
	 *
	 * @param mixed $objet 
	 */
	public function insert($mockup) {
		$request=$this->bdd->prepare("INSERT INTO mockups(`designation`, `filePHP`, `primaryFileCSS`, `secondaryFileCSS`, `scriptJS`, `fullWidth`, `dateAjout`, `useCSS`, `useJS`, `useAPI`) 
        VALUES (:designation, :filePHP, :priCSS, :secondCSS, :script, :full, :dateAjout, :CSS, :JS, :API)");
        $request->execute([':designation'=> $mockup->getDesignation(),
                            ':filePHP'=> $mockup->getFilePHP(),
                            ':priCSS'=> $mockup->getPrimaryCSSFile(),
                            ':secondCSS'=> $mockup->getSecondaryCSSFile(),
                            ':script'=> $mockup->getScriptJS(),
                            ':full'=> $mockup->getFullWidth(),
                            ':dateAjout'=> $mockup->getDateAjout(),
                            ':CSS'=> $mockup->getUseCSS(),
                            ':JS'=> $mockup->getUseJS(),
                            ':API'=> $mockup->getUseAPI()]);
    }

    public function transformDatas($datas){
        $mockups=[];
        foreach($datas as $mockup) {
            $mockups[]=new Mockup($mockup['title'], $mockup['description'], $mockup['specifications'], $mockup['miniature'],
                                $mockup['img_full'], $mockup['is_integrated'], $mockup['img_second'],$mockup['img_third'], 
                                $mockup['img_responsive'],$mockup['video'],$mockup['id']);
        }
        return $mockups;
    }
    
}

?>