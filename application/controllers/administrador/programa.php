<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Programa extends CI_Controller {

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
    redirect('administrador/programa/principal');			
  }
    
  
  function principal(){
	  try{	
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('ci_programa');
		$crud->set_subject('Programa');		
		$crud->set_language('spanish');
		
		$crud->fields(			
		  'cuenta',
'nombre_programa',
'id_ingreso'
		);
		
		$crud->columns('cuenta',
'nombre_programa',
'id_ingreso');
		
		$crud->display_as('id_ingreso','Ingreso');
		
		$crud->required_fields( 'cuenta',
'nombre_programa',
'id_ingreso');
		
		
		$crud->edit_fields('cuenta',
'nombre_programa',
'id_ingreso');

		$crud->set_relation('id_ingreso', 'ci_ingresos', 'id_ingreso');	
		
		$crud->unset_add();
		$crud->unset_export();
		$crud->unset_print();
		
						
		//$crud->set_field_upload('acta_constitutiva','archivos/actas_constitutivas');
		//$crud->set_field_upload('curriculum_empresarial','archivos/curriculum_empresarial');
		//$crud->set_field_upload('ficha_tecnica','archivos/fichas_tecnica');
		//$crud->set_field_upload('tarifario','archivos/tarifarios');								
		
	  
		$output = $crud->render();			
				
		$data['opcion'] = 'programa';	  
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('administrador/cabecera', $data);
		$data['opcion_programa'] = 'ver_todos';	  
	  	$this->load->view('administrador/opciones_programa', $data);
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
		$crud->set_table('ci_programa');
		$crud->set_subject('Programa');		
		$crud->set_language('spanish');
		
		$crud->fields(			
		  'cuenta',
'nombre_programa',
'id_ingreso'
		);
		
		$crud->columns('cuenta',
'nombre_programa',
'id_ingreso');
		
		$crud->display_as('id_ingreso','Ingreso');
		
		$crud->required_fields( 'cuenta',
'nombre_programa',
'id_ingreso');
		
		
		$crud->edit_fields('cuenta',
'nombre_programa',
'id_ingreso');
				
		$crud->unset_export();
		$crud->unset_print();								
		
		$crud->set_relation('id_ingreso', 'ci_ingresos', 'id_ingreso');
	  
		$output = $crud->render();			
				
		$data['opcion'] = 'programa';	  
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('administrador/cabecera', $data);
		$data['opcion_programa'] = 'nuevo_programa';	  
	  	$this->load->view('administrador/opciones_programa', $data);
		//$data['output'] = $output;
		//$data['opcion_medios'] = 'ver_todos';	
		$this->load->view('grocery', $output);
		$this->load->view('pie');				
		
		}catch(Exception $e){
		  show_error($e->getMessage().' --- '.$e->getTraceAsString());
    	}

  }
  
}