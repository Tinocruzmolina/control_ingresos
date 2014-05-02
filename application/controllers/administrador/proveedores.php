<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Proveedores extends CI_Controller {

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
    redirect('administrador/proveedores/principal');			
  }
    
  
  function principal(){
	  try{	
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('ci_proveedor');
		$crud->set_subject('Proveedore');		
		$crud->set_language('spanish');
		
		$crud->fields(			
'nombre',
'calle',
'numero',
'ciudad',
'rfc',
'giro',
'telefono',
'e_mail'
		);
		
		$crud->columns('nombre',
'calle',
'numero',
'ciudad',
'rfc',
'giro',
'telefono',
'e_mail'
);
		
		$crud->display_as('nombre','Nombre del proveedor');
		
		$crud->required_fields( 'nombre',
'calle',
'numero',
'ciudad',
'rfc',
'giro',
'telefono',
'e_mail'
);
		
		
		$crud->edit_fields('nombre',
'calle',
'numero',
'ciudad',
'rfc',
'giro',
'telefono',
'e_mail'
);	
		
		$crud->unset_add();
		$crud->unset_export();
		$crud->unset_print();
		
						
		//$crud->set_field_upload('acta_constitutiva','archivos/actas_constitutivas');
		//$crud->set_field_upload('curriculum_empresarial','archivos/curriculum_empresarial');
		//$crud->set_field_upload('ficha_tecnica','archivos/fichas_tecnica');
		//$crud->set_field_upload('tarifario','archivos/tarifarios');								
		
	  
		$output = $crud->render();			
				
		$data['opcion'] = 'proveedores';	  
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('administrador/cabecera', $data);
		$data['opcion_proveedores'] = 'ver_todos';	  
	  	$this->load->view('administrador/opciones_proveedores', $data);
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
		$crud->set_table('ci_proveedor');
		$crud->set_subject('Proveedore');		
		$crud->set_language('spanish');
		
		$crud->fields(			
'nombre',
'calle',
'numero',
'ciudad',
'rfc',
'giro',
'telefono',
'e_mail'
		);
		
		$crud->columns('nombre',
'calle',
'numero',
'ciudad',
'rfc',
'giro',
'telefono',
'e_mail'
);
		
		$crud->display_as('nombre','Nombre del proveedor');
		
		$crud->required_fields( 'nombre',
'calle',
'numero',
'ciudad',
'rfc',
'giro',
'telefono',
'e_mail'
);
		
		
		$crud->edit_fields('nombre',
'calle',
'numero',
'ciudad',
'rfc',
'giro',
'telefono',
'e_mail'
);	
		$crud->unset_export();
		$crud->unset_print();								
		
	  
		$output = $crud->render();			
				
		$data['opcion'] = 'proveedores';	  
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('administrador/cabecera', $data);
		$data['opcion_proveedores'] = 'nuevo_proveedor';	  
	  	$this->load->view('administrador/opciones_proveedores', $data);
		//$data['output'] = $output;
		//$data['opcion_medios'] = 'ver_todos';	
		$this->load->view('grocery', $output);
		$this->load->view('pie');				
		
		}catch(Exception $e){
		  show_error($e->getMessage().' --- '.$e->getTraceAsString());
    	}

  }
  
}