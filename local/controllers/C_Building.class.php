<?php
$loader->requireOnce('ordo/FacilityCode.class.php');

class C_Building extends Controller
{
	var $_ordo = null;
	
	function actionAdd() {
		return $this->actionEdit(0);
	}
	
	function actionEdit($id = 0) {
		if (!is_object($this->_ordo)) {
			$this->_ordo = Celini::newORDO('Building', $id);
		}
		
		$this->assign("building",$this->_ordo);
		$s =& Celini::newORDO('Practice');
		$practices = $this->utility_array($s->practices_factory(),"id","name");
		if(count($practices) == 0) {
			$this->messages->addMessage('You must add a practice before adding a building.');
			return;
		}
		$this->assign("practices",$practices);
		
		$fc = &new FacilityCode();
		$this->assign('facilityCodeList', $fc->valueListForDropDown()); 

		$this->assign("process",true);
		$this->view->assign('FORM_ACTION', Celini::link('edit', 'Building', true, $this->_ordo->get('id')));
		return $this->view->render("edit.html");
	}
	
	
	function processEdit() {
		$this->_ordo =& Celini::newORDO('Building', $_POST['id']);
		$this->_ordo->populate_array($_POST);
		$this->_ordo->set('identifier',$_POST['identifier']);
		$this->_ordo->persist();
	}

}

