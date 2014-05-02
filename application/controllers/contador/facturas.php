<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Facturas extends CI_Controller {

  function __construct()
  {
	
    parent::__construct();
	$this->load->helper('url');
	$this->load->model('modelo');
	$this->load->library('grocery_crud');	
	$this->load->library(array('session'));
	
	if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'contador')
    {
       redirect(base_url().'index.php/login');
    }			    
		
  }

  function index()
  {    
    redirect('contador/facturas/principal');			
  }
    
  
  function principal(){
	  try{	
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('ci_factura');
		$crud->set_subject('Factura');		
		$crud->set_language('spanish');
		
		$crud->fields(			
'folio',
'cliente',
'rfc',
'domicilio',
'fecha',
'descripcion',
'importe',
'id_proveedor',
'id_estado',
'id_obra'
		);
		
		$crud->columns('folio',
'cliente',
'rfc',
'domicilio',
'fecha',
'descripcion',
'importe',
'id_proveedor',
'id_estado',
'id_obra'
);
		
		$crud->display_as('id_proveedor','Proveedor')->display_as('id_estado','Estado de la factura')->display_as('id_obra','Obra');
		
		$crud->required_fields( 'folio',
'cliente',
'rfc',
'domicilio',
'fecha',
'descripcion',
'importe',
'id_proveedor',
'id_estado',
'id_obra'
);
		
		
		$crud->edit_fields('folio',
'cliente',
'rfc',
'domicilio',
'fecha',
'descripcion',
'importe',
'id_proveedor',
'id_estado',
'id_obra'
);	
		
		$crud->unset_add();
		$crud->unset_export();
		$crud->unset_print();
		
						
		//$crud->set_field_upload('acta_constitutiva','archivos/actas_constitutivas');
		//$crud->set_field_upload('curriculum_empresarial','archivos/curriculum_empresarial');
		//$crud->set_field_upload('ficha_tecnica','archivos/fichas_tecnica');
		//$crud->set_field_upload('tarifario','archivos/tarifarios');								
		
	  
		$output = $crud->render();			
				
		$data['opcion'] = 'facturas';	  
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('contador/cabecera', $data);
		$data['opcion_facturas'] = 'ver_todos';	  
	  	$this->load->view('contador/opciones_facturas', $data);
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
		$crud->set_table('ci_factura');
		$crud->set_subject('Factura');		
		$crud->set_language('spanish');
		
		$crud->fields(			
'folio',
'cliente',
'rfc',
'domicilio',
'fecha',
'descripcion',
'importe',
'id_proveedor',
'id_estado',
'id_obra'
		);
		
		$crud->columns('folio',
'cliente',
'rfc',
'domicilio',
'fecha',
'descripcion',
'importe',
'id_proveedor',
'id_estado',
'id_obra'
);
		
		$crud->display_as('id_proveedor','Proveedor')->display_as('id_estado','Estado de la factura')->display_as('id_obra','Obra');
		
		$crud->required_fields( 'folio',
'cliente',
'rfc',
'domicilio',
'fecha',
'descripcion',
'importe',
'id_proveedor',
'id_estado',
'id_obra'
);
		
		
		$crud->edit_fields('folio',
'cliente',
'rfc',
'domicilio',
'fecha',
'descripcion',
'importe',
'id_proveedor',
'id_estado',
'id_obra'
);	
		$crud->unset_export();
		$crud->unset_print();								
			  
		$output = $crud->render();			
				
		$data['opcion'] = 'facturas';	  
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('contador/cabecera', $data);
		$data['opcion_facturas'] = 'nueva_factura';	  
	  	$this->load->view('contador/opciones_facturas', $data);
		//$data['output'] = $output;
		//$data['opcion_medios'] = 'ver_todos';	
		$this->load->view('grocery', $output);
		$this->load->view('pie');				
		
		}catch(Exception $e){
		  show_error($e->getMessage().' --- '.$e->getTraceAsString());
    	}

  }
  
}