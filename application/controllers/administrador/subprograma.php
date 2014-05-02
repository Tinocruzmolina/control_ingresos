<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Subprograma extends CI_Controller {

  function __construct()
  {
	
    parent::__construct();
	$this->load->helper('url');
	$this->load->model('modelo');
	$this->load->library('grocery_crud');	
	$this->load->library(array('session'));
	
	if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
    {
       redirect(base_url().'index.php/login');
    }			    
		
  }

  function index()
  {    
    redirect('administrador/subprograma/principal');			
  }
    
  
  function principal(){
	  try{	
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('ci_subprograma');
		$crud->set_subject('Subprograma');		
		$crud->set_language('spanish');
		
		$crud->fields(			
		  'subcuenta',
'nombre_subprograma',
'cuenta',
'id_programa'
		);
		
		$crud->columns('subcuenta',
'nombre_subprograma',
'cuenta',
'id_programa');
		
		$crud->display_as('id_programa','Programa');
		
		$crud->required_fields( 'subcuenta',
'nombre_subprograma',
'cuenta',
'id_programa');
		
		
		$crud->edit_fields('subcuenta',
'nombre_subprograma',
'cuenta',
'id_programa');

		$crud->set_relation('id_programa', 'ci_programa', 'id_programa');	
		
		$crud->unset_add();
		$crud->unset_export();
		$crud->unset_print();
		
						
		//$crud->set_field_upload('acta_constitutiva','archivos/actas_constitutivas');
		//$crud->set_field_upload('curriculum_empresarial','archivos/curriculum_empresarial');
		//$crud->set_field_upload('ficha_tecnica','archivos/fichas_tecnica');
		//$crud->set_field_upload('tarifario','archivos/tarifarios');								
		
	  
		$output = $crud->render();			
				
		$data['opcion'] = 'subprograma';	  
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('administrador/cabecera', $data);
		$data['opcion_subprograma'] = 'ver_todos';	  
	  	$this->load->view('administrador/opciones_subprograma', $data);
		//$data['output'] = $output;
		//$data['opcion_medios'] = 'ver_todos';	
		$this->load->view('grocery', $output);
		$this->load->view('pie');				
		
		}catch(Exception $e){
		  show_error($e->getMessage().' --- '.$e->getTraceAsString());
    	}
	
  }
     
  
  function administracion(){
	  
	try{	
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('ci_subprograma');
		$crud->set_subject('Subprograma');		
		$crud->set_language('spanish');
		
		$crud->fields(			
		  'subcuenta',
'nombre_subprograma',
'cuenta',
'id_programa'
		);
		
		$crud->columns('subcuenta',
'nombre_subprograma',
'cuenta',
'id_programa');
		
		$crud->display_as('id_programa','Programa');
		
		$crud->required_fields( 'subcuenta',
'nombre_subprograma',
'cuenta',
'id_programa');
		
		
		$crud->edit_fields('subcuenta',
'nombre_subprograma',
'cuenta',
'id_programa');

		$crud->set_relation('id_programa', 'ci_programa', 'id_programa');
				
		$crud->unset_export();
		$crud->unset_print();								
	  
		$output = $crud->render();			
				
		$data['opcion'] = 'subprograma';	  
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('administrador/cabecera', $data);
		$data['opcion_subprograma'] = 'nuevo_subprograma';	  
	  	$this->load->view('administrador/opciones_subprograma', $data);
		//$data['output'] = $output;
		//$data['opcion_medios'] = 'ver_todos';	
		$this->load->view('grocery', $output);
		$this->load->view('pie');				
		
		}catch(Exception $e){
		  show_error($e->getMessage().' --- '.$e->getTraceAsString());
    	}

  }
  
}